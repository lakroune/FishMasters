INSERT INTO users (nom_user, prenom_user, email, password_user, role_user) VALUES
('Benali', 'Ahmed', 'ahmed.benali@gmail.com', 'pass123', 'PECHEUR'),
('Karimi', 'Yassine', 'yassine.karimi@gmail.com', 'pass123', 'PECHEUR'),
('El Amrani', 'Sara', 'sara.amrani@gmail.com', 'pass123', 'FAN'),
('Haddad', 'Omar', 'omar.haddad@gmail.com', 'pass123', 'PECHEUR'),
('Zahraoui', 'Imane', 'imane.zahraoui@gmail.com', 'pass123', 'FAN'),
('Bennani', 'Khalid', 'khalid.bennani@gmail.com', 'pass123', 'PECHEUR'),
('Fassi', 'Nour', 'nour.fassi@gmail.com', 'pass123', 'FAN'),
('Ouazzani', 'Rachid', 'rachid.ouazzani@gmail.com', 'pass123', 'PECHEUR'),
('Alaoui', 'Meryem', 'meryem.alaoui@gmail.com', 'pass123', 'FAN'),
('Chraibi', 'Hamza', 'hamza.chraibi@gmail.com', 'pass123', 'PECHEUR');



INSERT INTO badges (nom_badge) VALUES
('Débutant'),
('Amateur'),
('Confirmé'),
('Expert'),
('Champion'),
('Légende'),
('Pêcheur d’Or'),
('Top Fan'),
('Super Supporter'),
('VIP');


INSERT INTO fans (id_user, nom_user, prenom_user, email, password_user, role_user, id_badge, nb_like) VALUES
(3, 'El Amrani', 'Sara', 'sara.amrani@gmail.com', 'pass123', 'FAN', 8, 5),
(5, 'Zahraoui', 'Imane', 'imane.zahraoui@gmail.com', 'pass123', 'FAN', 9, 2),
(7, 'Fassi', 'Nour', 'nour.fassi@gmail.com', 'pass123', 'FAN', 10, 8),
(9, 'Alaoui', 'Meryem', 'meryem.alaoui@gmail.com', 'pass123', 'FAN', 8, 1);

INSERT INTO pecheurs
(id_user, nom_user, prenom_user, email, password_user, role_user, photo_pecheur, region, type_peche_favorite)
VALUES
(1, 'Benali', 'Ahmed', 'ahmed.benali@gmail.com', 'pass123', 'PECHEUR', 'ahmed.jpg', 'Agadir', 'Mer'),
(2, 'Karimi', 'Yassine', 'yassine.karimi@gmail.com', 'pass123', 'PECHEUR', 'yassine.jpg', 'Safi', 'Rivière'),
(4, 'Haddad', 'Omar', 'omar.haddad@gmail.com', 'pass123', 'PECHEUR', 'omar.jpg', 'Casablanca', 'Mer'),
(6, 'Bennani', 'Khalid', 'khalid.bennani@gmail.com', 'pass123', 'PECHEUR', 'khalid.jpg', 'Tanger', 'Mer'),
(8, 'Ouazzani', 'Rachid', 'rachid.ouazzani@gmail.com', 'pass123', 'PECHEUR', 'rachid.jpg', 'Rabat', 'Lac'),
(10,'Chraibi', 'Hamza', 'hamza.chraibi@gmail.com', 'pass123', 'PECHEUR', 'hamza.jpg', 'Marrakech', 'Rivière');



INSERT INTO categories (nom_categorie) VALUES
('Pêche en mer'),
('Pêche en rivière'),
('Pêche en lac'),
('Pêche sportive'),
('Pêche traditionnelle');


INSERT INTO competitions
(nom_competition, date_debut, type_competition, nb_matchs, date_fin, nb_participants, id_categorie)
VALUES
('Coupe Atlantique', '2026-02-01', 'Equipee', 5, '2026-02-10', 8, 1),
('Challenge Rivière', '2026-03-05', 'Individuelle', 4, '2026-03-07', 6, 2),
('Lac Trophy', '2026-04-10', 'Equipee', 6, '2026-04-15', 10, 3),
('Open Maroc', '2026-05-01', 'Individuelle', 5, '2026-05-03', 7, 4),
('Festival Pêche', '2026-06-20', 'Equipee', 4, '2026-06-25', 9, 5);


