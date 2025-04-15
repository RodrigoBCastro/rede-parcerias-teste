FROM php:8.2-fpm
WORKDIR /var/www
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    gnupg \
    ca-certificates \
    lsb-release \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm@latest

COPY . /var/www

RUN composer install --no-dev --optimize-autoloader

RUN npm install && npm run build

EXPOSE 9000
CMD ["php-fpm"]
