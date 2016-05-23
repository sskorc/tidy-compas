FROM sskorc/php5-symfony-cli

RUN pecl install xdebug \
    && echo zend_extension=xdebug.so > /usr/local/etc/php/conf.d/xdebug.ini

ADD docker/php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/tidy-compass
