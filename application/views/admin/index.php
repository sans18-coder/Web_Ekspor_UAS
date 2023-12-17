<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- row ux-->
    <!-- row table-->
    <div class="page-header">
        <span class="fas fa-shopping-cart text-primary mt-2 "> Data orders</span>
        <?php
        $jml = 0;
        foreach ($order as $o) {
            $jml++;
        } ?>
        <span class="float-end">Total : <?= $jml; ?></span>
    </div>
    <div class="table-responsive table-bordered col-12 mt-2" style="height:600px;">
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama Customer</th>
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
                foreach ($order as $o) { ?>
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
                        <td class="text-center align-middle">
                            <?php foreach ($detail as $d) { ?>
                                <form action="<?= base_url('admin/qtyDisetujui')  ?>" method="post">
                                    <div class="mb-3">
                                        <input type="number" name="qtyDisanggupi" id="qtyDisanggupi" aria-describedby="basic-addon1">
                                        <input type="hidden" name="detailId" value="<?= $d['detailId'] ?>">
                                        <button class="btn btn-info fs-6 mb-2 "><span class="fas fa-upload"></span> Simpan</button>
                                    </div>
                                </form>
                            <?php } ?>
                        </td>
                        <td class="text-center align-middle">
                            <form action="<?= base_url('admin/accPengajuan')  ?>" method="post">
                                <input type="hidden" name="orderId" value="<?= $o['orderId'] ?>">
                                <button class="btn btn-success fs-6 mb-2"><span class="fas fa-check-circle"></span>Setujui</button>
                            </form>
                            <form action="<?= base_url('admin/tolakPengajuan')  ?>" method="post">
                                <input type="hidden" name="orderId" value="<?= $o['orderId'] ?>">
                                <button class="btn btn-danger fs-6 mb-2"> <span class="fas fa-times-circle"></span> Tolak</button>
                            </form>
                        </td>

                        <td class="text-center align-middle">
                            <p class='badge badge-danger fs-6 mb-2'>Belum Lunas</p>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</div>
<!-- End of Main Content -->