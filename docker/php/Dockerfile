# Используйте правильный синтаксис команд для apk
FROM php:7.4-fpm-alpine

RUN apk update &&  \
    apk add --no-cache \
    git \
    libzip-dev \
    unzip \
    autoconf \
    build-base \
    postgresql-client \
    postgresql-dev

RUN docker-php-ext-install pdo_pgsql
RUN pecl install zip && docker-php-ext-enable zip

RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN pecl install xdebug-2.9.2 \
    docker-php-ext-enable xdebug.so --ini-name 99-xdebug.ini

# Убедитесь, что у вас есть файл xdebug.ini в той же директории, где находится Dockerfile
#COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN apk add --no-cache git  # Добавьте флаг --no-cache для очистки кеша apk

RUN docker-php-ext-enable xdebug
RUN composer global require phpunit/phpunit

#WORKDIR /var/www/basic
#RUN #composer create-project --prefer-dist yiisoft/yii2-app-basic .
#CMD ["php -S 0.0.0.0:80 -t /"]

CMD ["php-fpm"]

EXPOSE 9000
