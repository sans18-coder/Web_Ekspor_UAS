<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- row ux-->

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- row table-->
    <div class="table-responsive table-bordered col-12 mt-2">
        <div class="page-header">
            <span class="fas fa-users text-primary mt-2 "> Data User Accepted</span>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">User Id</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col" class="text-center">Kuantitas</th>
                    <th scope="col" class="text-center">Status Pengajuan</th>
                    <th scope="col" class="text-center">Qty yang disanggupi</th>
                    <th scope="col" class="text-center">Status Pembayaran</th>
                </tr>

                </tr>
            </thead>
            <tbody>
                <?php
                $a = 1;
                foreach ($order as $o) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $a++; ?></th>
                        <td class="text-center"><?= $o['userId']; ?></td>
                        <td><?= $o['productName']; ?></td>
                        <td class="text-center"><?= $o['quantity']; ?></td>
                        <form action="<?= base_url('admin/batalPengajuan')  ?>" method="post">
                            <input type="hidden" name="orderId" value="<?= $o['orderId'] ?>">
                            <td class="text-center"><button>Batal Menyetujui</button> </td>
                        </form>
                        <td class="text-center">
                            <?= $o['quantityDisetujui']; ?>
                        </td>

                        <td class="text-center">
                            <?php if ($o['paymentStatus'] == 1) {
                                echo "<span>lunas<span>";
                            } else {
                                echo "<span>Belum membayar<span>";
                            }; ?>
                            <div class="d-flex justify-content-center">
                                <form action="<?= base_url('admin/lunasPembayaran')  ?>" method="post" class="me-2">
                                    <input type="hidden" name="orderId" value="<?= $o['orderId'] ?>">
                                    <button>lunas</button>
                                </form>
                                <form action="<?= base_url('admin/batalLunasPembayaran')  ?>" method="post">
                                    <input type="hidden" name="orderId" value="<?= $o['orderId'] ?>">
                                    <button>Belum lunas</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->