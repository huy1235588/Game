<?php
// Lấy cấu hình từ tệp config.php
$config = require_once 'config.php';

try {
    // Khởi tạo kết nối PDO
    $dsn = "mysql:host={$config['database']['host']};dbname={$config['database']['name']};charset={$config['database']['charset']}";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $pdo = new PDO($dsn, $config['database']['user'], $config['database']['password'], $options);
    // echo "Kết nối cơ sở dữ liệu thành công!\n";

} catch (PDOException $e) {
    // Xử lý lỗi kết nối
    if ($config['debug']) {
        die("Kết nối thất bại: " . $e->getMessage());
    } else {
        die("Kết nối thất bại. Vui lòng thử lại sau.");
    }
}
