FROM nginx:latest

COPY ./nginx.conf /etc/nginx/nginx.conf

COPY --from=app:latest /app /app
