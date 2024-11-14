<html>

<body>
    <?php
    // Tạo kết nối MySql
    require_once './config/db.php';

    try {
        // Truy vấn để lấy user
        $users = $pdo->query("select * from users")->fetchAll();

        // Hiển thị kết quả
        foreach ($users as $user) {
            foreach ($user as $key => $value) {
                echo '<p>' . $key . ': ' . $value . '</p>';
            }
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // phpinfo();
    ?>

    <a href="admin">admin</a>

</body>

</html>