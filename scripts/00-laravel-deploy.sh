#!/usr/bin/env bash
echo 'Running composer'
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html
 
echo 'Caching config...'
php artisan config:cache
 
echo 'Caching routes...'
php artisan route:cache
 
echo 'Running migrations...'
php artisan migrate --force

echo 'Running composer update...'
composer update

echo 'Running artisan config:cache...'
php artisan config:cache

echo 'Running dump-autoload...'

php artisan route:clear
php artisan config:clear
php artisan cache:clear
php artisan config:cache
php artisan optimize
composer dump-autoload