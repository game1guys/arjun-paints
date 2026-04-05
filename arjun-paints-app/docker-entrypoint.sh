#!/bin/sh
set -e
cd /var/www/html

PORT="${PORT:-8080}"
echo "[docker-entrypoint] PORT=$PORT"

# Set temporarily for local/docker runs without PaaS; production should override via env.
export APP_ENV="${APP_ENV:-production}"

if [ "${SKIP_DATABASE_MIGRATE:-0}" = "1" ]; then
  echo "[docker-entrypoint] SKIP_DATABASE_MIGRATE=1 — skipping migrations (debug only)"
else
  echo "[docker-entrypoint] php artisan migrate --force"
  php artisan migrate --force --no-interaction
fi

# Cache config/routes/views; do not fail the container if one step is flaky.
echo "[docker-entrypoint] php artisan optimize"
php artisan optimize --no-interaction || {
  echo "[docker-entrypoint] optimize failed, continuing with config:cache only"
  php artisan config:cache --no-interaction || true
}

echo "[docker-entrypoint] listening on 0.0.0.0:$PORT"
exec php artisan serve --host=0.0.0.0 --port="$PORT"
