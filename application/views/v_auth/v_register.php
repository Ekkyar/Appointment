<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-5 col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0 ">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg mx-auto">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register Your Account! </h1>
                                </div>

                                <!-- Flashdata Sukses daftar / Logout  -->
                                <?= $this->session->flashdata('message'); ?>

                                <form action="<?= base_url('Auth/register'); ?>" method="post">

                                    <!-- Form error Email -->
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control" id="name" name="name" placeholder="Enter your name...">
                                    </div>

                                    <!-- Form error Email -->
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control" id="email" name="email" placeholder="Enter Email Address...">
                                    </div>

                                    <!-- form error Password -->
                                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Retype password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <select class="form-control" name="id_role" id="id_role" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <option value="">--- Role ---</option>
                                            <?php foreach ($role as $rol) : ?>
                                                <option value="<?php echo $rol['id_role']; ?>">
                                                    <?php echo $rol['role']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-13">
                                        <button type="submit" class="btn btn-primary btn-block">Register Account</button>
                                    </div>

                                </form>

                                <div class="text-center">
                                    <a class="small" href="<?= base_url('Auth'); ?>">I already have an account!</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>