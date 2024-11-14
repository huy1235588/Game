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
    <link rel="icon" href="../../assets/icon/logo.ico">

    <!-- CSS -->
    <link rel="stylesheet" href="./login.css">

    <!-- JQuery -->
    <script src="../assets/js/jquery-3.7.1.min.js"></script>
</head>

<body class="">

    <!-- PHP -->
    <?php
    require_once '../../config/env.php';
    require_once '../../config/db.php';
    require_once '../../controller/UserController.php';

    // Bắt đầu phiên
    session_start();

    // Kiểm tra nếu người dùng đã đăng nhập
    if (isset($_SESSION['userId'])) {
        // Chuyển hướng đến trang chủ
        header('Location: ../');
        exit();
    }

    // Lấy dữ liệu từ form
    $userForm = isset($_POST['txtUser']) ? htmlspecialchars($_POST['txtUser']) : '';
    $passwordForm = isset($_POST['txtPassword']) ? htmlspecialchars($_POST['txtPassword']) : '';

    // Kiểm tra xem có form rỗng
    $requiredForm = array($userForm, $passwordForm);
    $emptyForm = false;

    foreach ($requiredForm as $field) {
        if (empty($field)) {
            $emptyForm = true;
        }
    }

    $checkAuth = "";

    if (!$emptyForm) {
        // Khởi tạo đối tượng để truy vấn users
        $userController = new UserController($pdo);

        //  $userController->addUser('he', 'he', 'he@gmail.com', 'he', 'Việt Nam', false, 'users');

        // Kiểm tra nếu submit form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy toàn bộ user trong Database
            $users = $userController->getAllUsers();

            $checkAuth = "Invalid credentials!";

            // Lặp từng user
            foreach ($users as $user) {
                // Kiểm tra thông tin đăng nhập và vai trò role
                if (
                    $user['Username'] == $userForm &&
                    password_verify($passwordForm, $user['Password']) &&
                    $user['Role'] == 'admin'
                ) {
                    $checkAuth = "Đăng nhập thành công!";

                    // Lưu thông tin vào session nếu đăng nhập thành công
                    $_SESSION['userId'] = $user['UserId']; // Lưu ID người dùng vào session

                    // // Chuyển hướng người dùng đến trang chính
                    header('Location: ../');
                }
            }
        }
    }

    ?>
    <!-- PHP -->

    <main class="h-full w-full">
        <!-- Logo -->
        <div class="logo-container">
            <a href="/">
                <img class="logo-img" src="../../assets/img/logo2.png" alt="">
            </a>
        </div>
        <div class="auth-form">
            <!-- Header -->
            <h1 class="auth-form-header">
                Sign in
            </h1>

            <!-- Status Auth -->
            <?php if (!empty($checkAuth)): ?>
                <p class="error-auth">
                    <!-- Icon -->
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1rem" width="1rem" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path>
                    </svg>
                    <!-- Text -->
                    <?php
                    echo $checkAuth;
                    ?>
                </p>
            <?php endif; ?>

            <!-- Form -->
            <form action="./" method="post">
                <!-- UserName -->
                <label for="login_field">
                    Username or email address
                </label>
                <div class="input-container">
                    <input name="txtUser" value="<?php echo $userForm; ?>" id="login_field" class="form-input" type="text">
                </div>
                <!-- Password -->
                <label for="password">
                    Password
                </label>
                <div class="input-container">
                    <input name="txtPassword" value="<?php echo $passwordForm; ?>" id="password" class="form-input" type="password">
                    <!-- Button show password -->
                    <button class="show-password" type="button">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="16px" width="16px" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.073 12.194 4.212 8.333c-1.52 1.657-2.096 3.317-2.106 3.351L2 12l.105.316C2.127 12.383 4.421 19 12.054 19c.929 0 1.775-.102 2.552-.273l-2.746-2.746a3.987 3.987 0 0 1-3.787-3.787zM12.054 5c-1.855 0-3.375.404-4.642.998L3.707 2.293 2.293 3.707l18 18 1.414-1.414-3.298-3.298c2.638-1.953 3.579-4.637 3.593-4.679l.105-.316-.105-.316C21.98 11.617 19.687 5 12.054 5zm1.906 7.546c.187-.677.028-1.439-.492-1.96s-1.283-.679-1.96-.492L10 8.586A3.955 3.955 0 0 1 12.054 8c2.206 0 4 1.794 4 4a3.94 3.94 0 0 1-.587 2.053l-1.507-1.507z"></path>
                        </svg>
                    </button>
                </div>
                <!-- Submit button -->
                <input class="form-submit" type="submit">
            </form>
        </div>
    </main>
    <img class="body-bg" src="../assets/img/background/login-bg.svg" alt="">

    <script>
        // Toggle password visibility
        document.querySelector('.show-password').addEventListener('click', function() {
            const passwordField = document.getElementById('password');

            // Chuyển đổi giữa 'password' and 'text' input
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
</body>

</html>