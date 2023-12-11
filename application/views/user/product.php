<main class="container-fluid mx-auto">
    <?php
    $d = base_url() . 'asset/image/product/';
    ?>
    <section class="product-display row text-center">
        <div class="col-10 mx-auto">
            <img src=" <?= $d . 'kopi.jpeg' ?>" alt="Product Image" class="img-fluid">
        </div>
        <?php foreach ($produk as $p) {
        ?>
            <hr class="divider my-5" style="width: 100%;">
            <div class="col-12 d-flex justify-content-center">
                <div class="row col-9">
                    <div class="col-md-8 margin left-5 mx-auto">
                        <div class="product-description">
                            <h2 class style="text-align: center" ;="judul"><?= $p['productName'] ?></h2>
                            <p style="text-align:left;"><?= $p['productDes'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="<?= $d . $p['productImage']; ?>" alt="Product Image" class="align-self-center mr-3 img-fluid" style="width: 300px">
                    </div>
                </div>
                <hr>
            </div>
        <?php } ?>
    </section>
</main>
