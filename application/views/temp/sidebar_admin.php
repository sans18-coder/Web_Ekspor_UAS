<!-- Sidebar -->
<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user me-2" style="font-size: 20px;"></i>
        </div>
        <div class="sidebar-brand-text ms-1">Admin</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Looping Menu-->
    <div class="sidebar-heading">Pengajuan</div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/dasboard'); ?>"><!--ini ntar ubah ke buku/kategori -->
            <i class="fa fa-table"></i>
            <span>Daftar Pengajuan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/accepted'); ?>"><!--ini ntar ubah ke buku/kategori -->
            <i class="fas fa-file-signature"></i>
            <span>Pengajuan disetujui</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/logPenjualan'); ?>"><!--ini ntar ubah ke buku/kategori -->
            <i class="fas fa-history"></i>
            <span>Log Penjualan</span>
        </a>
    </li>
    </li>
    <!-- Divider -->
    <?php if ($admin['hakAkses'] == 'full') { ?>
        <hr class="sidebar-divider mt-3">
        <!-- Heading -->
        <div class="sidebar-heading">Produk</div>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('admin/tambahProduk'); ?>"><!--ini ntar ubah ke buku/kategori -->
                <i class="fas fa-plus-square"></i>
                <span>Tambah Produk</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('admin/hapusProduk'); ?>">
                <i class="fas fa-trash"></i>
                <span>Hapus Produk</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('admin/updateProduk'); ?>">
                <i class="fas fa-edit"></i>
                <span>Update Produk</span></a>
        </li>
        </li>
        <!-- Divider -->

        <!-- Divider -->
        <hr class="sidebar-divider mt-3">
        <div class="sidebar-heading">Data</div>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('admin/dataUser'); ?>"><!--ini ntar ubah ke buku/kategori -->
                <i class="fa fa-users"></i>
                <span>Daftar User</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('admin/dataAdmin'); ?>"><!--ini ntar ubah ke buku/kategori -->
                <i class="fas fa-user"></i>
                <span>Daftar Admin</span>
            </a>
        </li>
        </li>
    <?php } else { ?>
        <hr class="sidebar-divider mt-3">
        <!-- Heading -->
        <div class="sidebar-heading">Produk</div>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('tampilan/blok'); ?>"><!--ini ntar ubah ke buku/kategori -->
                <i class="fas fa-plus-square"></i>
                <span>Tambah Produk</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('tampilan/blok'); ?>">
                <i class="fas fa-trash"></i>
                <span>Hapus Produk</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('tampilan/blok  '); ?>">
                <i class="fas fa-edit"></i>
                <span>Update Produk</span></a>
        </li>
        </li>
        <!-- Divider -->

        <!-- Divider -->
        <hr class="sidebar-divider mt-3">
        <div class="sidebar-heading">Data</div>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('tampilan/blok'); ?>"><!--ini ntar ubah ke buku/kategori -->
                <i class="fa fa-users"></i>
                <span>Daftar User</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('tampilan/blok'); ?>"><!--ini ntar ubah ke buku/kategori -->
                <i class="fas fa-user"></i>
                <span>Daftar Admin</span>
            </a>
        </li>
        </li>
    <?php } ?>
    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->