    <div class="bg-login d-flex" style="min-height: 646px;">
        <!-- untuk Image -->
        <!-- form login -->
        <div class="ms-auto me-5 mt-auto mb-auto ">
            <form class="user bg-card card rounded-4 p-4 pt-3" action="<?= base_url('Autentifikasi'); ?>" method="post">
                <h1 class="text-center mb-0 mt-0 ">LOGIN</h1>
                <hr class="border border-black border-1 opacity-100 mt-0 ms-auto me-auto col-4">
                <?= $this->session->flashdata('pesan'); ?>
                <!-- inputan username -->
                <div class="mb-3">
                    <label for="inputUsername" class="form-label">E-mail</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><img src="<?php echo base_url(); ?>asset/image/orang.jpg" alt=" " style="width: 20px;"></span>
                        <input type="text" class="form-control" value="<?= set_value('email') ?>" name="email" id="email" placeholder="E-mail" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <?= form_error(
                        'email',
                        '<small class="text-danger pl-3">',
                        '</small>'
                    ); ?>
                </div>
                <!-- inputan password -->
                <div class="mb-4">
                    <label for="inputPassword" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><img src="<?php echo base_url(); ?>asset/image/logo_gembok.jpg" alt=" " style="width: 20px;"></span>
                        <input type="Password" class="form-control" name="password" id="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                    <?= form_error(
                        'password',
                        '<small class="text-danger pl-3">',
                        '</small>'
                    ); ?>
                </div>
                <!-- button submit-->
                <button type="submit" class="btn btn-primary col-4 ">Login</button>

            </form>
        </div>
        <!-- form login end-->

    </div>
