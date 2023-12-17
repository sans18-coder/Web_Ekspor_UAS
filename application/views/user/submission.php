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
                            <th scope="col" class="text-center">Cancel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $a = 1;
                        foreach ($order as $o) {
                            if ($o['statusPengajuan'] == 0) { ?>
                                <tr>
                                    <th scope="row" class="text-center align-middle"><?= $a++; ?></th>
                                    <?php $detail = $this->ModelOrders->detailOrdersWhere(['orderId' => $o['orderId']])->result_array(); ?>
                                    <td class="align-middle"><?php foreach ($detail as $d) {
                                                                    $detail_product = $this->ModelProduct->productsWhere(['productId' => $d['productId']])->result_array();
                                                                    foreach ($detail_product as $d) {
                                                                        echo "<span>" . $d['productName'] . '</span><br>';
                                                                    }
                                                                } ?></td>
                                    <td class="text-center align-middle"><?php foreach ($detail as $d) {
                                                                                $detail_product = $this->ModelProduct->productsWhere(['productId' => $d['productId']])->result_array();
                                                                                foreach ($detail_product as $dp) {
                                                                                    echo '<span>' . $dp['price'] . '</span><br>';
                                                                                }
                                                                            } ?></td>
                                    <td class="text-center align-middle"><?php foreach ($detail as $d) {
                                                                                echo '<span>' . $d['quantity'] . '</span><br>';
                                                                            } ?></td>
                                    <td class="text-center align-middle"><?php foreach ($detail as $d) {
                                                                                $detail_product = $this->ModelProduct->productsWhere(['productId' => $d['productId']])->result_array();
                                                                                foreach ($detail_product as $dp) {
                                                                                    echo '<span>' . $d['quantity'] * $dp['price'] . '</span><br>';
                                                                                }
                                                                            } ?></td>
                                    <td class="text-center align-middle"><?php foreach ($detail as $d) {
                                                                                if ($d['quantityDisetujui'] == 0) {
                                                                                    echo "<span class='badge badge-secondary fs-6'>Awaiting approval</span><br>";
                                                                                } else {
                                                                                    echo "<span>" . $d['quantityDisetujui'] . "</span><br>";
                                                                                };
                                                                            } ?></td>
                                    <td class="text-center align-middle">
                                        <?php if ($o['statusPengajuan'] == 0) {
                                            echo "<span class='badge badge-secondary fs-6'>Awaiting approval<span>";
                                        }; ?>
                                    </td>
                                    <td class="text-center align-middle">
                                        <?php if ($o['paymentStatus'] == 0) {
                                            echo "<span class='badge badge-danger fs-6'>Unpaid<span>";
                                        }; ?>
                                    </td>
                                    <td class="text-center align-middle">
                                        <form action="<?= base_url('order/hapusOrder') ?>" method="post">
                                            <input type="hidden" class="form-control" id="orderId" name="orderId" value="<?= $o['orderId']; ?>">
                                            <button type="submit" class="border border-0 bg-transparent">
                                                <span class="badge badge-danger fs-6 fas fa-times"> </span>
                                            </button>
                                        </form>
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