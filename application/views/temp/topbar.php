<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
            <!-- Topbar Navbar -->
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
                            <img class="img-profile rounded-circle" src="<?= base_url('asset/image/profile/') . $user['userImage']; ?>">
                        <?php
                        }
                        ?>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <?php
                        if ($role == 'admin') {
                        ?>
                            <a class="dropdown-item" href="<?= base_url('tampilan/blok'); ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile Saya
                            </a>
                        <?php
                        } else {
                        ?>
                            <a class="dropdown-item" href="<?= base_url('user') . "/profile"; ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile Saya
                            </a>
                        <?php
                        }
                        ?>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('autentifikasi/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->