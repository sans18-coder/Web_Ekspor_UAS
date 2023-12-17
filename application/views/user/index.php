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
                            <p class="desc text-justify mt-4"><?= $limit_words($p['productDes'], 15); ?> <a href="<?= base_url('user/produk/') . '#' . $p['productId'] ?>">detail</a></p>
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
                        <p class="shop-desc">Desc: <a href="<?= base_url('user/produk/') . '#' . $p['productId'] ?>">detail</a></p>
                        <p class="shop-desc">Price: $<?= $p['price']; ?>/Kg</p>
                        <p class="shop-desc">Min.Order : <?= $p['minOrder']; ?> Kg</p>
                    </div>
                    <div class="d-flex">
                        <button class="button" data-toggle="modal" data-target="#orderProduct<?= $p['productId'] ?>">Pre-Orders</button>
                        <button class="button fas fa-cart-plus" data-toggle="modal" data-target="#addToCart<?= $p['productId'] ?>"></button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</div>
<!-- popup order-->
<?php foreach ($products as $p) { ?>
    <div class="modal fade" id="orderProduct<?= $p['productId'] ?>" tabindex="-1" role="dialog" aria-labelledby="orderProductKopi" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bukuBaruModalLabel"><span class="fas fa-shopping-cart me-1"></span>Order Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('order'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body d-flex">
                        <div class="image-order col-6 d-flex justify-content-center align-items-center">
                            <img src="<?= base_url('asset/image/product/') . $p['productImage']; ?>" alt="" style="max-width: 300px;">
                        </div>
                        <div class=" des-order col-6">
                            <div class="form-group">
                                <h4><?= $p['productName']; ?></h4>
                                <input type="hidden" class="form-control" id="productId" name="productId" value="<?= $p['productId']; ?>">
                                <input type="hidden" class="form-control" id="userId" name="userId" value="<?= $user['userId']; ?>">
                            </div>
                            <div class="form-group">
                                <h5>description</h5>
                                <p><?= $p['productDes'] ?></p>
                            </div>
                            <div class="form-group">
                                <h5>Price : $<?= $p['price']; ?>/Kg</h5>
                                <input type="hidden" class="form-control" id="priceProduct" name="priceProduct" value="<?= $p['price']; ?>">
                            </div>
                            <div class="form-group">
                                <h5>quantity</h5>
                                <div class="d-flex">
                                    <button type="button" id="kurangQty" name="kurangQty" class="btn btn-danger fs-6 me-2"><span class="fas fa-minus "> </span></button>
                                    <input type="number" id="quantity" name="quantity" min="500" value="500" class="border rounded" oninput="hitungTotal()" style="width: 65px;">
                                    <button type="button" id="tambahQty" name="tambahQty" class="btn btn-success fs-6 ms-2"><span class="fas fa-plus "> </span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <label for="total">Total : $</label>
                        <input type="number" id="total" name="total" value="<?= $p['price'] * 500 ?>" class="border border-0" style="width: 75px;" readonly>
                        <button type=" submit" class="btn btn-primary"><span class="fas fa-shopping-cart"></span> Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<!-- End of popup order-->
<!-- popup add Cart -->
<?php foreach ($products as $p) { ?>
    <div class="modal fade" id="addToCart<?= $p['productId'] ?>" tabindex="-1" role="dialog" aria-labelledby="addCartKopi" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bukuBaruModalLabel"><span class="fas fa-cart-plus me-1"></span>Add To Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('cart'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body d-flex">
                        <div class="image-order col-6 d-flex justify-content-center align-items-center">
                            <img src="<?= base_url('asset/image/product/') . $p['productImage']; ?>" alt="" style="max-width: 300px;">
                        </div>
                        <div class="des-order col-6">
                            <div class="form-group">
                                <h4><?= $p['productName']; ?></h4>
                                <input type="hidden" class="form-control" id="productId" name="productId" value="<?= $p['productId']; ?>">
                                <input type="hidden" class="form-control" id="userId" name="userId" value="<?= $user['userId']; ?>">
                            </div>
                            <div class="form-group">
                                <h5>description</h5>
                                <p><?= $p['productDes'] ?></p>
                            </div>
                            <div class="form-group">
                                <h5>Price : $<?= $p['price']; ?>/Kg</h5>
                                <input type="hidden" class="form-control" id="priceProduct" name="priceProduct" value="<?= $p['price']; ?>">
                            </div>
                            <div class="form-group">
                                <h5>quantity</h5>
                                <div class="d-flex">
                                    <button type="button" id="kurangQty" name="kurangQty" class="btn btn-danger fs-6 me-2"><span class="fas fa-minus "> </span></button>
                                    <input type="number" id="quantity" name="quantity" min="500" value="500" class="border rounded" oninput="hitungTotal()" style="width: 65px;">
                                    <button type="button" id="tambahQty" name="tambahQty" class="btn btn-success fs-6 ms-2"><span class="fas fa-plus "> </span></button></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <label for="total">Total : $</label>
                        <input type="number" id="total" name="total" value="<?= $p['price'] * 500 ?>" class="border border-0" style="width: 75px;" readonly>
                        <button type="submit" class="btn btn-primary"><span class="fas fa-shopping-cart"></span> Add To Cart</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End of Modal add to cart-->