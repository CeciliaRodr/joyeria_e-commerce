FROM wordpress:php8.2-apache
RUN rm -rf /etc/apache2/mods-enabled/mpm_* \
    && a2enmod mpm_prefork rewrite
COPY app/public/wp-content /var/www/html/wp-content
