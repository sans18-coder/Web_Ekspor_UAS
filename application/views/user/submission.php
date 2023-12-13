<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <span class="fas fa-clock mt-2 fs-5"> Submission in process</span>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Product Name</th>
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-center">Subtotal</th>
                            <th scope="col" class="text-center">Aceptable of Quantity</th>
                            <th scope="col" class="text-center">Status Pengajuan</th>
                            <th scope="col" class="text-center">Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $a = 1;
                        foreach ($order as $o) {
                            if ($o['statusPengajuan'] == 0) { ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $a++; ?></th>
                                    <td><?= $o['productName']; ?></td>
                                    <td class="text-center">$<?= $o['price']; ?></td>
                                    <td class="text-center"><?= $o['quantity']; ?></td>
                                    <td class="text-center">$<?= $o['quantity'] * $o['price']; ?></td>
                                    <td class="text-center">
                                        <?php if ($o['quantityDisetujui'] == 0) {
                                            echo "<span>Awaiting approval<span>";
                                        } else {
                                            echo "<span>" . $o['quantityDisetujui'] . "<span>";
                                        }; ?></td>
                                    <td class="text-center">
                                        <?php if ($o['statusPengajuan'] == 0) {
                                            echo "<span>Awaiting approval<span>";
                                        }; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($o['paymentStatus'] == 0) {
                                            echo "<span>Unpaid<span>";
                                        }; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->