FROM wordpress:php8.2-apache
RUN rm -f /etc/apache2/mods-enabled/mpm_event.conf \
          /etc/apache2/mods-enabled/mpm_event.load \
    && a2enmod mpm_prefork rewrite
COPY app/public/wp-content /var/www/html/wp-content
