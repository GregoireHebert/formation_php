FROM php:7.2-fpm-alpine
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

CMD [ "php", "./index.php" ]
