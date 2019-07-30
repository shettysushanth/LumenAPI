FROM php:7.2.2-apache

RUN docker-php-ext-install pdo_mysql \
    && a2enmod rewrite

RUN apt update \
    && apt install -y git \
    mysql-client \
    unzip