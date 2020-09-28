FROM php:7.4-fpm
RUN apt-get update 
RUN apt-get install -y libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip