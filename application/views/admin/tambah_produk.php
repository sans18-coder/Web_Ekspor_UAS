<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-message" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahProduk"><i class="fas fa-plus-square"></i> Tambah Produk</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Foto Produk</th>
                        <th scope="col">Deskripsi Produk</th>
                        <th scope="col">Harga Produk</th>
                        <th scope="col">Minimal Order</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($produk as $p) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $p['productName']; ?></td>
                            <td>
                                <picture>
                                    <source srcset="" type="image/svg+xml">
                                    <img src="<?= base_url('asset/image/product/') . $p['productImage']; ?>" class="img-fluid img-thumbnail" alt="...">
                                </picture>
                            </td>
                            <td><?= $p['productDes']; ?></td>
                            <td>$<?= $p['price']; ?></td>
                            <td><?= $p['minOrder']; ?> Kg</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah Produk-->
<div class="modal fade" id="tambahProduk" tabindex="-1" role="dialog" aria-labelledby="tambahProduk" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahProduk">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('products/tambahProduk'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control form-control-user" id="deskripsi_produk" name="deskripsi_produk" placeholder="Masukkan Deskripsi Produk"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="harga_produk" name="harga_produk" placeholder="Masukkan Harga Produk">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="minimal_order" name="minimal_order" placeholder="Masukkan Minimal Order Produk">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="foto_produk" name="foto_produk">
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