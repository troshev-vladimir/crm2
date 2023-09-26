FROM composer:latest

WORKDIR /var/www/laravel

ENTRYPOINT [ "composer", "--ignore-platform-reqs" ]

# docker-compose run composer ...
# cd src/ composer ...?