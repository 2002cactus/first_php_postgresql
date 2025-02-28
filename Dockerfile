# Sử dụng PHP 8.1 với Apache
FROM php:8.1-apache

# Cập nhật và cài đặt các thư viện cần thiết
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/include/postgresql/ \
    && docker-php-ext-install pdo_pgsql pgsql

# Sao chép mã nguồn vào container
COPY ./ /var/www/html/

# Phân quyền thư mục
RUN chown -R www-data:www-data /var/www/html

# Khởi động Apache
CMD ["apache2-foreground"]
