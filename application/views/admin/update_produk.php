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
            <i class="fas fa-sync-alt"></i> Update Produk
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Update</th>
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
                            <td>
                                <a href="<?= base_url('products/updateProduk/') . $p['productId']; ?>" class="badge badge-info" data-toggle="modal" data-target="#updateProduk<?= $p['productId'] ?>"><i class="fas fa-edit"></i> Ubah</a>
                            </td>
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

<!-- Modal Update Produk-->
<?php foreach ($produk as $p) { ?>
    <div class="modal fade" id="updateProduk<?= $p['productId'] ?>" tabindex="-1" role="dialog" aria-labelledby="updateProduk" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateProduk">Update Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('products/updateProduk'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id_produk" id="id_produk" value="<?php echo $p['productId']; ?>">
                            <input type="text" class="form-control form-control-user" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" value="<?= $p['productName']; ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-control-user" id="deskripsi_produk" name="deskripsi_produk" placeholder="Masukkan Deskripsi Produk" value="<?= $p['productDes']; ?>"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="harga_produk" name="harga_produk" placeholder="Masukkan Harga Produk" value="<?= $p['price']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="minimal_order" name="minimal_order" placeholder="Masukkan Minimal Order Produk" value="<?= $p['minOrder']; ?>">
                        </div>
                        <div class="form-group">
                            <?php
                            if (isset($p['productImage'])) { ?>
                                <input type="hidden" name="old_pict" id="old_pict" value="<?= $p['productImage']; ?>">
                                <picture>
                                    <source srcset="" type="image/svg+xml">
                                    <img src="<?= base_url('asset/image/product/') . $p['productImage']; ?>" style="height : 500px, width : 200px" class="rounded mx-auto mb-3 d-blok" alt="...">
                                </picture>
                            <?php } ?>
                            <input type="file" class="form-control form-control-user" id="foto_produk" name="foto_produk">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Tutup</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Ubah</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
    <!-- End of Modal Update Produk -->
<?php } ?>