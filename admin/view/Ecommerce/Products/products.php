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
    <link rel="stylesheet" href="products.css">

    <!-- JQuery -->
    <script src="../../../assets/js/jquery-3.7.1.min.js"></script>
</head>

<body class="">
    <!-- START HEADER -->
    <?php
    include './component/header.php';
    ?>
    <!-- END HEADER -->

    <!-- START SIDEBAR -->
    <?php
    include './component/aside.php';
    ?>
    <!-- END SIDEBAR -->

    <div class="menu-overlay"></div>

    <!-- START MAIN CONTENT -->
    <main id="content" class="main">
        <article class="content">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Product</h1>
                </div>
            </div>
        </article>
    </main>
    <!-- END MAIN CONTENT -->

    <script src="../../../assets/js/index.js"></script>
</body>

</html>