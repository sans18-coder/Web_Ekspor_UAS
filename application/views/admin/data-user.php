<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- row ux-->

    <!-- row table-->
    <div class="page-header">
        <span class="fas fa-users text-primary mt-2 "> Data Users
        </span>
        <?php
        $jml = 0;
        foreach ($user as $u) {
            $jml++;
        } ?>
        <span lass="float-end">Total : <?= $jml; ?></span>
    </div>
    <div class="table-responsive table-bordered col-12 mt-2" style="height:600px;">
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
                        <th scope="row" class="text-center align-middle"><?= $a++; ?></th>
                        <td class="text-center align-middle"><?= $u['userId']; ?></td>
                        <td class="text-center align-middle"><img src="<?= base_url('asset/image/profile/') . $u['userImage']; ?>" alt="" style="width: 100px; height:150px;"></td>
                        <td class="align-middle"><?= $u['name']; ?></td>
                        <td class="text-center align-middle"><?= $u['username']; ?></td>
                        <td class="text-center align-middle"><?= $u['email']; ?></td>
                        <td class="text-center align-middle"><?= $u['phoneNumber']; ?></td>
                        <td class="text-center align-middle"><?= $u['nationality']; ?></td>
                        <td class="text-center align-middle"><?= $u['tanggalDibuat']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<!-- End of Main Content -->