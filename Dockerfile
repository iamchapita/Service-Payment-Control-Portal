FROM php:8.2-cli

RUN apt-get update -y && apt-get install -y libmcrypt-dev git openssl zip unzip build-essential libssl-dev

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo
RUN git clone https://github.com/nodejs/node.git \
 && cd node \
 && ./configure \
 && make \
 && sudo make install

WORKDIR /app
COPY . /app

RUN composer install && \
    touch .env && \
    echo "APP_KEY=$APP_KEY" >> .env && \
    php artisan key:generate && \
    php artisan cache:clear && \
    php artisan config:clear && \
    npm install && \
    npm run production \
    php artisan optimize:clear 

CMD [ "php", "artisan", "serve", "--host=0.0.0.0", "--port=80" ]

EXPOSE 80
