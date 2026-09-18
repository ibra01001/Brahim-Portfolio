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
su -p www-data -s /bin/bash -c "php artisan package:discover --ansi || true"

# Ensure storage permissions (Render filesystem is ephemeral)
mkdir -p storage/framework/{sessions,views,cache} storage/app/public bootstrap/cache storage/logs
# On local bind-mount (APP_ENV=local), chown would break host permissions – skip it
if [ "${APP_ENV:-production}" != "local" ]; then
    chown -R www-data:www-data storage bootstrap/cache || true
fi
chmod -R 775 storage bootstrap/cache || true

# Create storage symlink if not exists (idempotent)
if [ ! -L public/storage ]; then
    echo "Linking storage..."
    su -p www-data -s /bin/bash -c "php artisan storage:link || true"
fi

# Wait for PostgreSQL if using pgsql (handles both DB_* and DATABASE_URL on Render)
if [ "${DB_CONNECTION:-}" = "pgsql" ] || [ -n "${DATABASE_URL:-}" ] || [ -n "${DB_URL:-}" ]; then
    echo "Waiting for PostgreSQL to be ready..."
    # Determine connection params; prefer DATABASE_URL/DB_URL if present (Render)
    DB_URL_VAL="${DATABASE_URL:-${DB_URL:-}}"
    if [ -n "$DB_URL_VAL" ]; then
        PGHOST=$(php -r 'echo parse_url($argv[1], PHP_URL_HOST) ?: "";' "$DB_URL_VAL" 2>/dev/null || echo "")
        PGPORT=$(php -r 'echo parse_url($argv[1], PHP_URL_PORT) ?: "";' "$DB_URL_VAL" 2>/dev/null || echo "")
        PGUSER=$(php -r 'echo parse_url($argv[1], PHP_URL_USER) ?: "";' "$DB_URL_VAL" 2>/dev/null || echo "")
        PGDATABASE=$(php -r 'echo ltrim(parse_url($argv[1], PHP_URL_PATH) ?: "", "/");' "$DB_URL_VAL" 2>/dev/null || echo "")
        [ -z "$PGHOST" ] && PGHOST="${DB_HOST:-127.0.0.1}"
        [ -z "$PGPORT" ] && PGPORT="${DB_PORT:-5432}"
        [ -z "$PGUSER" ] && PGUSER="${DB_USERNAME:-portfolio}"
        [ -z "$PGDATABASE" ] && PGDATABASE="${DB_DATABASE:-portfolio}"
    else
        PGHOST="${DB_HOST:-127.0.0.1}"
        PGPORT="${DB_PORT:-5432}"
        PGUSER="${DB_USERNAME:-portfolio}"
        PGDATABASE="${DB_DATABASE:-portfolio}"
    fi
    echo "Checking Postgres at $PGHOST:$PGPORT (db=$PGDATABASE user=$PGUSER)..."
    MAX_TRIES=30
    TRIES=0
    until pg_isready -h "$PGHOST" -p "$PGPORT" -U "$PGUSER" -d "$PGDATABASE" >/dev/null 2>&1 || pg_isready -h "$PGHOST" -p "$PGPORT" >/dev/null 2>&1; do
        TRIES=$((TRIES+1))
        if [ $TRIES -ge $MAX_TRIES ]; then
            echo "WARNING: Postgres not ready after $MAX_TRIES attempts - proceeding to migrate anyway (will retry)."
            break
        fi
        echo "Postgres not ready yet (attempt $TRIES/$MAX_TRIES) - waiting 2s..."
        sleep 2
    done
    echo "Postgres ready (or timeout) - continuing."
fi

# Run migrations (safe for production)
echo "Running migrations..."
su -p www-data -s /bin/bash -c "php artisan migrate --force --no-interaction" || echo "Migrations failed or no DB - will retry on next deploy"
su -p www-data -s /bin/bash -c "php artisan db:seed --class=PortfolioDataSeeder --force || true"

# Cache config/routes/views for production (ignore failures if APP_KEY missing at build)
echo "Caching config..."
su -p www-data -s /bin/bash -c "php artisan config:cache || true"
su -p www-data -s /bin/bash -c "php artisan route:cache || true"
su -p www-data -s /bin/bash -c "php artisan view:cache || true"

# Ensure APP_KEY exists
if [ -z "$APP_KEY" ]; then
    echo "WARNING: APP_KEY is empty. Set it in Render environment variables!"
fi

# Fix ownership again after artisan commands (skip on local bind-mount)
if [ "${APP_ENV:-production}" != "local" ]; then
    chown -R www-data:www-data storage bootstrap/cache || true
fi

echo "Starting Apache on port $PORT..."
exec "$@"
