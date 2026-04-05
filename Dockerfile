# Build from repository root (Render default: Root Directory empty).
# App lives in arjun-paints-app/
FROM php:8.3-cli-bookworm

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    curl \
    unzip \
    libpq-dev \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libicu-dev \
    libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" intl pdo pdo_pgsql zip mbstring exif pcntl bcmath gd xml xmlwriter dom \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y --no-install-recommends nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY arjun-paints-app/ .

RUN composer install --no-dev --optimize-autoloader --no-interaction --ignore-scripts

RUN cp .env.example .env && php artisan key:generate --force

RUN composer dump-autoload --optimize

ENV NODE_OPTIONS="--max-old-space-size=4096"
RUN npm ci && npm run build

RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

ENV PORT=10000
EXPOSE 10000

CMD sh -c "php artisan migrate --force && php artisan config:cache && php artisan route:cache && php artisan view:cache && exec php artisan serve --host=0.0.0.0 --port=${PORT}"
