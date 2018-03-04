FROM composer:latest as builder

WORKDIR /app
COPY . /app
RUN composer install --no-interaction --classmap-authoritative --no-dev --prefer-dist

FROM alpine:latest

COPY --from=builder /app /app
