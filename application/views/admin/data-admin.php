<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <?php if (validation_errors()) { ?>
        <div class="alert alert-danger alert-message" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php } ?>
    <!-- row ux-->
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahAdmin"><i class="fas fa-plus-square"></i> Tambah Admin</a>
    <!-- row table-->
    <div class="page-header">
        <span class="fas fa-users text-primary mt-2 "> Data Admin</span>
        <?php
        $jml = 0;
        foreach ($user as $u) {
            $jml++;
        } ?>
        <span>Total : <?= $jml; ?></span>
    </div>
    <div class="table-responsive table-bordered col-12 mt-2" style="height:600px;">
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Admin Id</th>
                    <th scope="col" class="text-center">Admin Image</th>
                    <th scope="col">Nama Admin</th>
                    <th scope="col" class="text-center">Password Admin</th>
                    <th scope="col" class="text-center">Hak Akses</th>
                    <th scope="col" class="text-center">Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($user as $u) { ?>
                    <tr>
                        <td class="text-center align-middle"><?= $u['adminId']; ?></td>
                        <td class="text-center align-middle"><img src="<?= base_url('asset/image/profile/') . $u['imageAdmin']; ?>" alt="" style="width: 100px; height:150px;"></td>
                        <td class="text-center align-middle"><?= $u['adminName']; ?></td>
                        <td class="text-center align-middle"><?= $u['adminPassword']; ?></td>
                        <td class="text-center align-middle"><?= $u['hakAkses']; ?></td>
                        <td class="text-center align-middle">
                            <form action="<?= base_url('admin/hapusAdmin') ?>" method="post">
                                <input type="hidden" name='adminId' value="<?= $u['adminId']; ?>">
                                <button class="btn btn-danger fs-6"><span class="fas fa-trash"></span> Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="tambahAdmin" tabindex="-1" role="dialog" aria-labelledby="tambahProduk" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahProduk">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambahDataAdmin'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="foto_admin" name="foto_admin">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_admin" name="nama_admin" placeholder="Masukkan Nama Admin">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password_admin" name="password_admin" placeholder="Masukkan Password Admin">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="confirm_password_admin" name="confirm_password_admin" placeholder="Masukkan Confirm Password Admin">
                    </div>
                    <div class="form-group">
                        <select name="hak_akses" id="hak_akses" class="form-control form-control-user">
                            <option value="sebagian">Sebagian</option>
                            <option value="full">Full Akses</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Produk -->
</div>
<!-- End of Main Content -->