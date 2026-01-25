FROM php:8.3-apache

ENV ENV=production

WORKDIR /var/www/
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite

RUN rm -f /etc/localtime \
    && ln -sv /usr/share/zoneinfo/America/Denver /etc/localtime \
    && echo "America/Denver" > /etc/timezone

COPY . /var/www/
COPY deployment/000-default.conf /etc/apache2/sites-available/
