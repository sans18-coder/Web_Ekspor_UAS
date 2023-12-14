<div class="bg-register" style="min-height: 749px;">
<!-- form Register -->
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-center pt-5 pb-4" style="min-height: 650px;">
        <form class="card-register card border border-1 rounded-4 p-4 pt-3 col-6" action="<?= base_url('autentifikasi/registrasi'); ?>" method="post">
            <h1 class="text-center mb-0 mt-0">REGISTER</h1>
            <hr class="border border-black border-1 opacity-100 ms-auto me-auto mt-0 col-3">
            <div class="d-flex ">

                <!-- Baris ke-1 -->
                <div class="d-blok col-5 me-auto">
                    <!-- inputan name -->
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" class="form-control col-12" value="<?= set_value('name'); ?>" name="name" placeholder="Full Name" aria-label="Name" aria-describedby="basic-addon1">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- inputan name end-->
                    <!-- inputan email -->
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">E-Mail</label>
                        <input type="email" class="form-control col-" value="<?= set_value('email'); ?>" name="email" placeholder="E-mail" aria-label="Email" aria-describedby="basic-addon1">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- inputan email end-->
                    <!-- inputan phoneNumber -->
                    <div class="mb-3">
                        <label for="inputPhoneNumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" value="<?= set_value('phoneNumber'); ?>" name="phoneNumber" placeholder="Phone Number" aria-label="PhoneNumber" aria-describedby="basic-addon1">
                        <?= form_error('phoneNumber', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- inputan phoneNumber end-->
                    <div class="mb-3">
                        <label for="inputNationality" class="form-label">Nationality</label>
                        <input type="text" class="form-control" value="<?= set_value(''); ?>" name="nationality" placeholder="Your Countries" aria-label="Nationality" aria-describedby="basic-addon1">
                        <?= form_error('nationality', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                </div>
                <!-- Baris ke-1 end-->

                <!-- Baris ke-2 -->
                <div class="d-blok col-5 ms-auto">
                    <!-- inputan username -->
                    <div class="mb-3">
                        <label for="inputUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" value="<?= set_value('username'); ?>" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- inputan username end-->
                    <!-- inputan password -->
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" value="<?= set_value('password'); ?>" name="password" id="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- inputan password end-->
                    <!-- inputan confirmPassword -->
                    <div class="mb-3">
                        <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" value="<?= set_value('confirmPassword'); ?>" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password" aria-label="confirmPassword" aria-describedby="basic-addon1">
                        <?= form_error('confirmPassword', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- inputan username end-->
                </div>
                <!-- Baris ke-2 end-->
            </div>


            <!-- button submit-->
            <button type="submit" class="btn btn-primary ">Regist</button>
            <!-- button submit end-->

        </form>
    </div>
</div>
<!-- form Register end-->
