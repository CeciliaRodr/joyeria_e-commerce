FROM wordpress:php8.2-apache
RUN rm -rf /etc/apache2/mods-enabled/mpm_* \
    && a2enmod mpm_prefork rewrite \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf
COPY app/public/wp-content /var/www/html/wp-content
RUN rm -f /var/www/html/wp-config-docker.php
