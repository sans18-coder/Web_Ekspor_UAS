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
                <?php
                $a = 1;
                foreach ($cart as $c) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $a++; ?></th>
                        <td><?= $c['productName']; ?></td>
                        <td class="text-center">$<?= $c['price']; ?></td>
                        <td class="text-center"><?= $c['quantity']; ?></td>
                        <td class="text-center">$<?= $c['quantity'] * $c['price']; ?></td>
                        <td></td>
                    </tr>
                <?php } ?>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->