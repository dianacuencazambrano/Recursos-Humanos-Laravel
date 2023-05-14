# Usamos la imagen oficial de PHP 8.0 con el módulo de Apache
FROM php:8.0-apache

# Instalamos las dependencias necesarias para Laravel y MySQL
RUN apt-get update \
    && apt-get install -y \
        libicu-dev \
        libonig-dev \
        libzip-dev \
        unzip \
        curl \
        gnupg \
        && docker-php-ext-install \
            intl \
            pdo_mysql \
            zip \
        && curl -sL https://deb.nodesource.com/setup_14.x | bash - \
        && apt-get install -y nodejs

# Copiamos los archivos de la aplicación en el directorio de trabajo del contenedor
COPY . /var/www/html

# Asignamos permisos al directorio de trabajo
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Agregamos el archivo de configuración de Apache con las opciones necesarias para Laravel
COPY docker/apache2.conf /etc/apache2/sites-available/000-default.conf

# Habilitamos los módulos necesarios de Apache
RUN a2enmod rewrite

# Exponemos el puerto 80 para poder acceder a la aplicación desde fuera del contenedor
EXPOSE 80

# Definimos el directorio de trabajo
WORKDIR /var/www/html

# Configuramos las variables de entorno para la conexión con MySQL
ENV DB_HOST=mysql
ENV DB_PORT=3306
ENV DB_DATABASE=mi_basedatos
ENV DB_USERNAME=mi_usuario
ENV DB_PASSWORD=mi_contraseña

# Ejecutamos los comandos necesarios para instalar las dependencias de Laravel
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Ejecutamos los comandos necesarios para generar la llave de aplicación de Laravel
RUN php artisan key:generate

# Ejecutamos los comandos necesarios para migrar la base de datos de Laravel
RUN php artisan migrate --force

# Ejecutamos los comandos necesarios para generar el archivo de configuración de caché de Laravel
RUN php artisan config:cache

# Ejecutamos los comandos necesarios para generar el archivo de ruta de caché de Laravel
RUN php artisan route:cache

# Ejecutamos los comandos necesarios para generar el archivo de vista de caché de Laravel
RUN php artisan view:cache

# Definimos el comando predeterminado que se ejecutará al iniciar el contenedor
CMD ["apache2-foreground"]
