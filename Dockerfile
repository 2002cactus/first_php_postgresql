# Sử dụng image PHP có Apache
FROM php:8.1-apache

# Cài đặt các thư viện cần thiết
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql pgsql

# Cấu hình Apache
COPY ./html /var/www/html/

# Phân quyền thư mục
RUN chown -R www-data:www-data /var/www/html

# Khởi động Apache
CMD ["apache2-foreground"]
