FROM ubuntu:latest AS builder

ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get install -y \
    php graphviz \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app
COPY . .

RUN scripts/build

FROM php:8.2-apache

COPY --from=builder /app/dist/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html
RUN a2enmod rewrite && a2enmod headers
