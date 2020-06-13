FROM php:7.2-apache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# installs memcached and enables it in apache
RUN apt-get update 
RUN apt-get install -y libmemcached-dev zlib1g-dev \
    && pecl install memcached
RUN docker-php-ext-enable memcached

#Install git
RUN apt-get update \
    && apt-get install -y git \
    && apt-get install -y vim

RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get install -y libzip-dev
RUN docker-php-ext-install zip

RUN apt-get update -y && apt-get install -y sendmail libpng-dev
RUN docker-php-ext-install gd

#copiar vhosts
COPY vhosts/ /etc/apache2/sites-enabled/

#habilitar vhosts
RUN a2ensite *
RUN a2dissite 000-default

RUN a2enmod setenvif headers deflate filter expires include negotiation

#habilitando mod_rewrite
RUN a2enmod rewrite

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    # Tools
    apt-utils \
    wget 

EXPOSE 80
