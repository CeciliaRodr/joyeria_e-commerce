FROM wordpress:latest
RUN a2dismod mpm_event mpm_worker && a2enmod mpm_prefork
COPY wp-content /var/www/html/wp-content
