FROM wordpress:php8.2-apache
ARG CACHEBUST=1
RUN rm -rf /etc/apache2/mods-enabled/mpm_* \
    && a2enmod mpm_prefork rewrite \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf
COPY app/public/wp-content /var/www/html/wp-content
COPY docker-entrypoint-override.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint-override.sh
ENTRYPOINT ["docker-entrypoint-override.sh"]
CMD ["apache2-foreground"]
