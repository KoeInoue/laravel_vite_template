#=========================================
# Multi stage build - base image
#=========================================
FROM nginx:1.21-alpine AS base

COPY .docker/nginx/default.conf.template /etc/nginx/conf.d/default.conf.template

ENV PHP_HOST=127.0.0.1

EXPOSE 80

CMD /bin/sh -c 'sed "s/\${PHP_HOST}/${PHP_HOST}/" /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf && nginx -g "daemon off;"'

#=========================================
# Multi stage build - local stage
#=========================================
FROM base AS local

COPY public /var/www/html/public

#=========================================
# Multi stage build - production stage
#=========================================
FROM base AS production

COPY public /var/www/html/public