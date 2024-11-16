<?php
include '../../../../../admin/middleware/authMiddleware.php';
authMiddleware();

// Khai báo thư viện
require_once __DIR__ . '../../../../../../config/env.php';
require_once __DIR__ . '../../../../../../config/db.php';
require_once __DIR__ . '../../../../../../controller/UserController.php';

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
    <link rel="stylesheet" href="/admin/component/header.css">
    <link rel="stylesheet" href="/admin/component/aside.css">
    <link rel="stylesheet" href="/admin/component/footer.css">
    <link rel="stylesheet" href="/admin/component/page-header.css">
    <link rel="icon" href="/assets/icon/logo.ico">

    <!-- CSS -->
    <link rel="stylesheet" href="add-user.css">

    <!-- JQuery -->
    <script src="/admin/assets/js/jquery-3.7.1.min.js"></script>
</head>

<body class="">
    <!-- START HEADER -->
    <?php
    include '../../../../component/header.php';
    ?>
    <!-- END HEADER -->

    <!-- START SIDEBAR -->
    <script>
        // Set active cho sidebar-link 
        activeSidebarLink = ["Pages", "Users", "Add User"];
    </script>
    <?php
    include '../../../../component/aside.php';
    ?>
    <!-- END SIDEBAR -->

    <div class="menu-overlay"></div>

    <!-- START MAIN CONTENT -->
    <main id="content" class="main">
        <article class="content">
            <!-- Page header -->
            <div class="page-header">
                <?php
                $breadcrumb = ['Pages', 'Users', 'Add User'];
                $pageHeader = 'Add User';
                include '../../../../component/page-header.php';
                ?>
            </div>

            <!-- Form -->
            <form class="form">
                <div class="form-container">
                    <!-- Step -->
                    <ul class="step-list">
                        <li class="step-item active focus">
                            <a class="step-content-wrapper" href="javascript:;">
                                <span class="step-icon">1</span>
                                <div class="step-content">
                                    <span class="step-title">Profile</span>
                                </div>
                            </a>
                        </li>

                        <li class="step-item">
                            <a class="step-content-wrapper" href="javascript:;">
                                <span class="step-icon">2</span>
                                <div class="step-content">
                                    <span class="step-title">Billing address</span>
                                </div>
                            </a>
                        </li>

                        <li class="step-item">
                            <a class="step-content-wrapper" href="javascript:;">
                                <span class="step-icon">3</span>
                                <div class="step-content">
                                    <span class="step-title">Confirmation</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- End Step -->

                    <!-- Content Step Form -->
                    <div id="addUserStepFormContent">
                        <!-- Profile -->
                        <div id="addUserStepProfile" class="card active">
                            <!-- Body -->
                            <table class="card-body">
                                <!-- AVATAR -->
                                <tr class="row form-group">
                                    <td class="col-form-label">
                                        <label>
                                            Avatar
                                        </label>
                                    </td>

                                    <td class="col-form-input col-form-avatar">
                                        <!-- Avatar -->
                                        <label class="avatar-container" for="avatarUploader">
                                            <img id="avatarImg" class="avatar-img" src="/admin/assets/img/avatar/img1.jpg" alt="Image Description">

                                            <input type="file" class="avatar-uploader-input" id="avatarUploader">

                                            <span class="avatar-uploader-trigger">
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="16px" width="16px" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"></path>
                                                </svg>
                                            </span>
                                        </label>
                                        <!-- End Avatar -->

                                        <button type="button" class="avatar-delete-btn">Delete</button>
                                    </td>
                                </tr>
                                <!-- End AVATAR -->

                                <!-- FULL NAME -->
                                <tr class="row form-group">
                                    <td class="col-form-label">
                                        <label for="firstNameLabel">
                                            Full name
                                        </label>
                                    </td>

                                    <td class="col-form-input col-form-name">
                                        <input type="text" class="form-control form-control-text" name="firstName" id="firstNameLabel" placeholder="First name" aria-label="Clarice">
                                        <input type="text" class="form-control form-control-text" name="lastName" id="lastNameLabel" placeholder="Last name" aria-label="Boone">
                                    </td>
                                </tr>
                                <!-- End FULL NAME -->

                                <!-- EMAIL -->
                                <tr class="row form-group">
                                    <td class="col-form-label">
                                        <label for="emailLabel" class="col-sm-3 col-form-label input-label">
                                            Email
                                        </label>
                                    </td>

                                    <td class="col-form-input">
                                        <input type="email" class="form-control" name="email" id="emailLabel" placeholder="clarice@example.com" aria-label="clarice@example.com">
                                    </td>
                                </tr>
                                <!-- End EMAIL -->

                                <!-- PHONE -->
                                <tr class="js-add-field row form-group">
                                    <td class="col-form-label">
                                        <label for="phoneLabel" class="col-sm-3 col-form-label input-label">
                                            Phone
                                            <span class="input-label-secondary">
                                                (Optional)
                                            </span>
                                        </label>
                                    </td>

                                    <td class="col-form-input">
                                        <input type="text" class="js-masked-input form-control" name="phone" id="phoneLabel" placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx">
                                    </td>
                                </tr>
                                <!-- End PHONE -->




                            </table>
                            <!-- End Body -->
                        </div>
                        <!-- End Profile -->

                        <!-- BillingAddress -->
                        <div id="addUserStepBillingAddress" class="card" style="display: none;">
                            <!-- Body -->
                            <div class="card-body">
                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="locationLabel" class="col-sm-3 col-form-label input-label">Location</label>

                                    <div class="col-sm-9">
                                        <!-- Select -->
                                        <div class="mb-3">
                                            <select class="js-select2-custom custom-select select2-hidden-accessible" size="1" style="opacity: 0;" id="locationLabel">
                                                <label for="addressLine2Label" class="col-sm-3 col-form-label input-label">Address line 2 <span class="input-label-secondary">(Optional)</span></label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="addressLine2" id="addressLine2Label" placeholder="Your address" aria-label="Your address">

                                                    <!-- Container For Input Field -->
                                                    <div id="addAddressFieldContainer"></div>

                                                    <a href="javascript:;" class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary">
                                                        <i class="tio-add"></i> Add address
                                                    </a>
                                                </div>
                                        </div>
                                        <!-- End Form Group -->

                                        <!-- Form Group -->
                                        <div class="row">
                                            <label for="zipCodeLabel" class="col-sm-3 col-form-label input-label">Zip code <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="You can find your code in a postal address."></i></label>

                                            <div class="col-sm-9">
                                                <input type="text" class="js-masked-input form-control" name="zipCode" id="zipCodeLabel" placeholder="Your zip code" aria-label="Your zip code" maxlength="7">
                                            </div>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                    <!-- End Body -->

                                    <!-- Footer -->
                                    <div class="card-footer d-flex align-items-center">
                                        <button type="button" class="btn btn-ghost-secondary">
                                            <i class="tio-chevron-left"></i> Previous step
                                        </button>

                                        <div class="ml-auto">
                                            <button type="button" class="btn btn-primary">
                                                Next <i class="tio-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- End Footer -->
                                </div>
                            </div>
                        </div>
                        <!-- End BillingAddress -->

                        <!-- Confirmation -->
                        <div id="addUserStepConfirmation" class="card" style="display: none;">
                            <!-- Profile Cover -->
                            <div class="profile-cover">
                                <div class="profile-cover-img-wrapper">
                                    <!-- <img class="profile-cover-img" src="assets\img\1920x400\img1.jpg" alt="Image Description"> -->
                                </div>
                            </div>
                            <!-- End Profile Cover -->

                            <!-- Avatar -->
                            <div class="avatar avatar-xxl avatar-circle avatar-border-lg profile-cover-avatar">
                                <!-- <img class="avatar-img" src="assets\img\160x160\img9.jpg" alt="Image Description"> -->
                            </div>
                            <!-- End Avatar -->

                            <!-- Body -->
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-6 text-sm-right">Full name:</dt>
                                    <dd class="col-sm-6">Ella Lauda</dd>

                                    <dt class="col-sm-6 text-sm-right">Email:</dt>
                                    <dd class="col-sm-6">ella@example.com</dd>

                                    <dt class="col-sm-6 text-sm-right">Phone:</dt>
                                    <dd class="col-sm-6">+1 (609) 972-22-22</dd>

                                    <dt class="col-sm-6 text-sm-right">Organization:</dt>
                                    <dd class="col-sm-6">Htmlstream</dd>

                                    <dt class="col-sm-6 text-sm-right">Department:</dt>
                                    <dd class="col-sm-6">-</dd>

                                    <dt class="col-sm-6 text-sm-right">Account type:</dt>
                                    <dd class="col-sm-6">Individual</dd>

                                    <dt class="col-sm-6 text-sm-right">Country:</dt>
                                    <!-- <dd class="col-sm-6"><img class="avatar avatar-xss avatar-circle mr-1" src="assets\vendor\flag-icon-css\flags\1x1\gb.svg" alt="Great Britain Flag"> United Kingdom</dd> -->

                                    <dt class="col-sm-6 text-sm-right">City:</dt>
                                    <dd class="col-sm-6">London</dd>

                                    <dt class="col-sm-6 text-sm-right">State:</dt>
                                    <dd class="col-sm-6">-</dd>

                                    <dt class="col-sm-6 text-sm-right">Address line 1:</dt>
                                    <dd class="col-sm-6">45 Roker Terrace, Latheronwheel</dd>

                                    <dt class="col-sm-6 text-sm-right">Address line 2:</dt>
                                    <dd class="col-sm-6">-</dd>

                                    <dt class="col-sm-6 text-sm-right">Zip code:</dt>
                                    <dd class="col-sm-6">KW5 8NW</dd>
                                </dl>
                                <!-- End Row -->
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <div class="card-footer d-sm-flex align-items-sm-center">
                                <button type="button" class="btn btn-ghost-secondary mb-2 mb-sm-0">
                                    <i class="tio-chevron-left"></i> Previous step
                                </button>

                                <div class="ml-auto">
                                    <button type="button" class="btn btn-white mr-2">Save in drafts</button>
                                    <button id="addUserFinishBtn" type="button" class="btn btn-primary">Add user</button>
                                </div>
                            </div>
                            <!-- End Footer -->
                        </div>
                        <!-- End Confirmation -->

                        <!-- Footer -->
                        <div class="card-footer">
                            <button id="btnNextForm" type="button" class="btn-next" next-options="{&quot;targetSelector&quot;: &quot;#addUserStepBillingAddress&quot;}">
                                Next
                            </button>
                        </div>
                        <!-- End Footer -->
                    </div>
                    <!-- End Content Step Form -->

                    <!-- Message Body -->
                    <div id="successMessageContent" style="display:none;">
                        <div class="text-center">
                            <!-- <img class="img-fluid mb-3" src="assets\svg\illustrations\hi-five.svg" alt="Image Description" style="max-width: 15rem;"> -->

                            <div class="mb-4">
                                <h2>Successful!</h2>
                                <p>New <span class="font-weight-bold text-dark">Ella Lauda</span> user has been successfully created.</p>
                            </div>

                            <div class="d-flex justify-content-center">
                                <a class="btn btn-white mr-3" href="users.html">
                                    <i class="tio-chevron-left ml-1"></i> Back to users
                                </a>
                                <a class="btn btn-primary" href="users-add-user.html">
                                    <i class="tio-user-add mr-1"></i> Add new user
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Message Body -->
                </div>
            </form>
            <!-- End Form -->
        </article>
    </main>
    <!-- END MAIN CONTENT -->

    <!-- START FOOTER -->
    <?php
    include '../../../../component/footer.php';
    ?>
    <!-- END FOOTER -->

    <script src="/admin/assets/js/index.js"></script>
    <script src="add-user.js"></script>
</body>

</html>