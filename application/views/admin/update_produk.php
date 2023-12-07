<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
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
                                <a href="<?= base_url('product/ubahProduk/') . $p['productId']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
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
                            <td><?= $p['price']; ?></td>
                            <td><?= $p['minOrder']; ?> Ton</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>