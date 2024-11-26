FROM php:8.3.2-apache

RUN apt-get update && apt-get install -y \
    curl \
    g++ \
    git \
    libzip-dev \
    libbz2-dev \
    libfreetype6-dev \
    libicu-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libpng-dev \
    libreadline-dev \
    sudo \
    unzip \
    zip \
    nano \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install zip
RUN docker-php-ext-install mysqli pdo pdo_mysql


# Install composer
ENV COMPOSER_HOME /composer
ENV PATH ./vendor/bin:/composer/vendor/bin:$PATH
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

#timeZone
ENV TZ=Asia/Taipei
RUN ln -snf /usr/share/zoneinfo/${TZ} /etc/localtime && echo ${TZ} > /etc/timezone
# RUN a2enmod ssl
RUN a2enmod rewrite