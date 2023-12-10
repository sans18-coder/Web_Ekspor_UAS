<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/loginstyle.css">
</head>

<body class="m-0 p-0">
    <!-- container -->
    <div class="container-fluid m-0 p-0">
        <!-- header -->
        <header>
            <!-- navbar -->
            <nav class="navbar navbar-expand-lg shadow-sm position-fixed col-12 pt-1 pb-1">
                <div class="container-fluid">
                    <h1 class="navbar-brand fw-bold fs-3" href="#">Lokal coffee</h1>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav nav-underline ms-auto pe-4 fw-bold">
                            <li class="nav-item ps-3">
                                <a class="nav-link " aria-current="page" href="<?php echo base_url(); ?>">PRODUCT</a>
                            </li>
                            <li class="nav-item ps-3">
                                <a class="nav-link" href="<?php echo base_url() . 'index.php/tampilan/login'; ?>">LOGIN</a>
                            </li>
                            <li class="nav-item ps-3">
                                <a class="nav-link" href="<?php echo base_url() . 'index.php/tampilan/register'; ?>">REGISTRASI</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- navbar end -->
        </header>
        <!-- header end -->
