
# Symfony 7 Blog Project

Ce projet est une application Symfony 7 utilisant Docker pour la gestion des conteneurs. Il inclut une base de données MariaDB, Redis pour la mise en cache, et Nginx comme serveur web.

## Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Yarn](https://classic.yarnpkg.com/en/docs/install)

## Installation

1. **Clonez le dépôt :**

   ```bash
   git clone <URL_DE_VOTRE_DEPOT>
   cd <NOM_DU_REPERTOIRE>
   ```
   
2. **Construisez et démarrez les conteneurs :**

   ```bash
    docker-compose up -d
    ```

3. **Installez les dépendances PHP avec Composer :**
    ```bash
    docker-compose exec php composer install
    ```


4. **Installez les dépendances JavaScript avec Yarn :**
    ```bash
    docker-compose exec php yarn install
    ```
   
5. **Créez la base de données :**

    ```bash
    docker-compose exec php php bin/console doctrine:database:create
   ```
   
6. **Exécutez les migrations :**

    ```bash
    docker-compose exec php php bin/console doctrine:schema:update --force
   ```
   
7. **Configuration du nom de domaine :**

Ajouter au fichier /etc/hosts la ligne suivante :
`127.0.0.1 blog.taymik.com`

8. **Démarrage du projet :**
   Votre application sera accessible à l'adresse suivante : http://blog.taymik.com.
