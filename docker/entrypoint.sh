#!/bin/sh

set -e

cd /var/www/html

mkdir -p \
    storage/app/public \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

chown -R www-data:www-data storage bootstrap/cache

if [ "$1" = "php-fpm" ]; then
    php artisan optimize --no-interaction
    chown -R www-data:www-data storage bootstrap/cache
fi

exec "$@"
