# Sử dụng PHP 8.1 với Apache
FROM php:8.1-apache

# Cập nhật và cài đặt các thư viện cần thiết
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/include/postgresql/ \
    && docker-php-ext-install pdo_pgsql pgsql

# Thêm cấu hình ServerName để tránh cảnh báo Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Sao chép mã nguồn vào container
COPY ./ /var/www/html/

# Phân quyền thư mục
RUN chown -R www-data:www-data /var/www/html

# Khởi động Apache
CMD ["apache2-foreground"]

# Sao chép script entrypoint
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Chạy entrypoint khi container khởi động
ENTRYPOINT ["/entrypoint.sh"]
