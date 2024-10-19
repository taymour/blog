FROM php:8.3-fpm

# Installer les extensions nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zlib1g-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql

# Installer les dépendances de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
