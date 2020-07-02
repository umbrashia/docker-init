FROM php:7.4.7-apache

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    gnupg2

RUN curl "https://packages.microsoft.com/keys/microsoft.asc" | apt-key add -

RUN curl https://packages.microsoft.com/config/debian/10/prod.list \
        > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get install -y --no-install-recommends \
        locales \
        apt-transport-https \
    && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen \
    && locale-gen

RUN ACCEPT_EULA=Y apt-get update && ACCEPT_EULA=Y apt-get install -y \
        unixodbc-dev \
        msodbcsql17

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN pecl install sqlsrv pdo_sqlsrv xdebug

# enable sql power
RUN docker-php-ext-enable sqlsrv pdo_sqlsrv xdebug

# add rerite mode in php
RUN a2enmod rewrite

# need to be restart 
RUN service apache2 restart