ARG PHP_VERSION=8.4

FROM php:${PHP_VERSION}-fpm-bullseye

RUN apt-get update -y && apt-get install -y nginx supervisor libpq-dev cron

RUN docker-php-ext-install pdo pdo_pgsql pgsql

RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

COPY ./.docker/nginx-site.conf /etc/nginx/sites-enabled/default
COPY ./.docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY ./.docker/entrypoint.sh /scripts/entrypoint.sh

RUN chmod +x /scripts/entrypoint.sh

WORKDIR /var/www

COPY --chown=www-data:www-data . .

RUN composer install --optimize-autoloader

EXPOSE 80

ENTRYPOINT ["/scripts/entrypoint.sh"]