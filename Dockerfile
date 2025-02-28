# Sử dụng PHP với Apache
FROM php:8.1-apache

# Cài đặt extension PostgreSQL cho PHP
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo_pgsql pgsql

# Thiết lập ServerName để tránh cảnh báo Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Sao chép toàn bộ mã nguồn vào thư mục web của Apache
COPY . /var/www/html/
