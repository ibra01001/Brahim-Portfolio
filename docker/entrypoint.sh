#!/bin/bash
set -e

# Render sets $PORT (default 10000). Apache needs to listen on that port.
PORT=${PORT:-10000}

echo "Starting Laravel on port $PORT..."

# Update Apache to listen on $PORT
if grep -q "Listen 80" /etc/apache2/ports.conf 2>/dev/null; then
    sed -i "s/Listen 80/Listen $PORT/" /etc/apache2/ports.conf
elif ! grep -q "Listen $PORT" /etc/apache2/ports.conf 2>/dev/null; then
    echo "Listen $PORT" >> /etc/apache2/ports.conf
fi
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:$PORT>/" /etc/apache2/sites-available/000-default.conf || true
sed -i "s/:80/:$PORT/g" /etc/apache2/sites-available/000-default.conf || true

# Clear stale cache that may contain dev providers (e.g. Pail)
echo "Clearing bootstrap cache..."
rm -f bootstrap/cache/*.php || true
su www-data -s /bin/bash -c "php artisan package:discover --ansi || true"

# Ensure storage permissions (Render filesystem is ephemeral)
mkdir -p storage/framework/{sessions,views,cache} storage/app/public bootstrap/cache storage/logs
chown -R www-data:www-data storage bootstrap/cache || true
chmod -R 775 storage bootstrap/cache || true

# Create storage symlink if not exists (idempotent)
if [ ! -L public/storage ]; then
    echo "Linking storage..."
    su www-data -s /bin/bash -c "php artisan storage:link || true"
fi

# Run migrations (safe for production)
echo "Running migrations..."
su www-data -s /bin/bash -c "php artisan migrate --force --no-interaction" || echo "Migrations failed or no DB - will retry on next deploy"

# Cache config/routes/views for production (ignore failures if APP_KEY missing at build)
echo "Caching config..."
su www-data -s /bin/bash -c "php artisan config:cache || true"
su www-data -s /bin/bash -c "php artisan route:cache || true"
su www-data -s /bin/bash -c "php artisan view:cache || true"

# Ensure APP_KEY exists
if [ -z "$APP_KEY" ]; then
    echo "WARNING: APP_KEY is empty. Set it in Render environment variables!"
fi

# Fix ownership again after artisan commands
chown -R www-data:www-data storage bootstrap/cache || true

echo "Starting Apache on port $PORT..."
exec "$@"
