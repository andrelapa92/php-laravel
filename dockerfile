FROM php:8.2-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configuração de permissões
WORKDIR /var/www/html
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html

# Executar o servidor
CMD php artisan serve --host=0.0.0.0 --port=8000
