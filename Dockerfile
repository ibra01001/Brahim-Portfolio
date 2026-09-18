# Stage 1: Build frontend assets with Node
FROM node:22 AS node_builder
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci --silent
COPY . .
RUN npm run build

# Stage 2: Install PHP dependencies
FROM composer:2 AS vendor_builder
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Stage 3: Production runtime with Apache
FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        unzip \
        libonig-dev \
        libxml2-dev \
        libzip-dev \
        zlib1g-dev \
        libpq-dev \
        libsqlite3-dev \
        sqlite3 \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libicu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo pdo_pgsql pdo_sqlite pdo_mysql \
        mbstring zip bcmath intl gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache modules
RUN a2enmod rewrite headers

# Configure Apache DocumentRoot
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!DocumentRoot /var/www/html/public/public!DocumentRoot /var/www/html/public!g' /etc/apache2/sites-available/*.conf || true

# Allow .htaccess overrides
RUN printf '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n' > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel

WORKDIR /var/www/html

# Copy vendor and built assets from builders
COPY --from=vendor_builder /app/vendor /var/www/html/vendor
COPY --from=node_builder /app/public/build /var/www/html/public/build

# Copy application code
COPY . /var/www/html

# Copy entrypoint
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Clear stale bootstrap cache generated on host (contains dev providers)
RUN rm -f bootstrap/cache/*.php

# Ensure storage and cache are writable
RUN mkdir -p storage/framework/{sessions,views,cache} storage/app/public bootstrap/cache \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Generate optimized autoloader and package manifest for production
RUN php artisan package:discover --ansi || true

# Expose Render port (Render sets $PORT, default 10000)
EXPOSE 10000

ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]
