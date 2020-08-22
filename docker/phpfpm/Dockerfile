FROM php:7.4.2-fpm

RUN apt-get update && apt-get -y install git unzip libxml2 libxml2-dev libonig-dev libpng-dev libzip-dev mediainfo ffmpeg groff bash
RUN docker-php-ext-install -j$(nproc) bcmath calendar gd iconv json pcntl pdo pdo_mysql mysqli soap tokenizer zip gd intl

# Install composer.
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer