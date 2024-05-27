> L'application est en cours de développement.  
> Elle n'est donc pas encore finalisée.

# Application de Publication de Photos

Cette application permet aux utilisateurs de poster des photos.  
Elle est développée en PHP pour le backend et JavaScript pour le frontend, sans utiliser de frameworks.

## Fonctionnalités

- Système d'inscription des utilisateurs avec confirmation par email
- Espace utilisateur pour gérer les photos
- Poster des photos
- Afficher une galerie de photos
- Supprimer des photos
- Commenter des photos
- Liker des photos
  
## Prérequis

- Docker
- Docker Compose

## Installation

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/votre-utilisateur/votre-repo.git
   cd votre-repo
   ```
2. Lancez l'application avec Docker Compose :
   ```bash
   docker-compose up -d
   ```
3. Accédez à l'application dans votre navigateur à l'adresse suivante :
   ```bash
   http://localhost:8000
   ```
   
## Structure du Projet

Le projet utilise le modèle de conception MVC (Modèle-Vue-Contrôleur) pour séparer la logique de l'application, la gestion des données et l'affichage.
