FROM wordpress:php8.2-apache
RUN find /etc/apache2/mods-enabled/ -name "mpm_*" -delete \
    && ln -s /etc/apache2/mods-available/mpm_prefork.conf /etc/apache2/mods-enabled/ \
    && ln -s /etc/apache2/mods-available/mpm_prefork.load /etc/apache2/mods-enabled/ \
    && a2enmod rewrite
COPY app/public/wp-content /var/www/html/wp-content
RUN rm -f /var/www/html/wp-config-docker.php
