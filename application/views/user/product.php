<main class="container-fluid mx-auto">
    <section class="product-display row text-center bg-light">
        <div class="produk-content d-flex justify-content-center align-items-center mb-5">
            <div>
                <h1 class="judul"><span class="putih">Local</span> <span class="coklat">Cofee</span></h1>
                <p class="cr putih fs-4 shadow-sm">"When Local Uniqueness Meets Global Delight - Local Coffee, Take Home the Beauty of Authentic Indonesian Coffee."</p>
            </div>
        </div>
        <?php foreach ($produk as $p) {
        ?>
            <div class="col-12 d-flex justify-content-center mb-3" id="<?= $p['productId'] ?>">
                <div class="row col-9">
                    <div class="col-md-8 margin left-5 mx-auto">
                        <div class="product-description">
                            <h2 class style="text-align: center" ;="judul"><?= $p['productName'] ?></h2>
                            <p style="text-align:left;"><?= $p['productDes'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="<?= base_url('asset/image/product/') . $p['productImage']; ?>" alt="Product Image" class="align-self-center mr-3 img-fluid" style="width: 300px; max-height: 250px;">
                    </div>
                </div>
                <hr>
            </div>
            <div class="d-flex align-items-center justify-content-center ">
                <hr class="divider my-5 col-9 ">
            </div>
        <?php } ?>
    </section>
</main>