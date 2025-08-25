FROM php:8.2-fpm

# Install system dependencies and Node.js/npm
RUN apt-get update && apt-get install -y \
    supervisor \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip \
    # Node.js 18.x (LTS) & npm install
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Set working directory
WORKDIR /var/www/html

# Copy dependency definition files and install dependencies
COPY src/composer.json src/composer.lock ./
RUN composer install --no-autoloader --no-scripts

COPY src/package.json src/package-lock.json ./
RUN npm install

# Copy application files
COPY src .

# After copying all files, run composer again to generate autoloader and run scripts
RUN composer install

# Set permissions for storage and bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Copy supervisord config
COPY docker/php/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expose port 9000
EXPOSE 9000

# Run supervisord
CMD ["/usr/bin/supervisord"]
