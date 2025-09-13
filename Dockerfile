FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    git \
    unzip \
    zip \
    nodejs npm

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN install-php-extensions \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    curl \
    mbstring \
    zip \
    @composer

COPY . /var/www/backend-frontend

COPY nginx.conf /etc/nginx/nginx.conf
COPY supervisord.conf /etc/supervisord.conf

WORKDIR /var/www/backend-frontend

RUN mkdir -p /var/www/backend-frontend/app/Core/logs && \
    chown -R www-data:www-data /var/www/backend-frontend/app/Core/logs && \
    chmod -R 775 /var/www/backend-frontend/app/Core/logs

RUN composer install --no-dev --optimize-autoloader && npm install 

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]