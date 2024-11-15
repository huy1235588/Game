<?php
include '../../../middleware/authMiddleware.php';
authMiddleware();

// Khai báo thư viện
require_once __DIR__ . '../../../../../config/env.php';
require_once __DIR__ . '../../../../../config/db.php';
require_once __DIR__ . '../../../../../controller/UserController.php';

// Tạo đối tượng truy vấn
$userController = new UserController($pdo);

// Lấy thông tin của người dùng
$user = $userController->getUserById($_SESSION['userId']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Dashboard | Front - Admin &amp; Dashboard Template</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="/assets/icon/logo.ico">

    <!-- CSS -->
    <link rel="stylesheet" href="/admin/component/header.css">
    <link rel="stylesheet" href="/admin/component/aside.css">
    <link rel="stylesheet" href="/admin/component/footer.css">
    <link rel="stylesheet" href="users.css">

    <!-- JQuery -->
    <script src="../../../assets/js/jquery-3.7.1.min.js"></script>
</head>

<body class="">
    <!-- START HEADER -->
    <?php
    include '../../../component/header.php';
    ?>
    <!-- END HEADER -->

    <!-- START SIDEBAR -->
    <script>
        // Set active cho sidebar-link 
        activeSidebarLink = ["Pages", "Users", "Overview"];
    </script>
    <?php
    include '../../../component/aside.php';
    ?>
    <!-- END SIDEBAR -->

    <div class="menu-overlay"></div>

    <!-- START MAIN CONTENT -->
    <main id="content" class="main">
        <article class="content">
            <!-- Page header -->
            <div class="page-header">
                <h1 class="page-header-title">Overview</h1>
            </div>
        </article>
    </main>
    <!-- END MAIN CONTENT -->

    <!-- START FOOTER -->
    <?php
    include '../../../component/footer.php';
    ?>
    <!-- END FOOTER -->

    <script src="/admin/assets/js/index.js"></script>
</body>

</html>