FROM node:18-alpine AS builder

WORKDIR /app
COPY . .
RUN npm install
RUN npx vite build

FROM nginx:latest

COPY --from=builder /app/build /usr/share/nginx/html
COPY nginx.conf /etc/nginx/nginx.conf

EXPOSE 3000

CMD ["nginx", "-g", "daemon off;"]
