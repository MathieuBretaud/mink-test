FROM php:8.3-fpm

# Copier la configuration PHP de développement
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer --install-dir=/usr/local/bin

# Installer les dépendances système et les extensions PHP
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install \
    opcache \
    intl \
    bcmath \
    pgsql \
    pdo_pgsql \
    zip

# Définir le répertoire de travail
WORKDIR /app

# Copier les fichiers du projet
COPY . .

# Installer les dépendances Composer
RUN composer install --no-interaction --no-plugins --no-scripts

# Définir les permissions
RUN chown -R www-data:www-data /app

# Exposer le port 9000 pour PHP-FPM
EXPOSE 9000

# Commande par défaut pour exécuter PHP-FPM
CMD ["php-fpm"]
