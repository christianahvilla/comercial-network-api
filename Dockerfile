FROM php:7.2-apache

LABEL maintainer="christianahvilla@gmail.com"

# Install PHP
RUN apt-get update && apt-get install -y \
    curl \
    zlib1g-dev \
    libzip-dev \
    nano \
    unzip

# Add and Enable PHP-PDO Extenstions
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql
RUN docker-php-ext-install zip

# # Install PHP Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#set our application folder as an environment variable
ENV APP_HOME /var/www/html

RUN a2enmod rewrite

#change uid and gid of apache to docker user uid/gid
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

COPY --chown=www-data:www-data . $APP_HOME

#Expose Port 8000 since this is our dev environment
EXPOSE 8000