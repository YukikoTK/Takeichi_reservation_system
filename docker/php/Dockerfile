FROM php:8.2.8-fpm

COPY php.ini /usr/local/etc/php/

RUN apt update \
    && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip \
    && docker-php-ext-install pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update

RUN apt-get update && \
    apt-get install -y libpng-dev zlib1g-dev libzip-dev unzip default-mysql-client && \
    docker-php-ext-install gd pdo_mysql zip

WORKDIR /var/www