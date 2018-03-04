FROM php:7-fpm

RUN apt-get update && apt-get install && \
    curl -sS https://getcomposer.org/installer | php && \
    apt-get install -y git && \
    mv composer.phar /usr/local/bin/composer
WORKDIR /var/www
