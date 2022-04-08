#=========================================
# Multi stage build - base image
#=========================================
FROM nginx:1.21-alpine AS base

# Override default shell
SHELL ["/bin/ash", "-oeux", "pipefail", "-c"]

RUN apk --no-cache add tzdata && \
    cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
    apk del tzdata

# Place config template file into the image
COPY .docker/nginx/default.conf.template /etc/nginx/conf.d/default.conf.template

# Replace conf file with env variable PHP_HOST
# Change conf template file to conf file
# Start nginx foreground
CMD /bin/sh -c 'sed "s/\${PHP_HOST}/${PHP_HOST}/" /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf && nginx -g "daemon off;"'

#=========================================
# Multi stage build - local stage
#=========================================
FROM base AS local

# Install minimum required package
RUN apk update && \
    apk add --update --no-cache --virtual=.build-dependencies g++

WORKDIR /home

CMD /bin/sh -c 'sed "s/\${PHP_HOST}/${PHP_HOST}/" /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf && nginx -g "daemon off;"'

EXPOSE 80

#=========================================
# Multi stage build - production stage
#=========================================
FROM base AS deploy

# Define env variable for nginx conf
ENV PHP_HOST=127.0.0.1

# Copy only application public directory into the image
COPY public /home/public

# Replace conf file with env variable PHP_HOST
# Change conf template file to conf file
# Start nginx foreground
CMD /bin/sh -c 'sed "s/\${PHP_HOST}/${PHP_HOST}/" /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf && nginx -g "daemon off;"'