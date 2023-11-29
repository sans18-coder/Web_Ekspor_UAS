<!-- form Register -->
<div class="d-flex align-items-center justify-content-center" style="height: 504px;">
    <form class="card border border-1 rounded-4 p-4 pt-3 col-6" action="" method="post">
        <h1 class="text-center mb-0 mt-0">Register</h1>
        <hr class="border border-black border-1 opacity-100 ms-auto me-auto mt-0 col-3">
        <div class="d-flex ">

            <!-- Baris ke-1 -->
            <div class="d-blok col-5 me-auto">
                <!-- inputan name -->
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control col-12" name="name" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1">
                </div>
                <!-- inputan name end-->
                <!-- inputan email -->
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">E-Mail</label>
                    <input type="email" class="form-control col-" name="email" placeholder="E-mail" aria-label="Email" aria-describedby="basic-addon1">
                </div>
                <!-- inputan email end-->
                <!-- inputan phoneNumber -->
                <div class="mb-3">
                    <label for="inputPhoneNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phoneNumber" placeholder="Phone Number" aria-label="PhoneNumbel" aria-describedby="basic-addon1">
                </div>
                <!-- inputan phoneNumber end-->
            </div>
            <!-- Baris ke-1 end-->

            <!-- Baris ke-2 -->
            <div class="d-blok col-5 ms-auto">
                <!-- inputan username -->
                <div class="mb-3">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <!-- inputan username end-->
                <!-- inputan password -->
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                </div>
                <!-- inputan password end-->
                <!-- inputan confirmPassword -->
                <div class="mb-3">
                    <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password" aria-label="confirmPassword" aria-describedby="basic-addon1">
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
<!-- form Register end-->