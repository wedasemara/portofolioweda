# ---------- Frontend assets (Vite) ----------
FROM docker.io/library/node:24-alpine AS assets

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci --ignore-scripts

COPY . .
RUN npm run build

# ---------- PHP dependencies ----------
FROM docker.io/library/composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

# ---------- PHP-FPM application ----------
FROM docker.io/library/php:8.5-fpm-alpine AS app

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    && docker-php-ext-install -j"$(nproc)" \
        bcmath \
        pcntl \
        pdo_mysql \
    && apk del .build-deps

WORKDIR /var/www/html

COPY docker/php.ini /usr/local/etc/php/conf.d/99-app.ini
COPY docker/entrypoint.sh /usr/local/bin/entrypoint

COPY --from=vendor /app/vendor ./vendor
COPY artisan ./
COPY composer.json composer.lock ./
COPY app ./app
COPY bootstrap ./bootstrap
COPY config ./config
COPY database ./database
COPY public/index.php ./public/index.php
COPY resources ./resources
COPY routes ./routes
COPY storage ./storage
COPY --from=assets /app/public/build ./public/build

RUN chmod +x /usr/local/bin/entrypoint \
    && mkdir -p \
        storage/app/public \
        storage/framework/cache/data \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs \
        bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 9000

ENTRYPOINT ["/usr/local/bin/entrypoint"]
CMD ["php-fpm"]

# ---------- Nginx web server ----------
FROM docker.io/library/nginx:stable-alpine AS web

COPY docker/nginx.conf /etc/nginx/conf.d/default.conf
COPY --from=assets /app/public /var/www/html/public

EXPOSE 80
