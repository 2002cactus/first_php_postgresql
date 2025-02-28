<?php
$host = getenv('DB_HOST');
$port = getenv('DB_PORT');
$dbname = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

// Thử kết nối lại nhiều lần nếu database chưa sẵn sàng
$max_attempts = 5;
$attempts = 0;
$conn = false;

while ($attempts < $max_attempts) {
    $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
    if ($conn) break;
    echo "⏳ Chờ database sẵn sàng...\n";
    sleep(5);
    $attempts++;
}

if (!$conn) {
    die("❌ Lỗi kết nối: " . pg_last_error() . "\n");
} else {
    echo "✅ Kết nối PostgreSQL thành công!\n";
}

// Tạo bảng users nếu chưa có
$sql = "
CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
";
pg_query($conn, $sql) or die("❌ Lỗi khi tạo bảng: " . pg_last_error());

// Chèn dữ liệu mẫu nếu chưa có
$insert_query = "
INSERT INTO users (name, email) VALUES
('Nguyễn Văn A', 'a@example.com'),
('Trần Thị B', 'b@example.com')
ON CONFLICT (email) DO NOTHING;
";
pg_query($conn, $insert_query) or die("❌ Lỗi khi chèn dữ liệu: " . pg_last_error());

echo "✅ Dữ liệu đã được chèn thành công!\n";
pg_close($conn);
?>
