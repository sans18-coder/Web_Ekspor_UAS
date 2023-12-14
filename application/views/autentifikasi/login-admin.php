<div class="bg-admin d-flex" style="min-height: 749px;">
    <!-- untuk Image -->
    <!-- form login -->
    <div class="ms-auto me-5 mt-auto mb-auto ">
        <form class="card-admin card border border-1 rounded-4 p-4 pt-3" action="<?= base_url('Admin/login'); ?>" method="post">
            <h1 class="text-center mb-0 mt-0 ">ADMIN</h1>
            <hr class="border border-black border-1 opacity-100 mt-0 ms-auto me-auto col-4">
            <?= $this->session->flashdata('pesan'); ?>
            <!-- inputan username -->
            <div class="mb-2">
                <label for="InputEmail1" class="form-label">Username</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><img src="<?php echo base_url(); ?>asset/image/orang_transparant.jpg" alt=" " style="width:20px;"></span>
                    <input type="text" class="form-control" name="userAdmin" placeholder="Username Admin" aria-label="UsernameAdmin" aria-describedby="basic-addon1">
                </div>
            </div>

            <!-- inputan password -->
            <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><img src="<?php echo base_url(); ?>asset/image/logo_gembok.jpg" alt=" " style="width:20px;"></span>
                    <input type="Password" class="form-control" name="passwordAdmin" placeholder="Password Admin" aria-label="PasswordAdmin" aria-describedby="basic-addon1">
                </div>
            </div>

            <!-- button submit-->
            <button type="submit" class="btn btn-primary col-4 ">Login</button>
        </form>
    </div>
    <!-- form login end-->

</div>