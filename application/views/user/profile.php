<div class="container-fluid col-12">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-9">
            <?= form_open_multipart('user/profile'); ?>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="phoneNumber" class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="<?= $user['phoneNumber']; ?>">
                    <?= form_error('phoneNumber', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="nationality" class="col-sm-2 col-form-label">Nationality</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nationality" name="nationality" value="<?= $user['nationality']; ?>">
                    <?= form_error('phoneNumber', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('asset/image/profile/') . $user['userImage']; ?>" class="img-thumbnail" alt="">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Pilih file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="<?= base_url('user/index') ?>">
                        <button type=button class="btn btn-dark"> Kembali</button>
                    </a>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content --