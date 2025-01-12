FROM php:8.2-cli

# Install necessary dependencies, including netcat-openbsd
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev git unzip netcat-openbsd && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql

# Set the working directory
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Install Symfony dependencies
COPY . .

# Install Symfony PHP dependencies
# RUN composer install --optimize-autoloader
RUN composer install --no-scripts --no-autoloader

# Make wait-for-it script executable
COPY wait-for-it.sh /usr/local/bin/wait-for-it.sh
RUN chmod +x /usr/local/bin/wait-for-it.sh

# Expose the port Symfony runs on
EXPOSE 8000

# Start the Symfony built-in server
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
