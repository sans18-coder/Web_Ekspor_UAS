<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- row ux-->

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- row table-->
    <form action="<?= base_url('order/orderAll'); ?>" method="post">
        <input type="hidden" class="form-control" id="userId" name="userId" value="<?= $user['userId']; ?>">
        <button class="button btn mb-3"><i class="fas fa-shopping-cart"></i>Orders All</button>
    </form>
    <div class="table-responsive mt-2">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Product name</th>
                    <th scope="col" class="text-center">Price</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" class="text-center">Subtotal</th>
                    <th scope="col" class="text-center">Ubah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $a = 1;
                foreach ($cart as $c) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $a++; ?></th>
                        <td><?= $c['productName']; ?></td>
                        <td class="text-center">$<?= $c['price']; ?></td>
                        <td class="text-center"><?= $c['quantity']; ?></td>
                        <td class="text-center">$<?= $c['quantity'] * $c['price']; ?></td>
                        <td class="text-center">
                            <a href="" data-toggle="modal" data-target="#editCart<?= $c['productId'] ?>" class="badge badge-info fs-6 fas fa-edit mb-2"> Edit</a><br>
                            <form action="<?= base_url('cart/hapusCart') ?>" method="post">
                                <input type="hidden" class="form-control" id="cartId" name="cartId" value="<?= $c['cartId']; ?>">
                                <button type="submit" class="border border-0 bg-transparent">
                                    <span class="badge badge-danger fs-6 fas fa-trash"> Cancel</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->
<?php foreach ($cart as $c) { ?>
    <div class="modal fade" id="editCart<?= $c['productId'] ?>" tabindex="-1" role="dialog" aria-labelledby="editCartKopi" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bukuBaruModalLabel"><span class="fas fa-cart-plus me-1"></span>Edit Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('cart/updateCart'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body d-flex">
                        <div class="image-order col-6 d-flex justify-content-center align-items-center">
                            <img src="<?= base_url('asset/image/product/') . $c['productImage']; ?>" alt="" style="max-width: 300px; ">
                        </div>
                        <div class="des-order col-6">
                            <div class="form-group">
                                <h4><?= $c['productName']; ?></h4>
                            </div>
                            <div class="form-group">
                                <h5>Price : $<?= $c['price']; ?>/Kg</h5>
                                <input type="hidden" class="form-control" id="priceProduct" name="priceProduct" value="<?= $c['price']; ?>">
                            </div>
                            <div class="form-group">
                                <h5>quantity</h5>
                                <div class="d-flex">

                                    <button type="button" id="kurangQty" class="btn btn-danger fs-6 me-2"><span class="fas fa-minus "> </span></button>
                                    <input type="number" id="quantity" name="quantity" min="500" value="<?= $c['quantity'] ?>" class="border rounded" oninput="hitungTotal()" style="width: 65px;">
                                    <input type="hidden" class="form-control" id="cartId" name="cartId" value="<?= $c['cartId']; ?>">
                                    <button type="button" id="tambahQty" class="btn btn-success fs-6 ms-2"><span class="fas fa-plus "> </span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <label for="total">Total : $</label>
                        <input type="number" id="total" name="total" value="<?= $c['price'] * 500 ?>" class="border border-0" style="width: 75px;" readonly>
                        <button type="submit" class="btn badge-info text-white"><span class="fas fa-edit text-white "></span> Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

</div>
<!-- End of Main Content -->