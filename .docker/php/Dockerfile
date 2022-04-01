#=========================================
# Multi stage build - base image
#=========================================
FROM php:8.1-fpm-bullseye AS base

ENV WORKDIR=/var/www/html

WORKDIR $WORKDIR

# composer environment
ENV COMPOSER_HOME=/composer

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer


RUN apt-get update \
    && apt-get -y install --no-install-recommends \
    locales \
    git \
    unzip \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    libonig-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libjpeg-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && locale-gen en_US.UTF-8 \
    && localedef -f UTF-8 -i en_US en_US.UTF-8 \
    && docker-php-ext-install \
    intl \
    pdo_mysql \
    zip \
    bcmath \
    gd \
    && docker-php-ext-configure gd \
    --with-freetype=/usr/include/ \
    --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && composer config -g process-timeout 3600 \
    && composer config -g repos.packagist composer https://packagist.org

#=========================================
# Multi stage build - local stage
#=========================================
FROM base AS development

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash -
RUN apt install nodejs

COPY ./.docker/php/php.development.ini /usr/local/etc/php/php.ini

#=========================================
# Multi stage build - testing stage
#=========================================

# TODO
# FROM base AS staging

#=========================================
# Multi stage build - production stage
#=========================================
FROM base AS deploy

# variable for creating linux user
ARG UID=991
ARG UNAME=www
ARG GID=991
ARG GNAME=www

COPY . $WORKDIR
COPY ./.docker/php/php.production.ini /usr/local/etc/php/php.ini

RUN set -x \
    && composer install --no-progress --no-dev \
    && php artisan config:clear \
    && addgroup ${GNAME} -g ${GID} \
    && adduser -D -G ${GNAME} -u ${UID} ${UNAME} \
    && chown -R ${UNAME}:${GNAME} ${WORKDIR} \
    && mv /root/.composer /home/${UNAME}/ \
    && chown -R ${UNAME}:${GNAME} /home/${UNAME}
