FROM php:8.2-apache AS builder

WORKDIR /app
COPY . .

RUN scripts/build

FROM php:8.2-apache

COPY --from=builder /app/dist/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html
RUN a2enmod rewrite && a2enmod headers
