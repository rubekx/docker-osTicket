FROM php:7.2-apache

RUN apt-get update 

RUN apt-get install -y \
    git \
    zip \
    curl \
    sudo \
    nano \
    unzip \
    libicu-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    g++ \
    iputils-ping

RUN apt-get install -y gnupg && \
curl -sL https://deb.nodesource.com/setup_10.x | bash - && \
apt-get install -y nodejs

RUN apt-get install -y python3 python3-pip wget

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN a2enmod rewrite headers

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install \
    bz2 \
    intl \
    iconv \
    bcmath \
    opcache \
    calendar \
    mbstring \
    pdo_mysql \
    zip

ARG uid
RUN useradd -G www-data,root -u $uid -d /home/osticket osticket
RUN mkdir -p /home/osticket/.composer && \
    chown -R osticket:osticket /home/osticket

# 13. Composer operation timed out (IPv6 issues)#
RUN sh -c "echo 'precedence ::ffff:0:0/96 100' >> /etc/gai.conf"
