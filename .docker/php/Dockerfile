#=========================================
# Multi stage build - base image
#=========================================
FROM php:8.1-fpm-alpine AS base

# Work dir difinition
ENV WORKDIR=/home
WORKDIR $WORKDIR

# Composer environment
ENV COMPOSER_HOME=/composer
# timezone environment
ENV TZ=Asia/Tokyo
# locale
ENV LANG=ja_JP.UTF-8

# Set Timezone
RUN apk --no-cache add tzdata && \
    cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
    apk del tzdata

# Install packages
RUN apk --no-cache update && \
    apk --no-cache upgrade && \
    apk --no-cache add \
    curl-dev \
    freetype-dev \
    libzip-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libxml2-dev \
    zlib-dev \
    pcre-dev \
    g++ \
    make \
    autoconf \
    openssl \
    bash \
    vim \
    git \
    && docker-php-ext-install \
    curl \
    dom \
    pdo \
    pdo_mysql \
    simplexml \
    zip \
    opcache \
    && docker-php-ext-configure gd \
    --with-jpeg=/usr/include/ \
    --with-freetype=/usr/include/  \
    && docker-php-ext-install gd \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && rm -rf /var/cache/apk/*

#=============================================
# Multi stage build - local and testing stage
#=============================================
FROM base AS development

RUN apk add nodejs npm
RUN chmod -R 777 /root

# Place php.ini file into the image 
COPY ./.docker/php/php.development.ini /usr/local/etc/php/php.ini

#=========================================
# Multi stage build - production stage
#=========================================
FROM base AS deploy

# Place application into image
COPY . $WORKDIR
COPY ./.docker/php/php.production.ini /usr/local/etc/php/php.ini

# Variables for linux user
ARG UID=991
ARG UNAME=www
ARG GID=991
ARG GNAME=www

# Set up scripts
RUN set -x \
    && composer install --no-progress --no-dev \
    && php artisan config:clear \
    && addgroup ${GNAME} -g ${GID} \
    # Add linux user
    && adduser -D -G ${GNAME} -u ${UID} ${UNAME} \
    # Change application authority
    && chown -R ${UNAME}:${GNAME} ${WORKDIR} \
    && chown -R ${UNAME}:${GNAME} /home/${UNAME}

USER ${UNAME} 