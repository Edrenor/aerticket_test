FROM php:7.4-fpm

RUN apt-get update -y && apt-get install -y libmcrypt-dev openssl libpq-dev libfreetype6-dev libpng-dev libjpeg62-turbo-dev jpegoptim optipng pngquant gifsicle libzip-dev

RUN docker-php-ext-install pdo pdo_pgsql zip exif pcntl
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_pgsql
WORKDIR /var/www
COPY . /var/www
#RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000
