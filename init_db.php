<?php
$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$conn) {
    die("Lỗi kết nối: " . pg_last_error());
}

$sql = "
CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL
);

INSERT INTO users (name, email) VALUES
('Nguyễn Văn A', 'a@example.com'),
('Trần Thị B', 'b@example.com')
ON CONFLICT DO NOTHING;
";

$result = pg_query($conn, $sql);

if ($result) {
    echo "Bảng `users` đã được tạo thành công!";
} else {
    echo "Lỗi khi tạo bảng: " . pg_last_error();
}

pg_close($conn);
?>
