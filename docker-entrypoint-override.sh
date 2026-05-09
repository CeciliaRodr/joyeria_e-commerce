#!/bin/bash
rm -f /var/www/html/wp-config-docker.php
find /etc/apache2/mods-enabled/ -name "mpm_*" -delete
ln -sf /etc/apache2/mods-available/mpm_prefork.conf /etc/apache2/mods-enabled/
ln -sf /etc/apache2/mods-available/mpm_prefork.load /etc/apache2/mods-enabled/
exec docker-entrypoint.sh "$@"
