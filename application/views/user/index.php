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
                        <p class="shop-desc">Price: <?= $p['price']; ?></p>
                        <p class="shop-desc">Min.Order : <?= $p['minOrder']; ?>/p>
                    </div>
                    <div class="d-flex">
                        <button class="button ">Pre-Orders</button>
                        <button class="button fas fa-cart-plus"></button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</div>