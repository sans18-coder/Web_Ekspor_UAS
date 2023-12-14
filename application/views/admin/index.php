<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- row ux-->

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- row table-->
    <div class="table-responsive table-bordered col-12 mt-2" style="height:500px;">
        <div class="page-header">
            <span class="fas fa-users text-primary mt-2 "> Data orders</span>
        </div>
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
                foreach ($order as $o) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $a++; ?></th>
                        <td class="text-center"><?= $o['userId']; ?></td>
                        <td><?= $o['productName']; ?></td>
                        <td class="text-center"><?= $o['quantity']; ?></td>
                        <form action="<?= base_url('admin/accPengajuan')  ?>" method="post">
                            <td class="text-center">
                                <input type="number" name="qtyDisanggupi" id="qtyDisanggupi" aria-describedby="basic-addon1">
                                <input type="hidden" name="orderId" value="<?= $o['orderId'] ?>">
                            </td>
                            <td class="text-center"><button>Setujui</button> </td>
                        </form>

                        <td class="text-center">
                            <?php if ($o['paymentStatus'] == 0) {
                                echo "<span>Belum Lunas<span>";
                            }; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <hr class="sidebar-divider">
    <div class="table-responsive table-bordered col-12 mt-2" style="height:500px;">
        <div class="page-header">
            <span class="fas fa-users text-primary mt-2 "> Data Users</span>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">User Id</th>
                    <th scope="col" class="text-center">User Image</th>
                    <th scope="col">Nama user</th>
                    <th scope="col" class="text-center">username</th>
                    <th scope="col" class="text-center">email</th>
                    <th scope="col" class="text-center">Nomo Telp</th>
                    <th scope="col" class="text-center">Warga Negara</th>
                    <th scope="col" class="text-center">Tanggal Dibuat</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $a = 1;
                foreach ($user as $u) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $a++; ?></th>
                        <td class="text-center"><?= $u['userId']; ?></td>
                        <td class="text-center"><img src="<?= base_url('asset/image/profile/') . $u['userImage']; ?>" alt="" style="width: 100px; height:150px;"></td>
                        <td><?= $u['name']; ?></td>
                        <td class="text-center"><?= $u['username']; ?></td>
                        <td class="text-center"><?= $u['email']; ?></td>
                        <td class="text-center"><?= $u['phoneNumber']; ?></td>
                        <td class="text-center"><?= $u['nationality']; ?></td>
                        <td class="text-center"><?= $u['tanggalDibuat']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<!-- End of Main Content -->