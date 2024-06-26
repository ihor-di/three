FROM php:8.3-fpm-alpine

ARG TZ=Europe/Kiev
ARG user=app
ARG uid=1000

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apk update \
    && apk add --no-cache curl libpq-dev icu-dev zip unzip bash gmp-dev $PHPIZE_DEPS

RUN set -eux \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && true \

RUN  docker-php-ext-configure intl \
    && docker-php-ext-install pdo_pgsql intl bcmath opcache exif pcntl gmp

RUN apk update && apk add --no-cache libzip-dev && docker-php-ext-configure zip && docker-php-ext-install zip

RUN rm -rf /tmp/* /var/tmp/* \
    && docker-php-source delete

RUN adduser -G "www-data" -u $uid -D -h /home/$user $user

RUN mkdir -p /home/$user/.composer && \
    chown -R $uid:$uid /home/$user

WORKDIR /var/www/html

USER $user
