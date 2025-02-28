<?php
$conn = pg_connect("host=dpg-cv0v6itsvqrc73dsdau0-a dbname=admindb_vp8z user=admindb_vp8z_user password=MPpvVpXzANXVNuIfAvvIfXM9djJKAxou");

if (!$conn) {
    die("Lỗi kết nối: " . pg_last_error());
} else {
    echo "Kết nối PostgreSQL thành công!";
}
?>
