# Sử dụng image PHP với Apache
FROM php:8.1-apache

# Cài đặt PostgreSQL extension
RUN docker-php-ext-install pgsql pdo_pgsql

# Copy mã nguồn vào container
COPY . /var/www/html/

# Cấp quyền cho thư mục
RUN chown -R www-data:www-data /var/www/html

# Mở cổng 80
EXPOSE 80

# Chạy Apache
CMD ["apache2-foreground"]
