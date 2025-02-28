<?php
$host = "your-postgres-host"; // Render sẽ cung cấp
$dbname = "your-database-name";
$user = "your-db-user";
$password = "your-db-password";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Kết nối PostgreSQL thất bại: " . pg_last_error());
}
echo "Kết nối PostgreSQL thành công!";
?>
