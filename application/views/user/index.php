<div class="slide-container swiper">
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
            <?php foreach ($products as $p) { ?>
                <div class="swiper-card swiper-slide d-fle">
                    <div class="container-image-content ">
                        <div class="image-content">
                            <span class="overlay"></span>
                            <div class="card-image">
                                <img src="<?= base_url('asset/image/product/') . $p['productImage']; ?>" alt="" class="card-img">
                            </div>
                        </div>
                        <div class="description">
                            <p class="desc text-justify mt-4"><?= $limit_words($p['productDes'], 15); ?> <a href="#">detail</a></p>
                        </div>
                    </div>
                    <div class="card-content">
                        <h2 class="name"><?= $p['productName']; ?></h2>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="swiper-button-next swipper-navBtn"></div>
    <div class="swiper-button-prev swipper-navBtn"></div>
    <div class="swiper-pagination"></div>
</div>
<div class="container-fluid">
    <div class="d-flex align-items-center">
        <i class="fas fa-shopping-cart fa-lg"></i>
        <h2 class="ps-3 ">Shop</h2>
    </div>
    <hr class="shadow-lg bg-dark">
    <div class="shop-content row me-auto ms-auto pe-auto ps-auto col-12 justify-content-center">
        <?php foreach ($products as $p) { ?>
            <div class="shop-card m-4 p-0">
                <div class="shop-image-content">
                    <span class="overlay"></span>
                    <div class="shop-card-image">
                        <img src="<?= base_url('asset/image/product/') . $p['productImage']; ?> " alt="" class="card-img">
                    </div>
                </div>
                <div class="shop-card-content">
                    <h2 class="shop-name"><?= $p['productName']; ?></h2>
                    <div class="shop-description">
                        <p class="shop-desc">Desc: <a href="#">detail</a></p>
                        <p class="shop-desc">Price: $<?= $p['price']; ?>/Kg</p>
                        <p class="shop-desc">Min.Order : <?= $p['minOrder']; ?> Kg</p>
                    </div>
                    <div class="d-flex">
                        <button class="button" data-toggle="modal" data-target="#orderProduct">Pre-Orders</button>
                        <button class="button fas fa-cart-plus" data-toggle="modal" data-target="#addToCart"></button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</div>
<!-- popup order-->
<div class="modal fade" id="orderProduct" tabindex="-1" role="dialog" aria-labelledby="orderProductKopi" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel"><span class="fas fa-shopping-cart me-1"></span>Order Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('buku'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_produk" name="nama_produk" placeholder="Masukan Nama Produk">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="deskripsi_produk" name="pdeskripsi_produk" placeholder="Masukan Deskripsi Produk">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="minimal_order" name="minimal_order" placeholder="Masukan Minimal Order Produk">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="foto_produk" name="foto_produk" placeholder="Masukan Foto Produk">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Tutup</button>
                    <button type="submit" class="btn btn-primary"><span class="fas fa-shopping-cart"></span> Order</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Mneu -->
<!-- popup add Cart -->
<div class="modal fade" id="addToCart" tabindex="-1" role="dialog" aria-labelledby="addCartKopi" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel"><span class="fas fa-cart-plus me-1"></span>Add To Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('buku'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_produk" name="nama_produk" placeholder="Masukan Nama Produk">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="deskripsi_produk" name="pdeskripsi_produk" placeholder="Masukan Deskripsi Produk">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="minimal_order" name="minimal_order" placeholder="Masukan Minimal Order Produk">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="foto_produk" name="foto_produk" placeholder="Masukan Foto Produk">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Tutup</button>
                    <button type="submit" class="btn btn-primary"><span class="fas fa-cart-plus"></span> Add To Cart</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Mneu -->