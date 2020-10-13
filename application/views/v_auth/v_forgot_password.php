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
                                    <h1 class="h4 text-gray-900 mb-4">Forgot Password</h1>
                                </div>

                                <!-- Flashdata Sukses daftar / Logout  -->
                                <?= $this->session->flashdata('message'); ?>

                                <form action="<?= base_url('Auth'); ?>" method="post">

                                    <!-- Form eror Email -->
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    <!-- Email -->
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Enter Email Address...">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-13">
                                        <button type="submit" class="btn btn-primary btn-block">Send Request</button>
                                    </div>

                                </form>

                                <div class="text-center">
                                    <a class="small" href="<?= base_url('Auth'); ?>">Back to login!</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>