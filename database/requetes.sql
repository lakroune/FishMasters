

CREATE TABLE users (
    id_user SERIAL PRIMARY KEY,
    nom_user VARCHAR(100) NOT NULL,
    prenom_user VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password_user VARCHAR(255) NOT NULL,
    role_user VARCHAR(20) NOT NULL
);

CREATE TABLE fan (CHECK (role_user = 'FAN')) INHERITS (users);

CREATE TABLE competition (
    id_competition SERIAL PRIMARY KEY,
    nom_competition VARCHAR(100),
    date_create DATE
);

CREATE TABLE equipe (
    id_equipe SERIAL PRIMARY KEY,
    nom_equipe VARCHAR(100),
    nb_equipe INT,
    type_peche_favorite VARCHAR(100),
    id_competition INT REFERENCES competition (id_competition)
);

CREATE TABLE pecheur (
    photo_pecheur VARCHAR(255),
    region VARCHAR(100),
    type_peche_favorite VARCHAR(100),
    id_equipe INT REFERENCES equipe (id_equipe) DEFAULT NULL,
    CHECK (role_user = 'PECHEUR')
) INHERITS (users);

CREATE TABLE espece (
    id_espece SERIAL PRIMARY KEY,
    nom_espece VARCHAR(100),
    coefficient INT,
    description TEXT
);



CREATE TABLE reglement (
    id_reglement SERIAL PRIMARY KEY,
    description TEXT,
    mode_scoring VARCHAR(50),
    taille_mini FLOAT,
    especes_autorisees TEXT,
    limite_especes INT,
    id_competition INT REFERENCES competition (id_competition)
);

CREATE TABLE spot_peche (
    id_spot SERIAL PRIMARY KEY,
    nom_spot VARCHAR(100),
    type_eau VARCHAR(50),
    localisation VARCHAR(150),
    especes_disponible TEXT
);

CREATE TABLE classement (
    id_classement SERIAL PRIMARY KEY,
    type_classement VARCHAR(50),
    date_classement DATE,
    id_competition INT REFERENCES competition (id_competition)
);

CREATE TABLE score (
    id_score SERIAL PRIMARY KEY,
    total_poids FLOAT,
    total_points FLOAT,
    nb_prises INT,
    id_pecheur INT REFERENCES pecheur (id_user),
    id_classement INT REFERENCES classement (id_classement)
);

CREATE TABLE prise (
    id_prise SERIAL PRIMARY KEY,
    image_prise VARCHAR(255),
    date_capture TIMESTAMP,
    poids FLOAT,
    taille FLOAT,
    id_pecheur INT REFERENCES pecheur (id_user),
    id_espece INT REFERENCES espece (id_espece),
    id_spot INT REFERENCES spot_peche (id_spot)
);

CREATE TABLE likes (
    id_like SERIAL PRIMARY KEY,
    date_like TIMESTAMP,
    id_fan INT REFERENCES fan (id_user),
    id_prise INT REFERENCES prise (id_prise),
    id_competition INT REFERENCES competition (id_competition)
);

CREATE TABLE badge (
    id_badge SERIAL PRIMARY KEY,
    nom_badge VARCHAR(100),
    date_obtenu DATE,
    id_fan INT REFERENCES fan (id_user)
);

CREATE TABLE notification (
    id_notification SERIAL PRIMARY KEY,
    contenu TEXT,
    date_notification TIMESTAMP,
    id_fan INT REFERENCES fan (id_user)
);

CREATE TABLE commentaires (
    id_comment SERIAL PRIMARY KEY,
    contenu TEXT,
    date_comment TIMESTAMP,
    id_fan INT REFERENCES fan (id_user)
);

