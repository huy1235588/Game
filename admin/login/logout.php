<?php
// Khởi tạo session
session_start();

// Xóa tất cả các biến session
session_unset();

// Xóa session
session_destroy();

// Chuyển hướng đến trang khác (ví dụ: trang chủ)
header("Location: /admin/login");
exit();
?>
