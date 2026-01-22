-- Active: 1768924390402@@www.dockhosting.dev@49581@masterfich

DROP TABLE IF EXISTS commentaires;

DROP TABLE IF EXISTS notification;

DROP TABLE IF EXISTS badge;

DROP TABLE IF EXISTS likes;

DROP TABLE IF EXISTS prise;

DROP TABLE IF EXISTS score;

DROP TABLE IF EXISTS classement;

DROP TABLE IF EXISTS spot_peche;

DROP TABLE IF EXISTS reglement;

DROP TABLE IF EXISTS espece;

drop TABLE if EXISTS subscribe;

DROP TABLE IF EXISTS equipe;

DROP TABLE IF EXISTS competition;

DROP TABLE IF EXISTS pecheur;

DROP TABLE IF EXISTS fan;

DROP TABLE IF EXISTS users;

-- ----------------------------------
-- -----------------------------------
CREATE TABLE users (
    id_user SERIAL PRIMARY KEY,
    nom_user VARCHAR(100) NOT NULL,
    prenom_user VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password_user VARCHAR(255) NOT NULL,
    role_user VARCHAR(20) NOT NULL
);

CREATE TABLE badges (
    id_badge SERIAL PRIMARY KEY,
    nom_badge VARCHAR(100)
);
CREATE TABLE fans (
    PRIMARY KEY (id_user),
    CHECK (role_user = 'FAN'),
    id_badge INT REFERENCES badges (id_badge) DEFAULT NULL,
    nb_like int DEFAULT 0
) INHERITS (users);

CREATE table categories (
    id_categorie SERIAL PRIMARY KEY,
    nom_categorie VARCHAR(100)
);
CREATE TABLE competitions (
    id_competition SERIAL PRIMARY KEY,
    nom_competition VARCHAR(100),
    date_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_debut DATE,
    type_competition VARCHAR(100) check (
        type_competition in ('Individuelle', 'Equipee')
    ),
    nb_matchs int DEFAULT 0 check (nb_matchs >= 3),
    date_fin DATE,
    nb_participants INT check (nb_participants between 5 and 10),
    id_categorie INT REFERENCES categories (id_categorie)
);
-- trigger_increment_nb_participants

create table matches (
    id_match SERIAL PRIMARY KEY,
    id_competition INT REFERENCES competitions (id_competition)
)

CREATE TABLE equipes (
    id_equipe SERIAL PRIMARY KEY,
    nom_equipe VARCHAR(100),
    nb_pecheurs INT DEFAULT 1 check (nb_pecheurs <= 5),
    id_competition INT REFERENCES competitions (id_competition)
);
CREATE TABLE pecheurs (
    PRIMARY KEY (id_user),
    photo_pecheur VARCHAR(255),
    region VARCHAR(100),
    type_peche_favorite VARCHAR(100),
    id_equipe INT REFERENCES equipes (id_equipe) DEFAULT NULL,
    id_competition INT REFERENCES competitions (id_competition) DEFAULT NULL,
    CHECK (role_user = 'PECHEUR')
) INHERITS (users);

create Table match_members (
    id_match_member SERIAL PRIMARY KEY,
    id_match INT REFERENCES matches (id_match),
    id_equipe INT REFERENCES equipes (id_equipe) DEFAULT NULL,
    id_pecheur INT REFERENCES pecheurs (id_user) DEFAULT NULL
)


-- trigger_incremebnt_equipe


CREATE TABLE especes (
    id_espece SERIAL PRIMARY KEY,
    nom_espece VARCHAR(100),
    coefficient INT DEFAULT 1,
    description TEXT
);

CREATE TABLE reglements (
    id_reglement SERIAL PRIMARY KEY,
    taille_mini FLOAT,
    poid_mini FLOAT,
    especes_autorisees TEXT [],
    limite_prise INT DEFAULT 1 check (limite_prise <= 3),
    id_competition INT REFERENCES competitions (id_competition)
);

CREATE TABLE spot_peches (
    id_spot SERIAL PRIMARY KEY,
    nom_spot VARCHAR(100),
    type_eau VARCHAR(50),
    localisation VARCHAR(150),
    id_categorie int REFERENCES categories (id_categorie)
);

CREATE TABLE classements (
    id_classement SERIAL PRIMARY KEY,
    type_classement VARCHAR(50) check (
        type_classement in ('Individuelle', 'Equipee')
    ),
    date_classement TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_competition INT REFERENCES competitions (id_competition),
    id_pecheur INT REFERENCES pecheurs (id_user) DEFAULT NULL,
    id_equipe INT REFERENCES equipes (id_equipe) DEFAULT NULL,
    rank int DEFAULT 0
);
SELECT * FROM especes;
CREATE TABLE scores (
    id_score SERIAL PRIMARY KEY,
    total_poids FLOAT,
    total_points FLOAT,
    nb_prises INT,
    id_pecheur INT REFERENCES pecheurs (id_user),
    id_classement INT REFERENCES classements (id_classement)
);
-- trigger_insert_classement
CREATE TABLE prises (
    id_prise SERIAL PRIMARY KEY,
    image_prise VARCHAR(255),
    date_capture TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    poids FLOAT,
    taille FLOAT,
    id_pecheur INT REFERENCES pecheurs (id_user),
    id_espece INT REFERENCES especes (id_espece),
    id_spot INT REFERENCES spot_peches (id_spot)
);

