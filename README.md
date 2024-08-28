# Logiciel d'inventaire de location de matériels 🍰

Ce projet, développé avec le framework CakePHP, contient des migrations pour la base de données. Il est réalisé par **Mathys Girault**, étudiant en **année 2**.

## Prérequis 📋

Avant de commencer, assurez-vous d'avoir installé :

- **PHP 7.4** ou supérieur
- **Composer**
- **MySQL** ou **MariaDB**

## Installation 🚀

Suivez ces étapes pour configurer le projet sur votre machine locale.

### 1. Cloner le projet

Ouvrez un terminal et exécutez la commande suivante pour cloner le projet :

git clone https://github.com/votreUsername/votreProjet.git
cd votreProjet

### 2. Installer les dépendances
Dans le dossier du projet, exécutez :

composer install
Cette commande installera toutes les dépendances nécessaires pour le projet.

### 3. Configurer la base de données
Copiez le fichier config/app_local.example.php en config/app_local.php et ajustez les paramètres de connexion à la base de données (Datasources -> default).

'Datasources' => [
    'default' => [
        'host' => 'VotreHost',
        'username' => 'VotreUsername',
        'password' => 'VotreMotDePasse',
        'database' => 'NomDeLaBaseDeDonnees',
    ],
],

### 4. Exécuter les migrations
Pour créer les tables nécessaires dans votre base de données, exécutez :

bin/cake migrations migrate

### 5. Démarrer le serveur de développement
Lancez le serveur de développement intégré :

bin/cake server -p 8765

Accédez ensuite à l'application via http://localhost:8765 dans votre navigateur.
