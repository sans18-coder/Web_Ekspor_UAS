    <div class="d-flex" style="min-height: 506px;">
        <!-- untuk Image -->

        <!-- form login -->
        <div class="ms-auto me-5 mt-auto mb-auto ">
            <form class="card border border-1 rounded-4 p-4 pt-3" action="" method="post">
                <h1 class="text-center mb-0 mt-0 ">LOGIN</h1>
                <hr class="border border-black border-1 opacity-100 mt-0 ms-auto me-auto col-4">

                <!-- inputan username -->
                <div class="mb-2">
                    <label for="InputEmail1" class="form-label">Username</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><img src="<?php echo base_url(); ?>asset/image/orang.jpg" alt=" "></span>
                        <input type="text" class="form-control" name="loginUsername" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>

                <!-- inputan password -->
                <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><img src="<?php echo base_url(); ?>asset/image/logo_gembok.jpg" alt=" "></span>
                        <input type="Password" class="form-control" name="loginPassword" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                </div>

                <!-- button submit-->
                    <button type="submit" class="btn btn-primary col-4 ">Login</button>

            </form>
        </div>
        <!-- form login end-->

    </div>