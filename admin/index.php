<?php
include './middleware/authMiddleware.php';
authMiddleware();

// Khai báo thư viện
require_once '../config/env.php';
require_once '../config/db.php';
require_once '../controller/UserController.php';

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
    <link rel="icon" href="../assets/icon/logo.ico">

    <!-- CSS -->
    <link rel="stylesheet" href="./admin.css">

    <!-- JQuery -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
</head>

<body class="">
    <!-- START HEADER -->
    <header>
        <div class="navbar-wrap">
            <div class="navbar-logo-wrapper">
                <!-- LOGO -->
                <a href="./" class="navbar-logo">
                    <img src="/assets/img/logo2.png" class="logo-icon" alt="">
                </a>
            </div>
            <div class="navbar-content-left">
                <!-- Navbar Vertical Toggle -->
                <button type="button" class="toggle-vertical-aside">
                    <img class="toggle-collapse" src="assets/icon/collapse.svg" alt="" data-toggle="tooltip"
                        data-placement="right" data-original-title="Collapse">
                    <img class="toggle-expand" src="assets/icon/expand.svg" alt="" data-toggle="tooltip"
                        data-placement="right" data-original-title="Expand">
                </button>

                <!-- SEARCH FORM -->
                <form class="navbar-content-search">
                    <!-- INPUT SEARCH -->
                    <div class="form-search-container">
                        <div class="search-icon">
                            <img src="assets/icon/search.svg" alt="">
                        </div>
                        <input type="search" class="input-search" placeholder="Search" aria-placeholder="Search">
                        <span class="search-clear">
                            <img src="assets/icon/close.svg" alt="">
                        </span>
                    </div>
                </form>
            </div>
            <nav class="navbar-content-right">
                <ul class="navbar-list">
                    <!-- NOTIFICATION -->
                    <li class="navbar-item d-none d-sm-inline-block">
                        <div class="relative">
                            <!-- Button -->
                            <button class="navbar-btn">
                                <!-- Icon -->
                                <span class="navbar-btn-icon">
                                    <svg stroke="currentColor" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                        height="16px" width="16px" stroke-width="0" viewBox="0 0 24 24">
                                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                                        <path
                                            d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6zM7.58 4.08 6.15 2.65C3.75 4.48 2.17 7.3 2.03 10.5h2a8.445 8.445 0 0 1 3.55-6.42zm12.39 6.42h2c-.15-3.2-1.73-6.02-4.12-7.85l-1.42 1.43a8.495 8.495 0 0 1 3.54 6.42z">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                            <!-- Dropdown -->
                            <div class="navbar-dropdown">

                            </div>
                        </div>
                    </li>
                    <!-- APPS -->
                    <li class="navbar-item d-none d-sm-inline-block">
                        <div class="relative">
                            <!-- Button -->
                            <button class="navbar-btn">
                                <!-- Icon -->
                                <span class="navbar-btn-icon">
                                    <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24"
                                        height="16px" width="16px" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linejoin="round" stroke-width="2"
                                            d="M3 6.2c0-1.12 0-1.68.218-2.108a2 2 0 01.874-.874C4.52 3 5.08 3 6.2 3h.6c1.12 0 1.68 0 2.108.218a2 2 0 01.874.874C10 4.52 10 5.08 10 6.2v.6c0 1.12 0 1.68-.218 2.108a2 2 0 01-.874.874C8.48 10 7.92 10 6.8 10h-.6c-1.12 0-1.68 0-2.108-.218a2 2 0 01-.874-.874C3 8.48 3 7.92 3 6.8v-.6zM14 6.2c0-1.12 0-1.68.218-2.108a2 2 0 01.874-.874C15.52 3 16.08 3 17.2 3h.6c1.12 0 1.68 0 2.108.218a2 2 0 01.874.874C21 4.52 21 5.08 21 6.2v.6c0 1.12 0 1.68-.218 2.108a2 2 0 01-.874.874C19.48 10 18.92 10 17.8 10h-.6c-1.12 0-1.68 0-2.108-.218a2 2 0 01-.874-.874C14 8.48 14 7.92 14 6.8v-.6zM3 17.2c0-1.12 0-1.68.218-2.108a2 2 0 01.874-.874C4.52 14 5.08 14 6.2 14h.6c1.12 0 1.68 0 2.108.218a2 2 0 01.874.874C10 15.52 10 16.08 10 17.2v.6c0 1.12 0 1.68-.218 2.108a2 2 0 01-.874.874C8.48 21 7.92 21 6.8 21h-.6c-1.12 0-1.68 0-2.108-.218a2 2 0 01-.874-.874C3 19.48 3 18.92 3 17.8v-.6zM14 17.2c0-1.12 0-1.68.218-2.108a2 2 0 01.874-.874C15.52 14 16.08 14 17.2 14h.6c1.12 0 1.68 0 2.108.218a2 2 0 01.874.874C21 15.52 21 16.08 21 17.2v.6c0 1.12 0 1.68-.218 2.108a2 2 0 01-.874.874C19.48 21 18.92 21 17.8 21h-.6c-1.12 0-1.68 0-2.108-.218a2 2 0 01-.874-.874C14 19.48 14 18.92 14 17.8v-.6z">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                            <!-- Dropdown -->
                            <div class="navbar-dropdown">

                            </div>
                        </div>
                    </li>
                    <!-- ACTIVITY -->
                    <li class="navbar-item d-none d-sm-inline-block">
                        <div class="relative">
                            <!-- Button -->
                            <button class="navbar-btn">
                                <span class="navbar-btn-icon">
                                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                        height="16px" width="16px" stroke-linecap="round" stroke-linejoin="round"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 12h4l3 8l4 -16l3 8h4"></path>
                                    </svg>
                                </span>
                            </button>
                            <!-- Dropdown -->
                            <div class="navbar-dropdown">

                            </div>
                        </div>
                    </li>
                    <!-- Account -->
                    <li class="navbar-item">
                        <div class="relative">
                            <!-- Avatar -->
                            <button class="navbar-button">
                                <div class="avatar-btn">
                                    <img class="avatar-img" src="assets/img/avatar/img2.jpg" alt="">
                                    <span class="avatar-status"></span>
                                </div>
                            </button>
                            <!-- Dropdown -->
                            <div class="navbar-dropdown hs-hidden">
                                <!-- Info -->
                                <div class="dropdown-item-text">
                                    <div class="avatar">
                                        <img class="avatar-img" src="assets/img/avatar/img2.jpg"
                                            alt="Image Description">
                                    </div>
                                    <div class="dropdown-account-info">
                                        <span class="card-title h5"><?php echo $user['ProfileName'] ?></span>
                                        <span class="card-text"><?php echo $user['Email'] ?></span>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>

                                <!-- Set status -->
                                <div class="relative">
                                    <a class="dropdown-item navbar-dropdown-submenu-btn" href="javascript:;">
                                        <span class="text-truncate pr-2" title="Set status">Set status</span>
                                        <img style="margin-left: auto;" src="assets/icon/arrow-right.svg"
                                            alt="">
                                    </a>

                                    <!-- Dropdown Submenu -->
                                    <div class="navbar-dropdown navbar-dropdown-submenu hs-hidden">
                                        <a class="dropdown-item" href="#">
                                            <span class="dropdown-set-status border-status-available">

                                            </span>
                                            <span class="text-truncate pr-2" title="Available">
                                                Available
                                            </span>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span class="dropdown-set-status border-status-busy">

                                            </span>
                                            <span class="text-truncate pr-2" title="Busy">
                                                Busy
                                            </span>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span class="dropdown-set-status border-status-away">

                                            </span>
                                            <span class="text-truncate pr-2" title="Away">
                                                Away
                                            </span>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">
                                            <span class="text-truncate pr-2" title="Reset status">
                                                Reset status
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <!-- Profile link -->
                                <a class="dropdown-item" href="#">
                                    <span class="text-truncate" title="Profile &amp; account">Profile &amp;
                                        account</span>
                                </a>

                                <!-- Setting Link -->
                                <a class="dropdown-item" href="#">
                                    <span class="text-truncate" title="Settings">Settings</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- Sign out -->
                                <a class="dropdown-item" href="login.html">
                                    <span class="text-truncate pr-2" title="Sign out">Sign out</span>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- END HEADER -->

    <!-- START SIDEBAR -->
    <aside class="navbar-vertical-aside">
        <div class="sidebar-container">
            <div class="sidebar-offset">
                <div class="sidebar-logo-wrapper">
                    <!-- LOGO -->
                    <a href="./" class="sidebar-logo">
                        <img src="/assets/img/logo.png" class="sidebar-logo-icon" alt="">
                        <img src="/assets/img/logo-mini.png" class="sidebar-logo-mini-icon" alt="">
                    </a>
                </div>

                <!-- START CONTENT -->
                <main class="sidebar-content">
                    <ul class="sidebar-list navbar-nav nav-tabs">
                        <!-- DASHBOARDS -->
                        <li class="sidebar-item-has-menu">
                            <a class="sidebar-item-link sidebar-link active" href="javascript:;">
                                <span class="sidebar-item-icon">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                        viewBox="0 0 1024 1024" height="18px" width="18px"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M946.5 505L560.1 118.8l-25.9-25.9a31.5 31.5 0 0 0-44.4 0L77.5 505a63.9 63.9 0 0 0-18.8 46c.4 35.2 29.7 63.3 64.9 63.3h42.5V940h691.8V614.3h43.4c17.1 0 33.2-6.7 45.3-18.8a63.6 63.6 0 0 0 18.7-45.3c0-17-6.7-33.1-18.8-45.2zM568 868H456V664h112v204zm217.9-325.7V868H632V640c0-22.1-17.9-40-40-40H432c-22.1 0-40 17.9-40 40v228H238.1V542.3h-96l370-369.7 23.1 23.1L882 542.3h-96.1z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="sidebar-item-text">
                                    Dashboards
                                </span>
                            </a>
                            <!-- SUBMENU -->
                            <ul class="sidebar-submenu-list nav show">
                                <li class="sidebar-item">
                                    <a class="sidebar-link active" href="javascript:;">
                                        <span class="sidebar-submenu-item-icon">
                                            <img src="assets/icon/circle.svg" alt="">
                                        </span>
                                        <span class="sidebar-item-text">
                                            Default
                                        </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="javascript:;">
                                        <span class="sidebar-submenu-item-icon">
                                            <img src="assets/icon/circle.svg" alt="">
                                        </span>
                                        <span class="sidebar-item-text">
                                            Alternative
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Pages -->
                        <li class="sidebar-item-has-menu">
                            <a class="sidebar-item-link sidebar-link" href="javascript:;">
                                <span class="sidebar-item-icon">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                        height="18px" width="18px" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M2 4v16h20V4H2zm18 4.67h-2.5V6H20v2.67zm-2.5 2H20v2.67h-2.5v-2.67zM4 6h11.5v12H4V6zm13.5 12v-2.67H20V18h-2.5z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="sidebar-item-text">
                                    Pages
                                </span>
                            </a>
                            <!-- SUBMENU -->
                            <ul class="sidebar-submenu-list nav">
                                <!-- USER -->
                                <li class="sidebar-item sidebar-submenu-item-has-menu">
                                    <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                        <span class="sidebar-submenu-item-icon">
                                            <img src="assets/icon/circle.svg" alt="">
                                        </span>
                                        <span class="sidebar-item-text">
                                            Users
                                        </span>
                                    </a>

                                    <!-- SUBMENU 2 -->
                                    <ul class="sidebar-submenu-list nav">
                                        <!-- OVERVIEW -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Overview
                                                </span>
                                            </a>
                                        </li>
                                        <!-- LEADERBOARD -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Leaderboard
                                                </span>
                                            </a>
                                        </li>
                                        <!-- ADD USER -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Add User
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- USER PROFILE -->
                                <li class="sidebar-item sidebar-submenu-item-has-menu">
                                    <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                        <span class="sidebar-submenu-item-icon">
                                            <img src="assets/icon/circle.svg" alt="">
                                        </span>
                                        <span class="sidebar-item-text">
                                            User Profile
                                        </span>
                                    </a>

                                    <!-- SUBMENU 2 -->
                                    <ul class="sidebar-submenu-list nav">
                                        <!-- PROFILE -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Profile
                                                </span>
                                            </a>
                                        </li>
                                        <!-- TEAMS -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Teams
                                                </span>
                                            </a>
                                        </li>
                                        <!-- PROJECTS -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Projects
                                                </span>
                                            </a>
                                        </li>
                                        <!-- CONNECTIONS -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Connections
                                                </span>
                                            </a>
                                        </li>
                                        <!-- MY PROFILES -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    My Profiles
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- ACCOUNT-->
                                <li class="sidebar-item sidebar-submenu-item-has-menu">
                                    <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                        <span class="sidebar-submenu-item-icon">
                                            <img src="assets/icon/circle.svg" alt="">
                                        </span>
                                        <span class="sidebar-item-text">
                                            Acount
                                        </span>
                                    </a>

                                    <!-- SUBMENU 2 -->
                                    <ul class="sidebar-submenu-list nav">
                                        <!-- SETTINGS -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Settings
                                                </span>
                                            </a>
                                        </li>
                                        <!-- BILLING -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Billing
                                                </span>
                                            </a>
                                        </li>
                                        <!-- INVOICE -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Invoice
                                                </span>
                                            </a>
                                        </li>
                                        <!-- API KEYS -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Api Keys
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- E-COMMERCE -->
                                <li class="sidebar-item sidebar-submenu-item-has-menu">
                                    <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                        <span class="sidebar-submenu-item-icon">
                                            <img src="assets/icon/circle.svg" alt="">
                                        </span>
                                        <span class="sidebar-item-text">
                                            E-commerce
                                        </span>
                                    </a>

                                    <!-- SUBMENU 2 -->
                                    <ul class="sidebar-submenu-list nav">
                                        <!-- Overview -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Overview
                                                </span>
                                            </a>
                                        </li>
                                        <!-- Products -->
                                        <li class="sidebar-item sidebar-submenu-item-has-menu">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Products
                                                </span>
                                            </a>

                                            <!-- SUBMENU 3 -->
                                            <ul class="sidebar-submenu-list nav">
                                                <!-- PRODUCTS -->
                                                <li class="sidebar-item">
                                                    <a class="sidebar-submenu-item-link sidebar-link"
                                                        href="view/Ecommerce/Products">
                                                        <span class="sidebar-submenu-item-icon">
                                                            <img src="assets/icon/circle.svg" alt="">
                                                        </span>
                                                        <span class="sidebar-item-text">
                                                            Products
                                                        </span>
                                                    </a>
                                                </li>
                                                <!-- PRODUCT DETAILS -->
                                                <li class="sidebar-item">
                                                    <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                        <span class="sidebar-submenu-item-icon">
                                                            <img src="assets/icon/circle.svg" alt="">
                                                        </span>
                                                        <span class="sidebar-item-text">
                                                            Product Details
                                                        </span>
                                                    </a>
                                                </li>
                                                <!-- ADD PRODUCT -->
                                                <li class="sidebar-item">
                                                    <a class="sidebar-submenu-item-link sidebar-link"
                                                        href="javascript:;">
                                                        <span class="sidebar-submenu-item-icon">
                                                            <img src="assets/icon/circle.svg" alt="">
                                                        </span>
                                                        <span class="sidebar-item-text">
                                                            Add Product
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- Orders -->
                                        <li class="sidebar-item sidebar-submenu-item-has-menu">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Orders
                                                </span>
                                            </a>

                                            <!-- SUBMENU 3 -->
                                            <ul class="sidebar-submenu-list nav">
                                                <!-- ORDERS -->
                                                <li class="sidebar-item">
                                                    <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                        <span class="sidebar-submenu-item-icon">
                                                            <img src="assets/icon/circle.svg" alt="">
                                                        </span>
                                                        <span class="sidebar-item-text">
                                                            Orders
                                                        </span>
                                                    </a>
                                                </li>
                                                <!-- ORDER DETAILS -->
                                                <li class="sidebar-item">
                                                    <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                        <span class="sidebar-submenu-item-icon">
                                                            <img src="assets/icon/circle.svg" alt="">
                                                        </span>
                                                        <span class="sidebar-item-text">
                                                            Order Details
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- Customers -->
                                        <li class="sidebar-item sidebar-submenu-item-has-menu">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Customers
                                                </span>
                                            </a>

                                            <!-- SUBMENU 3 -->
                                            <ul class="sidebar-submenu-list nav">
                                                <!-- Products -->
                                                <li class="sidebar-item">
                                                    <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                        <span class="sidebar-submenu-item-icon">
                                                            <img src="assets/icon/circle.svg" alt="">
                                                        </span>
                                                        <span class="sidebar-item-text">
                                                            Products
                                                        </span>
                                                    </a>
                                                </li>
                                                <!-- Product Details -->
                                                <li class="sidebar-item">
                                                    <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                        <span class="sidebar-submenu-item-icon">
                                                            <img src="assets/icon/circle.svg" alt="">
                                                        </span>
                                                        <span class="sidebar-item-text">
                                                            Product Details
                                                        </span>
                                                    </a>
                                                </li>
                                                <!-- Add Product -->
                                                <li class="sidebar-item">
                                                    <a class="sidebar-submenu-item-link sidebar-link"
                                                        href="javascript:;">
                                                        <span class="sidebar-submenu-item-icon">
                                                            <img src="assets/icon/circle.svg" alt="">
                                                        </span>
                                                        <span class="sidebar-item-text">
                                                            Add Product
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- Manage Reviews -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Manage Reviews
                                                </span>
                                            </a>
                                        </li>
                                        <!-- Checkout -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Checkout
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- PROJECTS -->
                                <li class="sidebar-item sidebar-submenu-item-has-menu">
                                    <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                        <span class="sidebar-submenu-item-icon">
                                            <img src="assets/icon/circle.svg" alt="">
                                        </span>
                                        <span class="sidebar-item-text">
                                            Projects
                                        </span>
                                    </a>

                                    <!-- SUBMENU 2 -->
                                    <ul class="sidebar-submenu-list nav">
                                        <!-- OVERVIEW -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Overview
                                                </span>
                                            </a>
                                        </li>
                                        <!-- TIMELINE -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Timeline
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- PROJECT -->
                                <li class="sidebar-item sidebar-submenu-item-has-menu">
                                    <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                        <span class="sidebar-submenu-item-icon">
                                            <img src="assets/icon/circle.svg" alt="">
                                        </span>
                                        <span class="sidebar-item-text">
                                            Project
                                        </span>
                                    </a>

                                    <!-- SUBMENU 2 -->
                                    <ul class="sidebar-submenu-list nav">
                                        <!-- OVERVIEW -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Overview
                                                </span>
                                            </a>
                                        </li>
                                        <!-- FILES -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Files
                                                </span>
                                            </a>
                                        </li>
                                        <!-- ACTIVITY -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Activity
                                                </span>
                                            </a>
                                        </li>
                                        <!-- TEAMS -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Teams
                                                </span>
                                            </a>
                                        </li>
                                        <!-- SETTINGS -->
                                        <li class="sidebar-item">
                                            <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                                <span class="sidebar-submenu-item-icon">
                                                    <img src="assets/icon/circle-north.svg" alt="">
                                                </span>
                                                <span class="sidebar-item-text">
                                                    Settings
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- REFERRALS -->
                                <li class="sidebar-item ">
                                    <a class="sidebar-submenu-item-link sidebar-link" href="">
                                        <span class="sidebar-submenu-item-icon">
                                            <img src="assets/icon/circle.svg" alt="">
                                        </span>
                                        <span class="sidebar-item-text">
                                            Referrals
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Apps -->
                        <li class="sidebar-item-has-menu">
                            <a class="sidebar-item-link sidebar-link" href="javascript:;">
                                <span class="sidebar-item-icon">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                        viewBox="0 0 512 512" height="18px" width="18px"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M104 160a56 56 0 1 1 56-56 56.06 56.06 0 0 1-56 56zm152 0a56 56 0 1 1 56-56 56.06 56.06 0 0 1-56 56zm152 0a56 56 0 1 1 56-56 56.06 56.06 0 0 1-56 56zM104 312a56 56 0 1 1 56-56 56.06 56.06 0 0 1-56 56zm152 0a56 56 0 1 1 56-56 56.06 56.06 0 0 1-56 56zm152 0a56 56 0 1 1 56-56 56.06 56.06 0 0 1-56 56zM104 464a56 56 0 1 1 56-56 56.06 56.06 0 0 1-56 56zm152 0a56 56 0 1 1 56-56 56.06 56.06 0 0 1-56 56zm152 0a56 56 0 1 1 56-56 56.06 56.06 0 0 1-56 56z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="sidebar-item-text">
                                    Apps
                                </span>
                            </a>
                            <!-- SUBMENU -->
                            <ul class="sidebar-submenu-list nav">
                                <!-- CALENDAR -->
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="javascript:;">
                                        <span class="sidebar-submenu-item-icon">
                                            <img src="assets/icon/circle.svg" alt="">
                                        </span>
                                        <span class="sidebar-item-text">
                                            Calendars
                                        </span>
                                    </a>
                                </li>
                                <!-- FILE MANAGER -->
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="javascript:;">
                                        <span class="sidebar-submenu-item-icon">
                                            <img src="assets/icon/circle.svg" alt="">
                                        </span>
                                        <span class="sidebar-item-text">
                                            File Manager
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Authentication -->
                        <li class="sidebar-item-has-menu">
                            <a class="sidebar-item-link sidebar-link" href="javascript:;">
                                <span class="sidebar-item-icon">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                        height="18px" width="18px" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 17c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm6-9h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM8.9 6c0-1.71 1.39-3.1 3.1-3.1s3.1 1.39 3.1 3.1v2H8.9V6zM18 20H6V10h12v10z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="sidebar-item-text">
                                    Authentication
                                </span>
                            </a>
                            <!-- SUBMENU -->
                            <ul class="sidebar-submenu-list nav">
                                <!-- SIGN IN -->
                                <li class="sidebar-item">
                                    <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                        <span class="sidebar-submenu-item-icon">
                                            <img src="assets/icon/circle.svg" alt="">
                                        </span>
                                        <span class="sidebar-item-text">
                                            Sign In
                                        </span>
                                    </a>
                                </li>
                                <!-- SIGN UP -->
                                <li class="sidebar-item">
                                    <a class="sidebar-submenu-item-link sidebar-link" href="javascript:;">
                                        <span class="sidebar-submenu-item-icon">
                                            <img src="assets/icon/circle.svg" alt="">
                                        </span>
                                        <span class="sidebar-item-text">
                                            Sign Up
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- WELCOME PAGE -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="">
                                <span class="sidebar-item-icon">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                        viewBox="0 0 576 576" height="18px" width="18px"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="sidebar-item-text">
                                    Welcome Page
                                </span>
                            </a>
                        </li>
                    </ul>
                </main>
                <!-- END CONTENT -->

                <!-- START FOOTER -->
                <div class="sidebar-footer">

                </div>
                <!-- END FOOTER -->
            </div>
        </div>
    </aside>
    <!-- END SIDEBAR -->

    <div class="menu-overlay"></div>

    <!-- START MAIN CONTENT -->
    <main id="content" class="main">
        <article class="content">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Dashboard</h1>
                </div>
            </div>
        </article>
    </main>
    <!-- END MAIN CONTENT -->

    <script src="assets/js/index.js"></script>
</body>

</html>