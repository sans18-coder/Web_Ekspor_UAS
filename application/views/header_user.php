<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/style.css">
</head>

<body class="m-0 p-0">
    <!-- container -->
    <div class="container-fluid m-0 p-0">
        <!-- header -->
        <header>
            <!-- navbar -->
            <nav class="navbar navbar-expand-lg border-bottom shadow-sm bg-transparent pt-1 pb-1">
                <div class="container-fluid">
                    <h1 class="navbar-brand fw-bold fs-3" href="#">Lokal coffee</h1>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav nav-underline ms-auto pe-4 fw-bold d-flex align-items-center">
                            <li class="nav-item ps-3">
                                <a class="nav-link " aria-current="page" href="<?php echo base_url() . 'index.php/tampilan/product'; ?>">Product</a>
                            </li>
                            <li class="nav-item ps-3">
                                <a class="nav-link" href="<?php echo base_url() . 'index.php/tampilan/buy'; ?>">Buy</a>
                            </li>
                            <li class="nav-item ps-3">
                                <a class="nav-link" href="<?php echo base_url() . 'index.php/tampilan/submission'; ?>">Submission</a>
                            </li>
                            <li class="nav-item dropdown ps-3">
                                <div class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="me-2" src="<?php echo base_url(); ?>asset/image/username.jpg" alt=" ">
                                    <a>Username</a>
                                </div>
                                <ul class="dropdown-menu bg-transparent">
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>">
                                            <img src=" " alt=" ">Log out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- navbar end -->
        </header>
        <!-- header end -->