INSERT INTO equipes (nom_equipe, nb_pecheurs, id_competition) VALUES
('Les Requins', 3, 1),
('Team Atlas', 4, 1),
('Rivière Pro', 2, 2),
('Lac Masters', 5, 3),
('Ocean Kings', 3, 3),
('Sport Fish', 4, 5);


INSERT INTO matches (id_competition) VALUES
(1),
(1),
(2),
(3),
(3),
(5);

INSERT INTO match_members (id_match, id_equipe, id_pecheur) VALUES
(1, 1, NULL),
(1, 2, NULL),
(2, 1, NULL),
(3, NULL, 1),
(3, NULL, 2),
(4, 4, NULL),
(4, 5, NULL),
(5, 4, NULL),
(6, 6, NULL);


INSERT INTO especes (nom_espece, coefficient, description) VALUES
('Sardine', 1, 'Poisson de petite taille'),
('Thon', 3, 'Poisson rapide et puissant'),
('Bar', 2, 'Poisson de mer très apprécié'),
('Carpe', 2, 'Poisson d’eau douce'),
('Truite', 3, 'Poisson de rivière'),
('Dorade', 2, 'Poisson de mer'),
('Brochet', 3, 'Poisson carnassier'),
('Tilapia', 1, 'Poisson de lac');



INSERT INTO spot_peches (nom_spot, type_eau, localisation, id_categorie) VALUES
('Plage Agadir', 'Mer', 'Agadir', 1),
('Oued Oum Er-Rbia', 'Rivière', 'Khouribga', 2),
('Lac Bin El Ouidane', 'Lac', 'Azilal', 3),
('Port Casablanca', 'Mer', 'Casablanca', 1),
('Oued Sebou', 'Rivière', 'Fes', 2);


INSERT INTO reglements
(taille_mini, poid_mini, especes_autorisees, limite_prise, id_competition)
VALUES
(20, 0.5, ARRAY['Sardine','Bar','Dorade'], 3, 1),
(25, 1.0, ARRAY['Truite','Carpe'], 2, 2),
(30, 2.0, ARRAY['Thon','Bar'], 1, 3),
(22, 0.8, ARRAY['Tilapia','Carpe'], 3, 4),
(28, 1.5, ARRAY['Brochet','Truite'], 2, 5);

INSERT INTO prises
(image_prise, poids, taille, id_pecheur, id_espece, id_spot)
VALUES
('p1.jpg', 1.2, 30, 1, 3, 1),
('p2.jpg', 0.8, 22, 2, 5, 2),
('p3.jpg', 2.5, 40, 4, 2, 1),
('p4.jpg', 1.0, 28, 6, 6, 4),
('p5.jpg', 3.2, 50, 8, 7, 3),
('p6.jpg', 0.6, 21, 10, 1, 1);

INSERT INTO classements
(type_classement, id_competition, id_pecheur, id_equipe, rank)
VALUES
('Individuelle', 2, 1, NULL, 1),
('Individuelle', 2, 2, NULL, 2),
('Equipee', 1, NULL, 1, 1),
('Equipee', 1, NULL, 2, 2),
('Individuelle', 4, 6, NULL, 1);

INSERT INTO scores
(total_poids, total_points, nb_prises, id_pecheur, id_classement)
VALUES
(1.2, 12, 1, 1, 1),
(0.8, 8, 1, 2, 2),
(3.0, 30, 2, 6, 5),
(2.5, 25, 1, 4, 1);

INSERT INTO likes (id_fan, id_prise, id_pecheur, id_competition) VALUES
(3, 1, NULL, NULL),
(5, 2, NULL, NULL),
(7, NULL, 1, NULL),
(9, NULL, NULL, 1),
(3, 3, NULL, NULL);



INSERT INTO commentaires (contenu, id_fan, id_prise) VALUES
('Bravo belle prise !', 3, 1),
('Magnifique poisson', 5, 3),
('Continue comme ça', 7, 5);


INSERT INTO notifications (contenu, id_fan) VALUES
('Nouveau match disponible', 3),
('Votre badge a été mis à jour', 5),
('Nouvelle compétition publiée', 7);


INSERT INTO subscriptions (id_fan, id_pecheur) VALUES
(3, 1),
(5, 2),
(7, 4),
(9, 6);
