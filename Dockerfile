FROM php:7.4-fpm-alpine
WORKDIR /app

#RUN wget https://github.com/FriendsOfPHP/pickle/releases/download/v0.6.0/pickle.phar \
#    && mv pickle.phar /usr/local/bin/pickle \
#    && chmod +x /usr/local/bin/pickle

#RUN apk --update upgrade \
#    && apk add --no-cache autoconf automake make gcc g++ bash icu-dev libzip-dev rabbitmq-c rabbitmq-c-dev \
#    && docker-php-ext-install -j$(nproc) \
#        bcmath \
#        opcache \
#        intl \
#        zip \
#        pdo_mysql

RUN apk --update upgrade \
    && apk add --no-cache autoconf automake make gcc g++ bash icu-dev libzip-dev \
    && docker-php-ext-install -j$(nproc) \
        bcmath \
        intl \
        zip \
        mysqli \
        pdo_mysql

#RUN pickle install apcu-5.1.19

#ADD etc/infrastructure/php/extensions/amqp.sh /root/install-amqp.sh
#ADD etc/infrastructure/php/extensions/xdebug.sh /root/install-xdebug.sh
#RUN apk add git
#RUN sh /root/install-amqp.sh
#RUN sh /root/install-xdebug.sh

#RUN docker-php-ext-enable \
#        amqp \
#        apcu \
#        opcache

RUN curl -sS https://get.symfony.com/cli/installer | bash && mv /root/.symfony/bin/symfony /usr/local/bin/symfony

COPY .docker/infrastructure/php/ /usr/local/etc/php/
