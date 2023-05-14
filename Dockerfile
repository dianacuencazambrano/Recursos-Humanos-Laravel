FROM php:8.0-apache

# Install required extensions
RUN apt-get update && apt-get install -y \
        libzip-dev \
        libonig-dev \
        zip \
        unzip \
        && docker-php-ext-install pdo_mysql zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application files
COPY . /var/www/html/

# Set up Apache
RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80