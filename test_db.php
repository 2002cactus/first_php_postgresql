<?php
$conn = pg_connect("host=host dbname=admindb user=admin password=12345");

if (!$conn) {
    die("Lỗi kết nối: " . pg_last_error());
} else {
    echo "Kết nối PostgreSQL thành công!";
}
?>
