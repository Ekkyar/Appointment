<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container-fluid">

        <div class="col-lg-8">

            <?php echo form_open_multipart('Profile/edit_profile'); ?>
            <!-- id -->
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Id User</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $user['id_user']; ?>" readonly>
                </div>
            </div>
            <!-- Name -->
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger ml-1">', '</small>'); ?>
                </div>
            </div>
            <!-- NIP/NIM -->
            <?php if ($role == '2') : ?>
                <!-- Nip -->
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nip/nim" name="nip/nim" value="<?= $user['nip/nim']; ?>">
                        <?= form_error('name', '<small class="text-danger ml-1">', '</small>'); ?>
                    </div>
                </div>
            <?php else : ?>
                <!-- Nim -->
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nip/nim" name="nip/nim" value="<?= $user['nip/nim']; ?>">
                        <?= form_error('name', '<small class="text-danger ml-1">', '</small>'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <!-- email -->
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>

            <!-- email -->
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" value="<?= $user['password']; ?>" readonly>
                </div>
            </div>

            <!-- Picture -->
            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class=" col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <a class="btn btn-secondary" href="<?= base_url('Profile'); ?>">Kembali</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>

            </form>

        </div>
    </div>
</div>
<!-- End of Begin Page -->

</div>
<!-- End of Main Content -->