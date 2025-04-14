FROM node:18-alpine AS builder

WORKDIR /app
COPY . .
RUN npm install
RUN npx vite build

FROM httpd:2.4

COPY --from=builder /app/build/ /usr/local/apache2/htdocs/
COPY httpd.conf /usr/local/apache2/conf/httpd.conf

EXPOSE 3000
CMD ["httpd-foreground"]

