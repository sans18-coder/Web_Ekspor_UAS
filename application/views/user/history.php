<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <span class="fas fa-history mt-2 fs-5"> Submission History</span>
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
                            if (($o['statusPengajuan'] == 2) || ($o['statusPengajuan'] == 3)) { ?>
                                <th scope="row" class="text-center"><?= $a++; ?></th>
                                <?php $detail = $this->ModelOrders->detailOrdersWhere(['orderId' => $o['orderId']])->result_array(); ?>
                                <td><?php foreach ($detail as $d) {
                                        $detail_product = $this->ModelProduct->productsWhere(['productId' => $d['productId']])->result_array();
                                        foreach ($detail_product as $d) {
                                            echo '<p>' . $d['productName'] . '</p>';
                                        }
                                    } ?></td>
                                <td class="text-center"><?php foreach ($detail as $d) {
                                                            $detail_product = $this->ModelProduct->productsWhere(['productId' => $d['productId']])->result_array();
                                                            foreach ($detail_product as $dp) {
                                                                echo '<p>' . $dp['price'] . '</p>';
                                                            }
                                                        } ?></td>
                                <td class="text-center"><?php foreach ($detail as $d) {
                                                            echo '<p>' . $d['quantity'] . '</p>';
                                                        } ?></td>
                                <td class="text-center"><?php foreach ($detail as $d) {
                                                            $detail_product = $this->ModelProduct->productsWhere(['productId' => $d['productId']])->result_array();
                                                            foreach ($detail_product as $dp) {
                                                                echo '<p>' . $d['quantity'] * $dp['price'] . '</p>';
                                                            }
                                                        } ?></td>
                                <td class="text-center "><?php foreach ($detail as $d) {
                                                                if ($d['quantityDisetujui'] == 0) {
                                                                    echo "<p class='badge badge-secondary fs-6'>Awaiting approval</p><br>";
                                                                } else {
                                                                    echo "</p>" . $d['quantityDisetujui'] . "</p>";
                                                                };
                                                            } ?></td>
                                <td class="text-center align-middle">
                                    <?php if ($o['statusPengajuan'] == 2) {
                                        echo "<span class='badge badge-danger fs-6'>Rejected<span>";
                                    } else {
                                        echo "<span class='badge badge-success fs-6'>Approved<span>";
                                    }; ?>

                                </td>
                                <td class="text-center align-middle">
                                    <?php if ($o['paymentStatus'] == 0) {
                                        echo "<span class='badge badge-danger fs-6'>Unpaid<span>";
                                    } else {
                                        echo "<span class='badge badge-success fs-6'>already paid<span>";
                                    }; ?>
                                </td>
                                <td></td>
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