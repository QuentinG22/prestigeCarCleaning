# Guide d'utilisation de l'application

Bienvenue sur l'application "Prestige Car Cleaning" !

## Fonctionnalités

- Interface conviviale.
- Système d'authentification sécurisé pour les clients et les membres du personnel.
- Intégration avec une base de données MySQL pour stocker les informations clients, les avis clients et les détails des prestations.
- Implémentation de l'architecture MVC (Modèle-Vue-Contrôleur) pour l'organisation du code.

## Technologies Utilisées

- **Frontend** : HTML5, CSS3, JavaScript
- **Backend** : PHP (orienté objet), MySQL
- **Frameworks/Bibliothèques** : Sass, Composer, Dotenv
- **Outils** : Visual Studio Code, XAMPP (pour l'environnement de développement local)

## Instructions de Configuration

1. Cloner le dépôt sur votre machine local :
```bash
   git clone https://github.com/QuentinG22/prestigeCarCleaning.git
```
2. Renommez le fichier `.env.example` en `.env`
```bash
   mv .env.example .env
```
3. Créez une nouvelle base de données en important le fichier database.sql
4. Assurez-vous d'avoir Composer d'installé sur votre machine. [Installer Composer](https://getcomposer.org/)
5. Remplacez les paramètres de connexion à la base de données dans le fichier `.env` par vos propres paramètres.
   
## Lien du site
[Prestige Car Cleaning](https://www.greta-bretagne-sud.fr/stagiaires-kercode/quentin-guillemin/prestigecarcleaning/)

## Accès à la partie Back Office
Un utilisateur administrateur a été créé pour accéder à la partie back office du site Prestige Car Cleaning. Les utilisateurs avec des privilèges d'administrateur ont accès à des fonctionnalités supplémentaires pour gérer les demandes de contact, gestion des prestations, gestion des produits et modération des avis.

Pour accéder à la partie back office :
- Email utilisateur : `admin@prestigecarcleaning.fr`
- Mot de passe : *admin@prestige2*

**Note :** Assurez-vous de protéger ces informations d'identification et de ne les partager qu'avec des utilisateurs autorisés.