# syntax = docker/dockerfile:experimental

# Default to PHP 8.2, but we attempt to match
# the PHP version from the user (wherever `flyctl launch` is run)
# Valid version values are PHP 7.4+
ARG PHP_VERSION=8.2
ARG NODE_VERSION=18
FROM fideloper/fly-laravel:${PHP_VERSION} as base

# PHP_VERSION needs to be repeated here
# See https://docs.docker.com/engine/reference/builder/#understand-how-arg-and-from-interact
ARG PHP_VERSION

LABEL fly_launch_runtime="laravel"

# copy application code, skipping files based on .dockerignore
COPY . /var/www/html

RUN composer install --optimize-autoloader --no-dev \
    && mkdir -p storage/logs \
    && php artisan optimize:clear \
    && chown -R www-data:www-data /var/www/html \
    # && sed -i 's/protected \$proxies/protected \$proxies = "*"/g' app/Http/Middleware/TrustProxies.php \
    && echo "MAILTO=\"\"\n* * * * * www-data /usr/bin/php /var/www/html/artisan schedule:run" > /etc/cron.d/laravel \
    && cp .fly/entrypoint.sh /entrypoint \
    && chmod +x /entrypoint

# If we're using Octane...
RUN if grep -Fq "laravel/octane" /var/www/html/composer.json; then \
        rm -rf /etc/supervisor/conf.d/fpm.conf; \
        if grep -Fq "spiral/roadrunner" /var/www/html/composer.json; then \
            mv /etc/supervisor/octane-rr.conf /etc/supervisor/conf.d/octane-rr.conf; \
            if [ -f ./vendor/bin/rr ]; then ./vendor/bin/rr get-binary; fi; \
            rm -f .rr.yaml; \
        else \
            mv .fly/octane-swoole /etc/services.d/octane; \
            mv /etc/supervisor/octane-swoole.conf /etc/supervisor/conf.d/octane-swoole.conf; \
        fi; \
        rm /etc/nginx/sites-enabled/default; \
        ln -sf /etc/nginx/sites-available/default-octane /etc/nginx/sites-enabled/default; \
    fi

# Multi-stage build: Build static assets
# This allows us to not include Node within the final container
FROM node:${NODE_VERSION} as node_modules_go_brrr

RUN mkdir /app

RUN mkdir -p  /app
WORKDIR /app
COPY . /app

RUN composer install && \
    touch .env && \
    echo "APP_KEY=$APP_KEY" >> .env && \
    php artisan key:generate && \
    php artisan cache:clear && \
    php artisan config:clear && \
    php artisan optimize:clear && \
    php artisan migrate \

CMD [ "php", "artisan", "serve", "--host=0.0.0.0", "--port=80" ]

EXPOSE 80
