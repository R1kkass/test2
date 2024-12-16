FROM php:8.3-alpine

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql

CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
