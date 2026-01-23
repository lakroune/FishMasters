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

DROP TABLE IF EXISTS equipe;

DROP TABLE IF EXISTS competition;

DROP TABLE IF EXISTS pecheur;

DROP TABLE IF EXISTS fan;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id_user SERIAL PRIMARY KEY,
    nom_user VARCHAR(100) NOT NULL,
    prenom_user VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password_user VARCHAR(255) NOT NULL,
    role_user VARCHAR(20) NOT NULL
);

SELECT * FROM users;
CREATE TABLE fans (
    PRIMARY KEY (id_user),
    CHECK (role_user = 'FAN')
) INHERITS (users);

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
    nb_participants INT check (nb_equipe between 5 and 10),
    id_categorie INT REFERENCES categorie (id_categorie)
);
-- trigger_increment_nb_participants

create table matches(
    id_match SERIAL PRIMARY KEY,
    id_competition INT REFERENCES competition (id_competition),
   
)

CREATE TABLE equipes (
    id_equipe SERIAL PRIMARY KEY,
    nom_equipe VARCHAR(100),
    nb_pecheurs INT check (nb_pecheurs between 2 and 5),
    id_competition INT REFERENCES competition (id_competition)
);
-- trigger_incremebnt_equipe

CREATE TABLE pecheurs (
    PRIMARY KEY (id_user),
    photo_pecheur VARCHAR(255),
    region VARCHAR(100),
    type_peche_favorite VARCHAR(100),
    id_equipe INT REFERENCES equipe (id_equipe) DEFAULT NULL,
    id_competition INT REFERENCES competition (id_competition) DEFAULT NULL,
    CHECK (role_user = 'PECHEUR')
) INHERITS (users);

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
    limite_especes INT,
    id_competition INT REFERENCES competition (id_competition)
);

CREATE TABLE spot_peches (
    id_spot SERIAL PRIMARY KEY,
    nom_spot VARCHAR(100),
    type_eau VARCHAR(50),
    localisation VARCHAR(150)
);

CREATE TABLE classements (
    id_classement SERIAL PRIMARY KEY,
    type_classement VARCHAR(50),
    date_classement TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_competition INT REFERENCES competition (id_competition)
);

CREATE TABLE scores (
    id_score SERIAL PRIMARY KEY,
    total_poids FLOAT,
    total_points FLOAT,
    nb_prises INT,
    id_pecheur INT REFERENCES pecheur (id_user),
    id_classement INT REFERENCES classement (id_classement)
);

CREATE TABLE prises (
    id_prise SERIAL PRIMARY KEY,
    image_prise VARCHAR(255),
    date_capture TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    poids FLOAT,
    taille FLOAT,
    id_pecheur INT REFERENCES pecheur (id_user),
    id_espece INT REFERENCES espece (id_espece),
    id_spot INT REFERENCES spot_peche (id_spot)
);

CREATE TABLE likes (
    id_like SERIAL PRIMARY KEY,
    date_like TIMESTAMP DEFAULT current_timestamp,
    id_fan INT REFERENCES fan (id_user) DEFAULT NULL,
    id_prise INT REFERENCES prise (id_prise) DEFAULT NULL,
    id_pecheur INT REFERENCES pecheur (id_user) DEFAULT NULL,
    id_competition INT REFERENCES competition (id_competition) DEFAULT NULL,
);

CREATE TABLE badges (
    id_badge SERIAL PRIMARY KEY,
    nom_badge VARCHAR(100),
    date_obtenu DATE,
    id_fan INT REFERENCES fan (id_user)
);

CREATE TABLE notifications (
    id_notification SERIAL PRIMARY KEY,
    contenu TEXT,
    date_notification TIMESTAMP DEFAULT,
    id_fan INT REFERENCES fan (id_user)
);

CREATE TABLE commentaires (
    id_comment SERIAL PRIMARY KEY,
    contenu TEXT,
    date_comment TIMESTAMP,
    id_fan INT REFERENCES fan (id_user)
);