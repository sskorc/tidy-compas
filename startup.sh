#! /bin/bash

cd /var/www/tidy-compass

composer install -n --optimize-autoloader

php bin/console cache:clear --env=prod --no-debug

chown -R www-data:www-data /tmp/sf && chmod -R 770 /tmp/sf
