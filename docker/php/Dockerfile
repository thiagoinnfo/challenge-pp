FROM php:7.4-fpm-alpine

COPY composer.lock composer.json /var/www/

WORKDIR /var/www

RUN apk --update add --no-cache \
    $PHPIZE_DEPS \
    bash \
    oniguruma-dev \
    libpng-dev \
    openssl-dev \
    gd \
    nano \
    libxml2-dev \
    postgresql-dev \
    git \
    \
    && rm -rf /var/cache/apk/*

RUN docker-php-ext-install \
        pdo \
        pdo_mysql \
        mbstring \
        gd \
        soap \
        xml \
        ctype \
        pcntl \
        opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer;

COPY . /var/www

CMD ["php-fpm", "-F", "-O"]