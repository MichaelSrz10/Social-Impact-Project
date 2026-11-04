FROM php:8.5-apache

# Instalar dependencias del sistema y utilidades
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP necesarias para Laravel y MySQL (mbstring y opcache ya están integradas en PHP 8.5)
RUN docker-php-ext-install pdo_mysql zip exif pcntl bcmath

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Copiar configuración de VirtualHost de Apache
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Instalar Composer desde imagen oficial
COPY --from=composer:2.8 /usr/bin/composer /usr/bin/composer

# Configurar directorio de trabajo
WORKDIR /var/www/html

# Copiar manifiestos primero para cachear capas de dependencias
COPY composer.json composer.lock ./

# Instalar dependencias sin ejecutar scripts de desarrollo
RUN composer install --no-dev --no-interaction --no-scripts --prefer-dist --optimize-autoloader

# Copiar código del proyecto
COPY . .

# Regenerar autoload optimizado
RUN composer dump-autoload --optimize --no-dev

# Permisos para el usuario web
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Copiar y dar permisos al script de entrada
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Puerto por defecto (sobrescrito por $PORT en Render)
EXPOSE 8080

ENTRYPOINT ["docker-entrypoint.sh"]

