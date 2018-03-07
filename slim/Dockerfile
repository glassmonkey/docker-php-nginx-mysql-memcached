FROM php:7-fpm

RUN apt-get update && apt-get install && \
    docker-php-ext-install pdo_mysql mysqli mbstring && \
    curl -sS https://getcomposer.org/installer | php && \
    apt-get install -y git zip unzip && \
    mv composer.phar /usr/local/bin/composer
RUN mkdir -p /var/www/html/
WORKDIR /var/www/html
ADD sample .
RUN composer install
