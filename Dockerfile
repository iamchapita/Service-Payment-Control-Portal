ARG PHP_VERSION=8.2-cli
ARG NODE_VERSION=18

FROM PHP_VERSION as base

RUN apt-get update -y && apt-get install -y libmcrypt-dev git openssl zip unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo

RUN composer install --optimize-autoloader --no-dev && \
    php artisan optimize:clear && \
    php artisan cache:clear && \
    php artisan config:clear

FROM node:${NODE_VERSION} as node_modules_go_brrr

RUN mkdir /app
RUN mkdir -p  /app

WORKDIR /app
COPY . .
COPY --from=base /var/www/html/vendor /app/vendor

RUN npm install && \
    npm run build

FROM base

COPY --from=node_modules_go_brrr /app/public /var/www/html/public-npm
RUN rsync -ar /var/www/html/public-npm/ /var/www/html/public/ \
    && rm -rf /var/www/html/public-npm \
    && chown -R www-data:www-data /var/www/html/public

CMD [ "php", "artisan", "serve", "--host=0.0.0.0", "--port=80" ]

EXPOSE 80
