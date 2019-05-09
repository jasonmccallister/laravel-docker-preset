# composer
FROM composer as vendor
COPY database/ database/
# uncomment if using nova
# COPY nova/ nova/
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install --ignore-platform-reqs --no-interaction --no-plugins --no-scripts --prefer-dist

# apache
FROM php:7.2-apache-stretch
RUN apt-get update && apt-get install -y zlib1g-dev
RUN docker-php-source extract && docker-php-ext-install pdo pdo_pgsql pcntl zip bcmath && docker-php-source delete
RUN sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf && \
    sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf && a2enmod rewrite
COPY .docker/000-default.conf /etc/apache2/sites-enabled
COPY . /var/www/html
COPY --from=vendor /app/vendor/ /var/www/html/vendor/
RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache
