#!/bin/bash
# Chờ PostgreSQL sẵn sàng trước khi chạy init_db.php
echo "⏳ Đang kiểm tra database..."
sleep 10

# Chạy init_db.php để tạo bảng & chèn dữ liệu
php /var/www/html/init_db.php

# Khởi động Apache
apache2-foreground
