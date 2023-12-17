<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- row ux-->

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="page-header">
        <span class="fas fa-users text-primary mt-2 "> Data Penjualan Selesai</span>
    </div>
    <!-- row table-->
    <div class="table-responsive table-bordered col-12 mt-2" style="height:500px;">
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">User Id</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col" class="text-center">Kuantitas</th>
                    <th scope="col" class="text-center">Qty yang disanggupi</th>
                    <th scope="col" class="text-center">Status Pengajuan</th>
                    <th scope="col" class="text-center">Status Pembayaran</th>
                </tr>

                </tr>
            </thead>
            <tbody>
                <?php
                $a = 1;
                foreach ($order as $o) {
                    if ($o['statusPengajuan'] == 3) { ?>
                        <tr>
                            <th scope="row" class="text-center align-middle"><?= $a++; ?></th>
                            <?php $name = $this->ModelUser->cekData(['userId' => $o['userId']])->result_array(); ?>
                            <td class="text-center align-middle">
                                <?php
                                foreach ($name as $n) {
                                    echo $n['name'];
                                }
                                ?>
                            </td>

                            <?php $detail = $this->ModelOrders->detailOrdersWhere(['orderId' => $o['orderId']])->result_array(); ?>
                            <td class="align-middle"><?php foreach ($detail as $d) {
                                                            $detail_product = $this->ModelProduct->productsWhere(['productId' => $d['productId']])->result_array();
                                                            foreach ($detail_product as $d) {
                                                                echo "<p>" . $d['productName'] . '</p>';
                                                            }
                                                        } ?></td>
                            <td class="text-center align-middle"><?php foreach ($detail as $d) {
                                                                        echo '<p>' . $d['quantity'] . '</p>';
                                                                    } ?></td>
                            <td class="text-center align-middle"><?php foreach ($detail as $d) {
                                                                        echo '<p>' . $d['quantityDisetujui'] . '</p>';
                                                                    } ?></td>
                            <form action="<?= base_url('admin/batalPengajuan')  ?>" method="post">
                                <input type="hidden" name="orderId" value="<?= $o['orderId'] ?>">
                                <td class="text-center align-middle">
                                    <span class="badge badge-success fs-6 mb-2">Disetujui</span><br>
                                    <button class="btn btn-danger border border-0 fs-6">Batal Menyetujui</button>
                                </td>
                            </form>

                            <td class="text-center align-middle">
                                <?php if ($o['paymentStatus'] == 1) {
                                    echo "<span class='badge badge-success fs-6 mb-2'>lunas</span>";
                                } else {
                                    echo "<span class='badge badge-danger fs-6 mb-2'>Belum membayar</span>";
                                }; ?>
                                <div class="d-flex justify-content-center">
                                    <form action="<?= base_url('admin/lunasPembayaran')  ?>" method="post" class="me-2">
                                        <input type="hidden" name="orderId" value="<?= $o['orderId'] ?>">
                                        <button class="btn btn-success fs-6 mb-2"><span class="fas fa-check-circle"></span> lunas</button>
                                    </form>
                                    <form action="<?= base_url('admin/batalLunasPembayaran')  ?>" method="post">
                                        <input type="hidden" name="orderId" value="<?= $o['orderId'] ?>">
                                        <button class="btn btn-danger fs-6 mb-2">Belum lunas</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
    <hr class="sidebar-divider">
    <!-- row table-->
    <div class="page-header">
        <span class="fas fa-users text-primary mt-2 "> Data Penjualan Ditolak</span>
    </div>
    <div class="table-responsive table-bordered col-12 mt-2" style="height: 500px;">
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">User Id</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col" class="text-center">Kuantitas</th>
                    <th scope="col" class="text-center">Qty yang disanggupi</th>
                    <th scope="col" class="text-center">Status Pengajuan</th>
                    <th scope="col" class="text-center">Status Pembayaran</th>
                </tr>

                </tr>
            </thead>
            <tbody>
                <?php $a = 1;
                foreach ($order as $o) {
                    if ($o['statusPengajuan'] == 2) { ?>
                        <tr>
                            <th scope="row" class="text-center align-middle"><?= $a++; ?></th>
                            <?php $name = $this->ModelUser->cekData(['userId' => $o['userId']])->result_array(); ?>
                            <td class="text-center align-middle">
                                <?php
                                foreach ($name as $n) {
                                    echo $n['name'];
                                }
                                ?>
                            </td>

                            <?php $detail = $this->ModelOrders->detailOrdersWhere(['orderId' => $o['orderId']])->result_array(); ?>
                            <td class="align-middle"><?php foreach ($detail as $d) {
                                                            $detail_product = $this->ModelProduct->productsWhere(['productId' => $d['productId']])->result_array();
                                                            foreach ($detail_product as $d) {
                                                                echo "<p>" . $d['productName'] . '</p>';
                                                            }
                                                        } ?></td>
                            <td class="text-center align-middle"><?php foreach ($detail as $d) {
                                                                        echo '<p>' . $d['quantity'] . '</p>';
                                                                    } ?></td>
                            <td class="text-center align-middle"><?php foreach ($detail as $d) {
                                                                        echo '<p>' . $d['quantityDisetujui'] . '</p>';
                                                                    } ?></td>

                            <td class="text-center align-middle">
                                <span class="badge badge-danger fs-6 mb-2">Ditolak</span>
                            </td>

                            <td class="text-center align-middle">
                                <span class='badge badge-danger fs-6 mb-2'>Belum membayar</span>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->