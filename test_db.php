<?php
$host = getenv('DB_HOST');
$port = getenv('DB_PORT');
$dbname = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$conn) {
    die("Lỗi kết nối: " . pg_last_error());
} else {
    echo "Kết nối thành công!";
}
?>
