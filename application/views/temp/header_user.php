<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/loginstyle.css">
</head>

<body class="m-0 p-0 bg-light">
    <!-- container -->
    <div class="container-fluid m-0 p-0">
        <!-- header -->
        <header>
            <!-- navbar -->
            <nav class="navbar position-fixed navbar-expand-lg pt-1 pb-1 col-12">
                <div class="container-fluid">
                    <h1 class="navbar-brand fw-bold fs-3 pb-0"><a href="#">Lokal<span class="span-brand">Coffee</span></a></h1>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="nav-link collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav nav-underline ms-auto pe-4 fw-bold d-flex align-items-center">
                            <li class="nav-item ps-3">
                                <a class="nav-link" aria-current="page" href="#">PRODUCT</a>
                            </li>
                            <li class="nav-item ps-3">
                                <a class="nav-link" href="<?php echo base_url('user')  ?>">ORDERS</a>
                            </li>
                            <li class="nav-item ps-3">
                                <a class="nav-link" href="<?php echo base_url('user/submission') ?>">SUBMISSION</a>
                            </li>
                            <li class="nav-item dropdown ps-3">
                                <ul class="navbar-nav ml-auto">
                                    <div class="topbar-divider d-none d-sm-block"></div>
                                    <!-- Nav Item - User Information -->
                                    <li class="nav-item dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php
                                            if ($role == 'admin') {
                                            ?>
                                                <span class="mr-2 d-none d-lg-inline text-gray-600 small fs-5"><?= $admin['adminName']; ?> </span>
                                                <img class="img-profile rounded-circle" src="<?= base_url('asset/image/profile/') . $admin['imageAdmin']; ?>">
                                            <?php
                                            } else {
                                            ?>
                                                <span class="mr-2 d-none d-lg-inline text-gray-600 small fs-5"><?= $user['username']; ?> </span>
                                                <img class="img-profile rounded-circle" src="<?= base_url('asset/image/profile/') . $user['userImage']; ?>" style="width:30px; height:30px;">
                                            <?php
                                            }
                                            ?>
                                        </a>
                                        <!-- Dropdown - User Information -->
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="<?= base_url('user') . "/profile"; ?>">
                                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Profile Saya
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="<?= base_url('autentifikasi/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Logout
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- navbar end -->
        </header>
        <!-- header end -->