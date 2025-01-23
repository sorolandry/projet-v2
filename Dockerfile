
FROM php:8.1-apache


RUN docker-php-ext-install pdo pdo_mysql

COPY ./public /var/www/html


RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
