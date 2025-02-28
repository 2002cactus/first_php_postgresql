<?php
$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$conn) {
    die("Lỗi kết nối: " . pg_last_error());
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>
<body>
    <h1>Chào mừng bạn đến với trang web PHP + PostgreSQL</h1>
    <p>Kết nối đến database: <strong><?php echo $dbname; ?></strong></p>

    <h2>Dữ liệu trong bảng (Ví dụ: users)</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
        </tr>

        <?php
        $query = "SELECT id, name, email FROM users";
        $result = pg_query($conn, $query);

        if ($result) {
            while ($row = pg_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                      </tr>";
            }
            pg_free_result($result);
        } else {
            echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
        }

        pg_close($conn);
        ?>
    </table>
</body>
</html>
