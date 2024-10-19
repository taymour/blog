
# Symfony 7 Blog Project

This project is a Symfony 7 application using Docker for container management. It includes a MariaDB database, Redis for caching, and Nginx as a web server.

## Pre-requisites

Before you begin, make sure your development machine has the following installed:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Installation

1. **Clone the repository :**

   ```bash
   git clone <URL_OF_THE_REPOSITORY>
   cd <NAME_OF_THE_DIRECTORY>
   ```
   
2. **Copy the .env.dist file to .env:**

   ```bash
   cp .env.dist .env
   ```

3. **Build and start the containers:**

   ```bash
    docker compose up -d
    ```

4. **Install PHP dependencies with Composer:**
    ```bash
    docker compose exec php composer install
    ```

5. **Install JavaScript dependencies with Yarn:**
    ```bash
    docker compose exec php yarn install
    ```

6. **Create the database:**

    ```bash
    docker compose exec php php bin/console doctrine:database:create
   ```
   
7. **Update the database schema:**

    ```bash
    docker compose exec php php bin/console doctrine:schema:update --force
   ```

8. **Configure the domain name:**

    Add the following line to the /etc/hosts file:
`127.0.0.1 blog.taymik.com`

9. **Ready:**
   Votre application sera accessible à l'adresse suivante : http://blog.taymik.com.
