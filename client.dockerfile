FROM php:7-fpm

RUN apt-get update && curl -sL https://deb.nodesource.com/setup_9.x | bash && apt-get install -y nodejs && npm install -g yarn gulp && apt-get install -y wget
