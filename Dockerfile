FROM node:18 AS node_builder
WORKDIR /app
COPY package*.json ./
RUN npm ci --silent
COPY . .
RUN npm run build

FROM composer:2 AS vendor_builder
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

FROM php:8.2-fpm
RUN apt-get update \
    && apt-get install -y git unzip libonig-dev libxml2-dev libzip-dev zlib1g-dev libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip \
    && rm -rf /var/lib/apt/lists/*

# Copy vendor and built assets from builders
WORKDIR /var/www/html
COPY --from=vendor_builder /app/vendor /var/www/html/vendor
COPY --from=node_builder /app/public/build /var/www/html/public/build

# Copy application code
COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache || true

WORKDIR /var/www/html
EXPOSE 9000
CMD ["php-fpm"]
