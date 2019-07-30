FROM php:7.2.2-cli

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/composer

RUN apt update \
    && apt install -y git \
    mysql-client \
    unzip

RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/html/