FROM composer:latest AS composer

# Image de base Apache + PHP
FROM php:8.2-apache

# Installer les extensions PHP
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql zip gd

# Activer mod_rewrite
RUN a2enmod rewrite

# Copier le code de app dans /var/www/html
COPY app/ /var/www/html/

# Définir dossier de travail
WORKDIR /var/www/html/

# Copier Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer les dépendances
RUN composer install

# Exposer le port
EXPOSE 80


