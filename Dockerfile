# Sử dụng PHP với Apache
FROM php:8.1-apache

# Cài đặt extension PostgreSQL cho PHP
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql pgsql

# Sao chép mã nguồn PHP vào thư mục web của Apache
COPY . /var/www/html/
