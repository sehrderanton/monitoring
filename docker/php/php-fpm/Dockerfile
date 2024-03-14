FROM php:8.3-fpm

#RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

RUN apt-get update && apt-get install -y libmcrypt-dev libpq-dev graphviz
#    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
#    && docker-php-ext-install pdo_pgsql pgsql bcmath

# install the xhprof extension to profile requests
RUN curl "http://pecl.php.net/get/xhprof-2.3.9.tgz" -fsL -o ./xhprof-2.3.9.tgz && \
        mkdir /var/xhprof && tar xf ./xhprof-2.3.9.tgz -C /var/xhprof && \
        cd /var/xhprof/xhprof-2.3.9/extension && \
        phpize && \
        ./configure && \
        make && \
        make install

COPY ./conf.d /usr/local/etc/php/conf.d

RUN docker-php-ext-enable xhprof

#folder for xhprof profiles (same as in file xhprof.ini)
RUN mkdir -m 777 /profiles

WORKDIR /app
