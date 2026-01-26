# 🎣 FishMasters | Plateforme de Compétition de Pêche

**FishMasters** est une application web de gestion de compétitions de pêche sportive, distinguant deux expériences : **Masters** (Pêcheurs) et **Fan** (Supporteurs).

---

## 🚀 Fonctionnalités Clés

### 👤 Espace Fan (Pink Theme)
- **Fil d'Actu :** Suivez les prises en temps réel.
- **Système de Likes :** Soutenez vos pêcheurs favoris.
- **Billetterie :** Gérez vos accès aux événements (QR Code).
- **Profil Personnalisable :** Modification des infos et historique.

### 🏆 Espace Pêcheur (Cyan Theme)
- **Dashboard :** Statistiques de captures et rang.
- **Enregistrement :** Publication de prises (Poids, Taille, Photo).
- **Classement :** Suivi de la position dans la compétition en cours.

---

## 🛠️ Stack Technique

- **Backend :** PHP 8.x (Architecture MVC)
- **Frontend :** Tailwind CSS, FontAwesome 6
- **Base de données :** MySQL
- **Design :** Ultra-Glass Morphism (Glassmorphism moderne)

---

## 📁 Structure du Projet

```text
/fishmasters
├── app
│   ├── controllers    # Logique métier (LikeController, etc.)
│   ├── models         # Interactions BD (User, Prise, Like)
│   ├── core           # Routage et Configuration
│   └── views          # Templates HTML/PHP (Header, Profil, etc.)
├──                    # Assets (CSS, JS, Images)
└── config             # Connexion Database.php      
```
## InstallationCloner le projet :Bashgit clone 
```
[https://github.com/votre-repo/fishmasters.git](https://github.com/votre-repo/fishmasters.git)

```
<!-- --
Configuration :Importer database.sql dans votre serveur MySQL.Configurer les accès dans config/Database.php.Lancer :Configurer un VirtualHost ou utiliser le serveur intégré PHP :Bashphp -S localhost:8000
🗃️ Schéma de Données (Aperçu)TableRôleusersStocke Fans et Pêcheurs (Rôles distincts)priseDétails des captures (Poids, Taille, Compétition)likesTable de liaison pour le soutien des FanscompetitionGestion des événements et calendriers🎨 Design SystemFont : 'Outfit' (Google Fonts)Accent Fan : #f43f5e (Rose-500)Accent Pêcheur : #06b6d4 (Cyan-500)Background : #02040a (Deep Black)📝 AuteurDéveloppé avec ❤️ par Votre Nom. -->
---
<!-- 
### Pourquoi ce format ?
1.  **Scannabilité :** Utilisation de tableaux et de listes pour une lecture rapide.
2.  **Technique :** La structure des dossiers aide les autres développeurs à s'y retrouver.
3.  **Identité :** Mention des codes couleurs pour garder une cohérence UI.

Souhaites-tu que j'ajoute une section **API** pour tes futurs appels AJAX ? -->