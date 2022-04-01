#=========================================
# Multi stage build - base image
#=========================================
FROM node:16-alpine AS node
FROM nginx:1.21-alpine AS base
SHELL ["/bin/ash", "-oeux", "pipefail", "-c"]

COPY .docker/nginx/default.conf.template /etc/nginx/conf.d/default.conf.template

CMD /bin/sh -c 'sed "s/\${PHP_HOST}/${PHP_HOST}/" /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf && nginx -g "daemon off;"'

#=========================================
# Multi stage build - local stage
#=========================================
FROM base AS local

RUN apk update && \
    apk add --update --no-cache --virtual=.build-dependencies g++

# node command
COPY --from=node /usr/local/bin /usr/local/bin
# npm command
COPY --from=node /usr/local/lib /usr/local/lib
# yarn command
COPY --from=node /opt /opt

WORKDIR /var/www/html

EXPOSE 80

#=========================================
# Multi stage build - production stage
#=========================================
FROM base AS production

ENV PHP_HOST=127.0.0.1

COPY public /var/www/html/public
