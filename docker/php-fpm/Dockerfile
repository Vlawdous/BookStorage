FROM php:8.1.13-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    wget \
    zlib1g-dev \
    libmcrypt-dev \
    libzip-dev \
    openssl \
    unzip

RUN docker-php-ext-install zip

RUN docker-php-ext-install pdo pdo_pgsql

COPY --from=composer /usr/bin/composer /usr/bin/composer

# Добавляем XDebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

WORKDIR /var/www
