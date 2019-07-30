FROM php:7.2.2-apache

RUN docker-php-ext-install pdo_mysql \
    && a2enmod rewrite

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

RUN apt update \
    && apt install -y git \
    mysql-client \
    unzip

COPY ./ /var/www/html
COPY ./docker/php/apache2/000-default.conf /etc/apache2/sites-enabled/000-default.conf

RUN composer install

# Install certificate for DB connection
# https://docs.microsoft.com/en-us/azure/mariadb/howto-configure-ssl
RUN curl https://cacerts.digicert.com/BaltimoreCyberTrustRoot.crt.pem > /var/www/html/build/SSL/BaltimoreCyberTrustRoot.crt.pem

CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]
