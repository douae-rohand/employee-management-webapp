# Étape 1 : choisir une image de base avec Apache + PHP
FROM php:8.2-apache

# Étape 2 : installer des extensions PHP nécessaires (comme mysqli, pdo, etc.)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Étape 3 : activer mod_rewrite pour Apache si besoin (utile pour Laravel ou des .htaccess)
RUN a2enmod rewrite

# Étape 4 : copier le code de ton projet dans le conteneur
COPY ../app /var/www/html/

# Étape 5 : définir le répertoire de travail (facultatif mais recommandé)
WORKDIR /var/www/html/

# Étape 6 : installer Composer (gestionnaire de dépendances PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Étape 7 : installer les dépendances PHP via Composer (PhpWord, PHPMailer…)
RUN composer install

# Port exposé (facultatif, car Apache écoute par défaut sur 80)
EXPOSE 80
