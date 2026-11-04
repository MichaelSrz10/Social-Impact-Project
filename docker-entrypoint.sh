#!/bin/sh
set -e

# 1. Configurar puerto dinámico de Render (por defecto 10000 o 8080) en 0.0.0.0
PORT="${PORT:-8080}"
sed -i -E "s/Listen .*/Listen 0.0.0.0:${PORT}/" /etc/apache2/ports.conf
sed -i -E "s/<VirtualHost [^>]+>/<VirtualHost 0.0.0.0:${PORT}>/" /etc/apache2/sites-available/000-default.conf

# 2. Asegurar permisos de directorios de almacenamiento y caché
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 3. Montaje de claves secretas de Passport si existen en /etc/secrets (Render Secret Files)
if [ -f "/etc/secrets/oauth-private.key" ]; then
    cp /etc/secrets/oauth-private.key /var/www/html/storage/oauth-private.key
    chown www-data:www-data /var/www/html/storage/oauth-private.key
    chmod 600 /var/www/html/storage/oauth-private.key
fi

if [ -f "/etc/secrets/oauth-public.key" ]; then
    cp /etc/secrets/oauth-public.key /var/www/html/storage/oauth-public.key
    chown www-data:www-data /var/www/html/storage/oauth-public.key
    chmod 660 /var/www/html/storage/oauth-public.key
fi

# 4. Optimización de producción en Laravel (solo si APP_KEY está definida)
if [ -n "$APP_KEY" ]; then
    echo "Optimizando configuraciones y rutas de Laravel..."
    php artisan config:cache
    php artisan route:cache
fi

# 5. Ejecución controlada de migraciones en producción
# Si falla, el script se detiene de inmediato (sin || true) para evitar arranques inconsistentes.
if [ "${RUN_MIGRATIONS}" = "true" ]; then
    echo "Ejecutando migraciones controladas en base de datos de producción..."
    php artisan migrate --force --isolated
fi

# 6. Iniciar servidor Apache en primer plano
exec apache2-foreground
