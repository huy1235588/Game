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
    <link rel="stylesheet" href="./component/header.css">
    <link rel="stylesheet" href="./component/aside.css">
    <link rel="stylesheet" href="./component/footer.css">
    <link rel="stylesheet" href="./admin.css">

    <!-- JQuery -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
</head>

<body class="">
    <!-- START HEADER -->
    <?php
    include './component/header.php';
    ?>
    <!-- END HEADER -->

    <!-- START SIDEBAR -->
    <script>
        // Set active cho sidebar-link 
        activeSidebarLink = ["Dashboards", "Default"];
    </script>
    <?php
    include './component/aside.php';
    ?>
    <!-- END SIDEBAR -->

    <div class="menu-overlay"></div>

    <!-- START MAIN CONTENT -->
    <main id="content" class="main">
        <article class="content">
            <!-- Page header -->
            <div class="page-header">
                <nav class="breadcrumb">
                    <ol class="breadcrumb-list">
                        <li class="breadcrumb-item">
                            <a class="breadcrumb-link" href="javascript:;">
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Default
                        </li>
                    </ol>
                    <h1 class="page-header-title">Dashboard</h1>
                </nav>
                <a class="add-user-link" href="view/ecommerce/users/add-user">
                    <svg height="17px" width="17px" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path d="M13 8c0-2.21-1.79-4-4-4S5 5.79 5 8s1.79 4 4 4 4-1.79 4-4zm2 2v2h3v3h2v-3h3v-2h-3V7h-2v3h-3zM1 18v2h16v-2c0-2.66-5.33-4-8-4s-8 1.34-8 4z"></path>
                    </svg>
                    <span>
                        Add users
                    </span>
                </a>
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
                        <!-- Card -->
                        <div id="addUserStepProfile" class="card card-lg active">
                            <!-- Body -->
                            <div class="card-body">
                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label class="col-sm-3 col-form-label input-label">Avatar</label>

                                    <div class="col-sm-9">
                                        <div class="d-flex align-items-center">
                                            <!-- Avatar -->
                                            <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="avatarUploader">
                                                <img id="avatarImg" class="avatar-img" src="assets\img\160x160\img1.jpg" alt="Image Description">

                                                <input type="file" class="js-file-attach avatar-uploader-input" id="avatarUploader">

                                                <span class="avatar-uploader-trigger">
                                                    <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                                                </span>
                                            </label>
                                            <!-- End Avatar -->

                                            <button type="button" class="js-file-attach-reset-img btn btn-white">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Full name <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Displayed on public forums, such as Front."></i></label>

                                    <div class="col-sm-9">
                                        <div class="input-group input-group-sm-down-break">
                                            <input type="text" class="form-control" name="firstName" id="firstNameLabel" placeholder="Clarice" aria-label="Clarice">
                                            <input type="text" class="form-control" name="lastName" id="lastNameLabel" placeholder="Boone" aria-label="Boone">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="emailLabel" class="col-sm-3 col-form-label input-label">Email</label>

                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" id="emailLabel" placeholder="clarice@example.com" aria-label="clarice@example.com">
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="js-add-field row form-group">
                                    <label for="phoneLabel" class="col-sm-3 col-form-label input-label">Phone <span class="input-label-secondary">(Optional)</span></label>

                                    <div class="col-sm-9">
                                        <div class="input-group input-group-sm-down-break align-items-center">
                                            <input type="text" class="js-masked-input form-control" name="phone" id="phoneLabel" placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx">

                                            <div class="input-group-append">
                                                <!-- Select -->
                                                <div class="select2-custom">
                                                    <select class="js-select2-custom custom-select select2-hidden-accessible" size="1" style="opacity: 0;" name="phoneSelect" tabindex="-1" aria-hidden="true">
                                                        <option value="Mobile" selected="" data-select2-id="3">Mobile</option>
                                                        <option value="Home" data-select2-id="4">Home</option>
                                                        <option value="Work" data-select2-id="5">Work</option>
                                                        <option value="Fax" data-select2-id="6">Fax</option>
                                                        <option value="Direct" data-select2-id="7">Direct</option>
                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 6rem;"><span class="selection"><span class="select2-selection custom-select" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-phoneSelect-q7-container"><span class="select2-selection__rendered" id="select2-phoneSelect-q7-container" role="textbox" aria-readonly="true" title="Mobile"><span>Mobile</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                    <!-- End Select -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Container For Input Field -->
                                        <div id="addPhoneFieldContainer"></div>

                                        <a class="js-create-field form-link btn btn-sm btn-no-focus btn-ghost-primary" href="javascript:;">
                                            <i class="tio-add"></i> Add phone
                                        </a>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Add Phone Input Field -->
                                <div id="addAddressFieldTemplate" style="display: none;">
                                    <div class="input-group-add-field">
                                        <input type="text" class="form-control" data-name="addressLine" placeholder="Your address" aria-label="Your address">

                                        <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                                            <i class="tio-clear"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Add Phone Input Field -->

                                <!-- Add Phone Input Field -->
                                <div id="addPhoneFieldTemplate" class="input-group-add-field" style="display: none;">
                                    <div class="input-group input-group-sm-down-break align-items-center">
                                        <input type="text" class="js-masked-input form-control" data-name="additionlPhone" placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx" maxlength="16">

                                        <div class="input-group-append">
                                            <!-- Select -->
                                            <div class="select2-custom">
                                                <select class="js-select2-custom-dynamic custom-select" size="1" style="opacity: 0;" data-name="additionlPhoneSelect">
                                                    <option value="Mobile" selected="">Mobile</option>
                                                    <option value="Home">Home</option>
                                                    <option value="Work">Work</option>
                                                    <option value="Fax">Fax</option>
                                                    <option value="Direct">Direct</option>
                                                </select>
                                            </div>
                                            <!-- End Select -->
                                        </div>
                                    </div>

                                    <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                                        <i class="tio-clear"></i>
                                    </a>
                                </div>
                                <!-- End Add Phone Input Field -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="organizationLabel" class="col-sm-3 col-form-label input-label">Organization</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="organization" id="organizationLabel" placeholder="Htmlstream" aria-label="Htmlstream">
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row form-group">
                                    <label for="departmentLabel" class="col-sm-3 col-form-label input-label">Department</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="department" id="departmentLabel" placeholder="Human resources" aria-label="Human resources">
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="row">
                                    <label class="col-sm-3 col-form-label input-label">Account type</label>

                                    <div class="col-sm-9">
                                        <div class="input-group input-group-sm-down-break">
                                            <!-- Custom Radio -->
                                            <div class="form-control">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="userAccountTypeRadio" id="userAccountTypeRadio1">
                                                    <label class="custom-control-label" for="userAccountTypeRadio1">Individual</label>
                                                </div>
                                            </div>
                                            <!-- End Custom Radio -->

                                            <!-- Custom Radio -->
                                            <div class="form-control">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="userAccountTypeRadio" id="userAccountTypeRadio2">
                                                    <label class="custom-control-label" for="userAccountTypeRadio2">Company</label>
                                                </div>
                                            </div>
                                            <!-- End Custom Radio -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Group -->
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <div class="card-footer d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-primary">
                                    Next <i class="tio-chevron-right"></i>
                                </button>
                            </div>
                            <!-- End Footer -->
                        </div>
                        <!-- End Card -->

                        <div id="addUserStepBillingAddress" class="card card-lg" style="display: none;">
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

                                <div id="addUserStepConfirmation" class="card card-lg" style="display: none;">
                                    <!-- Profile Cover -->
                                    <div class="profile-cover">
                                        <div class="profile-cover-img-wrapper">
                                            <img class="profile-cover-img" src="assets\img\1920x400\img1.jpg" alt="Image Description">
                                        </div>
                                    </div>
                                    <!-- End Profile Cover -->

                                    <!-- Avatar -->
                                    <div class="avatar avatar-xxl avatar-circle avatar-border-lg profile-cover-avatar">
                                        <img class="avatar-img" src="assets\img\160x160\img9.jpg" alt="Image Description">
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
                                            <dd class="col-sm-6"><img class="avatar avatar-xss avatar-circle mr-1" src="assets\vendor\flag-icon-css\flags\1x1\gb.svg" alt="Great Britain Flag"> United Kingdom</dd>

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
                            </div>
                            <!-- End Content Step Form -->

                            <!-- Message Body -->
                            <div id="successMessageContent" style="display:none;">
                                <div class="text-center">
                                    <img class="img-fluid mb-3" src="assets\svg\illustrations\hi-five.svg" alt="Image Description" style="max-width: 15rem;">

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
                    </div>
                    <!-- End Row -->
                </div>
            </form>
            <!-- End Form -->
        </article>
    </main>
    <!-- END MAIN CONTENT -->

    <!-- START FOOTER -->
    <?php
    include './component/footer.php';
    ?>
    <!-- END FOOTER -->

    <script src="assets/js/index.js"></script>
</body>

</html>