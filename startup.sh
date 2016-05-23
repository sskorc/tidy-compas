#! /bin/bash

cd /var/www/tidy-compass

composer install -n --optimize-autoloader

php app/console cache:clear --env=prod --no-debug

chown -R www-data:www-data /tmp/sf && chmod -R 770 /tmp/sf