CREATE TABLE likes (
    id_like SERIAL PRIMARY KEY,
    date_like TIMESTAMP DEFAULT current_timestamp,
    id_fan INT REFERENCES fans (id_user),
    id_prise INT REFERENCES prises (id_prise) DEFAULT NULL,
    id_pecheur INT REFERENCES pecheurs (id_user) DEFAULT NULL,
    id_competition INT REFERENCES competitions (id_competition) DEFAULT NULL
);



CREATE TABLE notifications (
    id_notification SERIAL PRIMARY KEY,
    contenu TEXT,
    date_notification TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_fan INT REFERENCES fans (id_user)
);

CREATE TABLE commentaires (
    id_comment SERIAL PRIMARY KEY,
    contenu TEXT,
    date_comment TIMESTAMP,
    id_fan INT REFERENCES fans (id_user),
    id_prise INT REFERENCES prises (id_prise)
);

CREATE Table subscriptions (
    id_subscription SERIAL PRIMARY KEY,
    id_fan INT REFERENCES fans (id_user),
    id_pecheur INT REFERENCES pecheurs (id_user),
    date_subscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE OR REPLACE FUNCTION increment_nb_participants()
RETURNS TRIGGER AS $$
BEGIN
    IF NEW.id_competition IS NOT NULL THEN
        UPDATE competitions
        SET nb_participants = nb_participants + 1
        WHERE id_competition = NEW.id_competition;
    END IF;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER trg_increment_participants
AFTER INSERT ON pecheurs
FOR EACH ROW
EXECUTE FUNCTION increment_nb_participants();

-- trigger_increment_nb_pecheurs
CREATE OR REPLACE FUNCTION increment_nb_pecheurs()
RETURNS TRIGGER AS $$
BEGIN
    IF NEW.id_equipe IS NOT NULL THEN
        UPDATE equipes
        SET nb_pecheurs = nb_pecheurs + 1
        WHERE id_equipe = NEW.id_equipe;
    END IF;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER trg_increment_pecheurs
AFTER INSERT ON pecheurs
FOR EACH ROW
EXECUTE FUNCTION increment_nb_pecheurs();

-- ------------------------------------------------------
-- ---- les requetes ----
-- ------------------------------------------------------

DROP VIEW IF EXISTS classementPecheur;

CREATE OR REPLACE VIEW classementPecheur AS
SELECT
    cl.id_competition,
    cl.type_classement,
    p.nom_user,
    p.prenom_user,
    sc.total_poids,
    sc.total_points,
    RANK() OVER (
        PARTITION BY cl.id_competition
        ORDER BY sc.total_points DESC, sc.total_poids DESC
    ) AS rank
FROM scores sc
JOIN classements cl ON sc.id_classement = cl.id_classement
JOIN pecheurs p ON p.id_user = sc.id_pecheur;

DROP VIEW IF EXISTS classementEquipe;

CREATE VIEW classementEquipe AS
SELECT
    c.id_competition,
    e.id_equipe,
    e.nom_equipe,
    SUM(s.total_poids)  AS total_poids_equipe,
    SUM(s.total_points) AS total_points_equipe,
    RANK() OVER (
        PARTITION BY c.id_competition
        ORDER BY SUM(s.total_points) DESC, SUM(s.total_poids) DESC
    ) AS rang
FROM equipes e
JOIN pecheurs p ON p.id_equipe = e.id_equipe
JOIN scores s ON s.id_pecheur = p.id_user
JOIN classements cl ON cl.id_classement = s.id_classement
JOIN competitions c ON c.id_competition = cl.id_competition
WHERE cl.type_classement = 'Equipee'
GROUP BY c.id_competition, e.id_equipe, e.nom_equipe;

DROP VIEW IF EXISTS classementGeneralPecheur;

CREATE VIEW classementGeneralPecheur AS
SELECT
    p.id_user AS id_pecheur,
    u.nom_user,
    u.prenom_user,
    SUM(s.total_points) AS total_points,
    SUM(s.total_poids)  AS total_poids,
    RANK() OVER (
        ORDER BY SUM(s.total_points) DESC, SUM(s.total_poids) DESC
    ) AS rang_general
FROM pecheurs p
JOIN users u ON u.id_user = p.id_user
JOIN scores s ON s.id_pecheur = p.id_user
GROUP BY p.id_user, u.nom_user, u.prenom_user;

SELECT*  from classementGeneralPecheur;

