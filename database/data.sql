
-- Insertion des FANS
INSERT INTO fan (nom_user, prenom_user, email, password_user, role_user) VALUES
('Dupont', 'Jean', 'jean.dupont@email.com', 'hash_pwd_1', 'FAN'),
('Durand', 'Marie', 'marie.durand@email.com', 'hash_pwd_2', 'FAN');

-- Insertion des COMPÉTITIONS (nécessaire pour les équipes)
INSERT INTO competition (nom_competition, date_create) VALUES
('Open de France Carpe', '2024-05-15'),
('Challenge Carnassier 2024', '2024-06-20');

-- Insertion des ÉQUIPES
INSERT INTO equipe (nom_equipe, nb_equipe, type_peche_favorite, id_competition) VALUES
('Les Brochets Volants', 2, 'Leurre', 2),
('Team Carpe 33', 2, 'Batterie', 1);

-- Insertion des PÊCHEURS
INSERT INTO pecheur (nom_user, prenom_user, email, password_user, role_user, photo_pecheur, region, type_peche_favorite, id_equipe) VALUES
('Lemoine', 'Thomas', 't.lemoine@email.com', 'hash_pwd_3', 'PECHEUR', 'p_thomas.jpg', 'Nouvelle-Aquitaine', 'Carpe', 2),
('Petit', 'Lucas', 'l.petit@email.com', 'hash_pwd_4', 'PECHEUR', 'p_lucas.jpg', 'Bretagne', 'Leurre', 1);
-- Espèces
INSERT INTO espece (nom_espece, coefficient, description) VALUES
('Brochet', 10, 'Poisson carnassier d''eau douce'),
('Carpe Miroir', 5, 'Poisson de fond très combatif'),
('Sandre', 12, 'Carnassier lucifuge');

-- Spots de pêche
INSERT INTO spot_peche (nom_spot, type_eau, localisation, especes_disponible) VALUES
('Lac de Biscarrosse', 'Douce', 'Landes, France', 'Brochet, Carpe, Perche'),
('Ria d''Etel', 'Salée', 'Morbihan, France', 'Bar, Daurade');

-- Règlement
INSERT INTO reglement (description, mode_scoring, taille_mini, especes_autorisees, limite_especes, id_competition) VALUES
('Règlement standard carnassier', 'Points par cm', 50.0, 'Brochet, Sandre', 5, 2);
-- Prises
INSERT INTO prise (image_prise, date_capture, poids, taille, id_pecheur, id_espece, id_spot) VALUES
('prise1.jpg', '2024-06-21 10:30:00', 4.5, 82.0, 4, 1, 1),
('prise2.jpg', '2024-06-21 14:15:00', 3.2, 70.0, 4, 3, 1);

-- Classement
INSERT INTO classement (type_classement, date_classement, id_competition) VALUES
('Général', '2024-06-25', 2);

-- Score
INSERT INTO score (total_poids, total_points, nb_prises, id_pecheur, id_classement) VALUES
(7.7, 152.0, 2, 4, 1);
-- Likes
INSERT INTO likes (date_like, id_fan, id_prise, id_competition) VALUES
(NOW(), 1, 1, 2);

-- Badges
INSERT INTO badge (nom_badge, date_obtenu, id_fan) VALUES
('Premier Soutien', '2024-01-10', 1);

-- Notifications
INSERT INTO notification (contenu, date_notification, id_fan) VALUES
('Votre pêcheur favori a enregistré une nouvelle prise !', NOW(), 1);

-- Commentaires
INSERT INTO commentaires (contenu, date_comment, id_fan) VALUES
('Magnifique prise ! Bravo.', NOW(), 2);