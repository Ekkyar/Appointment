<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- KONTEN -->
    <div class="accordion" id="accordionExample">

        <div class="col mb-4">
            <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseMIF" aria-controls="collapseMIF">MIF</button>
            <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseTIF" aria-controls="collapseTIF">TIF</button>
            <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseTKK" aria-controls="collapseTKK">TKK</button>
        </div>

        <!-- KONTEN MIF -->
        <div id="collapseMIF" class="col mb-4 collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card shadow mb-4" id="headingOne">
                <div class="card-header py-3 text-center">
                    <h6 class="m-0 font-weight-bold text-primary">Manajemen Informatika (MIF)</h6>
                </div>


                <!-- CARD MIF -->
                <div class="card-body">

                    <!-- Output Collapse MIF -->

                    <div class="row">
                        <div class="col-lg-3 mb-3">
                            <button class="btn btn-success" data-toggle="modal" data-target="#insertMIF">
                                <i class="fas fa-fw fa-plus"></i>
                                Tambah Data
                            </button>
                        </div>
                    </div>

                    <!-- Modal Insert MIF -->
                    <div class="modal fade" id="insertMIF" tabindex="-1" aria-labelledby="insertMIFlabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="insertMIFlabel">Add <?= $title; ?> MIF</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <!-- Form -->
                                <form action="<?= base_url('Admin/aDataMahasiswa/insert_mahasiswa_mif'); ?>" method="post">
                                    <div class="modal-body">
                                        <!-- Nama -->
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Nama Mahasiswa</label>
                                            <input type="text" class="form-control" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <!-- NIM -->
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">NIM</label>
                                            <input type="text" class="form-control" class="form-control" id="nip/nim" name="nip/nim" value="<?= set_value('nip/nim'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <?= form_error('nip/nim', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <!-- Email -->
                                        <label for="exampleFormControlInput1">Email</label>
                                        <div class="form-group input-group mb-3">
                                            <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Password -->
                                        <label for="exampleFormControlInput1">Password</label>
                                        <div class="form-group input-group">
                                            <input type="password" class="form-control" id="password1" name="password1" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <!-- Retype Password -->
                                        <label for="exampleFormControlInput1">Retype Password</label>
                                        <div class="form-group input-group">
                                            <input type="password" class="form-control" id="password2" name="password2" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Insert MIF -->

                    <!-- Notif (Sukses insert data, edit data, delete data) -->
                    <?= $this->session->flashdata('message'); ?>

                    <!-- View MIF -->
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Email</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($mahasiswa_mif as $tb) :
                                    ?>
                                        <tr>
                                            <td><?= $tb['id_user'] ?></td>
                                            <td><?= $tb['name'] ?></td>
                                            <td><?= $tb['nip/nim'] ?></td>
                                            <td><?= $tb['email'] ?></td>
                                            <td>
                                                <!-- Tombol -->
                                                <!-- Detail -->
                                                <a href="" class="badge badge-primary" data-toggle="modal" data-target="#lihatMahasiswa<?= $tb['id_user']; ?>">detail</a> |
                                                <!-- delete -->
                                                <a href="<?= base_url('Admin/aDataMahasiswa/delete_user/'); ?><?= $tb['id_user']; ?>" class="badge badge-danger" onclick="return confirm('Your data will be delete. Are you sure to continue?');">hapus</a>

                                                <!-- Modal Detail -->
                                                <div class="modal fade" id="lihatMahasiswa<?= $tb['id_user']; ?>" tabindex="-1" aria-labelledby="lihatMahasiswalabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="lihatMahasiswalabel">Detail <?= $title; ?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <!-- Form -->
                                                            <form action="<?= base_url('Admin/aDataMahasiswa/ubah_user/'); ?><?= $tb['id_user']; ?>" method="post">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">Id User</label>
                                                                        <input type="text" class="form-control" class="form-control" id="id_user" name="id_user" placeholder="<?= $tb['id_user']; ?>" readonly>
                                                                    </div>
                                                                    <!-- Nama -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">Nama Mahasiswa</label>
                                                                        <input type="text" class="form-control" class="form-control" id="name" name="name" value="<?= $tb['name']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                                                    </div>
                                                                    <!-- NIM -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">NIM</label>
                                                                        <input type="text" class="form-control" class="form-control" id="nip/nim" name="nip/nim" value="<?= $tb['nip/nim']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                                        <?= form_error('nip/nim', '<small class="text-danger">', '</small>'); ?>
                                                                    </div>
                                                                    <!-- Email -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">Email</label>
                                                                        <input type="text" class="form-control" class="form-control" id="email" name="email" value="<?= $tb['email']; ?>" readonly>
                                                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                                                    </div>
                                                                    <!-- Password -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">Password</label>
                                                                        <input type="password" class="form-control" class="form-control" id="password" name="password" value="<?= $tb['password']; ?>" readonly>
                                                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                                                    </div>
                                                                    <!-- Role -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect2">Role</label>
                                                                        <select class="form-control" name="id_role" id="id_role" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                                            <?php foreach ($getrole as $rol) : ?>
                                                                                <option value="<?php echo $rol['id_role']; ?>" <?php if ($rol['id_role'] == $tb['id_role']) : ?> selected="selected" <?php endif; ?>>
                                                                                    <?php echo $rol['role']; ?>
                                                                                </option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Prodi -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect2">Prodi</label>
                                                                        <select class="form-control" name="id_prodi" id="id_prodi" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                                            <?php foreach ($getprodi as $prod) : ?>
                                                                                <option value="<?php echo $prod['id_prodi']; ?>" <?php if ($prod['id_prodi'] == $tb['id_prodi']) : ?> selected="selected" <?php endif; ?>>
                                                                                    <?php echo $prod['nama_prodi']; ?>
                                                                                </option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Picture -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect2">Foto Profil</label>
                                                                        <div class="form-group">
                                                                            <img src="<?= base_url('assets/img/profile/') . $tb['image']; ?>" class="img-thumbnail" width="100px">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Detail -->

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Akhir View MIF -->
                    <!-- Output Collapse MIF -->
                </div>
                <!-- Akhir Card Mif -->

            </div>
        </div>
        <!-- AKHIR KONTEN MIF -->

        <!-- KONTEN TIF -->
        <div id="collapseTIF" class="col mb-4 collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card shadow mb-4" id="headingTwo">
                <div class="card-header py-3 text-center">
                    <h6 class="m-0 font-weight-bold text-primary">Teknik Informatika (TIF)</h6>
                </div>


                <!-- CARD TIF -->
                <div class="card-body">

                    <!-- Output Collapse TIF -->
                    <div class="row">
                        <div class="col-lg-3 mb-3">
                            <button class="btn btn-success" data-toggle="modal" data-target="#insertTIF">
                                <i class="fas fa-fw fa-plus"></i>
                                Tambah Data
                            </button>
                        </div>
                    </div>

                    <!-- Modal Insert TIF -->
                    <div class="modal fade" id="insertTIF" tabindex="-1" aria-labelledby="insertTIFlabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="insertTIFlabel">Add <?= $title; ?> TIF</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <!-- Form -->
                                <form action="<?= base_url('Admin/aDataMahasiswa/insert_mahasiswa_tif'); ?>" method="post">
                                    <div class="modal-body">
                                        <!-- Nama -->
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Nama Mahasiswa</label>
                                            <input type="text" class="form-control" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <!-- NIM -->
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">NIM</label>
                                            <input type="text" class="form-control" class="form-control" id="nip/nim" name="nip/nim" value="<?= set_value('nip/nim'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <?= form_error('nip/nim', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <!-- Email -->
                                        <label for="exampleFormControlInput1">Email</label>
                                        <div class="form-group input-group mb-3">
                                            <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Password -->
                                        <label for="exampleFormControlInput1">Password</label>
                                        <div class="form-group input-group">
                                            <input type="password" class="form-control" id="password1" name="password1" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <!-- Retype Password -->
                                        <label for="exampleFormControlInput1">Retype Password</label>
                                        <div class="form-group input-group">
                                            <input type="password" class="form-control" id="password2" name="password2" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Insert TIF -->

                    <!-- Notif (Sukses insert data, edit data, delete data) -->
                    <?= $this->session->flashdata('message'); ?>

                    <!-- View TIF -->
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Email</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($mahasiswa_tif as $tb) :
                                    ?>
                                        <tr>
                                            <td><?= $tb['id_user'] ?></td>
                                            <td><?= $tb['name'] ?></td>
                                            <td><?= $tb['nip/nim'] ?></td>
                                            <td><?= $tb['email'] ?></td>
                                            <td>
                                                <!-- Tombol -->
                                                <!-- Detail -->
                                                <a href="" class="badge badge-primary" data-toggle="modal" data-target="#lihatMahasiswa<?= $tb['id_user']; ?>">detail</a> |
                                                <!-- delete -->
                                                <a href="<?= base_url('Admin/aDataMahasiswa/delete_user/'); ?><?= $tb['id_user']; ?>" class="badge badge-danger" onclick="return confirm('Your data will be delete. Are you sure to continue?');">hapus</a>

                                                <!-- Modal Detail -->
                                                <div class="modal fade" id="lihatMahasiswa<?= $tb['id_user']; ?>" tabindex="-1" aria-labelledby="lihatMahasiswalabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="lihatMahasiswalabel">Detail <?= $title; ?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <!-- Form -->
                                                            <form action="<?= base_url('Admin/aDataMahasiswa/ubah_user/'); ?><?= $tb['id_user']; ?>" method="post">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">Id User</label>
                                                                        <input type="text" class="form-control" class="form-control" id="id_user" name="id_user" placeholder="<?= $tb['id_user']; ?>" readonly>
                                                                    </div>
                                                                    <!-- Nama -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">Nama Mahasiswa</label>
                                                                        <input type="text" class="form-control" class="form-control" id="name" name="name" value="<?= $tb['name']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                                                    </div>
                                                                    <!-- NIM -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">NIM</label>
                                                                        <input type="text" class="form-control" class="form-control" id="nip/nim" name="nip/nim" value="<?= $tb['nip/nim']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                                        <?= form_error('nip/nim', '<small class="text-danger">', '</small>'); ?>
                                                                    </div>
                                                                    <!-- Email -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">Email</label>
                                                                        <input type="text" class="form-control" class="form-control" id="email" name="email" value="<?= $tb['email']; ?>" readonly>
                                                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                                                    </div>
                                                                    <!-- Password -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">Password</label>
                                                                        <input type="password" class="form-control" class="form-control" id="password" name="password" value="<?= $tb['password']; ?>" readonly>
                                                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                                                    </div>
                                                                    <!-- Role -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect2">Role</label>
                                                                        <select class="form-control" name="id_role" id="id_role" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                                            <?php foreach ($getrole as $rol) : ?>
                                                                                <option value="<?php echo $rol['id_role']; ?>" <?php if ($rol['id_role'] == $tb['id_role']) : ?> selected="selected" <?php endif; ?>>
                                                                                    <?php echo $rol['role']; ?>
                                                                                </option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Prodi -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect2">Prodi</label>
                                                                        <select class="form-control" name="id_prodi" id="id_prodi" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                                            <?php foreach ($getprodi as $prod) : ?>
                                                                                <option value="<?php echo $prod['id_prodi']; ?>" <?php if ($prod['id_prodi'] == $tb['id_prodi']) : ?> selected="selected" <?php endif; ?>>
                                                                                    <?php echo $prod['nama_prodi']; ?>
                                                                                </option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Picture -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect2">Foto Profil</label>
                                                                        <div class="form-group">
                                                                            <img src="<?= base_url('assets/img/profile/') . $tb['image']; ?>" class="img-thumbnail" width="100px">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Detail -->

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Akhir View TIF -->
                    <!-- Output Collapse TIF -->
                </div>
                <!-- Akhir Card TIF -->

            </div>
        </div>
        <!-- AKHIR KONTEN TIF -->

        <!-- KONTEN TKK -->
        <div id="collapseTKK" class="col mb-4 collapse" aria-labelledby="headingthree" data-parent="#accordionExample">
            <div class="card shadow mb-4" id="headingthree">
                <div class="card-header py-3 text-center">
                    <h6 class="m-0 font-weight-bold text-primary">Teknik Komputer</h6>
                </div>


                <!-- CARD TKK -->
                <div class="card-body">
                    <!-- Output Collapse TKK -->

                    <div class="row">
                        <div class="col-lg-3 mb-3">
                            <button class="btn btn-success" data-toggle="modal" data-target="#insertTKK">
                                <i class="fas fa-fw fa-plus"></i>
                                Tambah Data
                            </button>
                        </div>
                    </div>

                    <!-- Modal Insert TKK -->
                    <div class="modal fade" id="insertTKK" tabindex="-1" aria-labelledby="insertTKKlabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="insertTKKlabel">Add <?= $title; ?> TKK</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <!-- Form -->
                                <form action="<?= base_url('Admin/aDataMahasiswa/insert_mahasiswa_tkk'); ?>" method="post">
                                    <div class="modal-body">
                                        <!-- Nama -->
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Nama Mahasiswa</label>
                                            <input type="text" class="form-control" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <!-- NIM -->
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">NIM</label>
                                            <input type="text" class="form-control" class="form-control" id="nip/nim" name="nip/nim" value="<?= set_value('nip/nim'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <?= form_error('nip/nim', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <!-- Email -->
                                        <label for="exampleFormControlInput1">Email</label>
                                        <div class="form-group input-group mb-3">
                                            <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Password -->
                                        <label for="exampleFormControlInput1">Password</label>
                                        <div class="form-group input-group">
                                            <input type="password" class="form-control" id="password1" name="password1" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <!-- Retype Password -->
                                        <label for="exampleFormControlInput1">Retype Password</label>
                                        <div class="form-group input-group">
                                            <input type="password" class="form-control" id="password2" name="password2" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Insert TKK -->

                    <!-- Notif (Sukses insert data, edit data, delete data) -->
                    <?= $this->session->flashdata('message'); ?>

                    <!-- View TKK -->
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Email</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($mahasiswa_tkk as $tb) :
                                    ?>
                                        <tr>
                                            <td><?= $tb['id_user'] ?></td>
                                            <td><?= $tb['name'] ?></td>
                                            <td><?= $tb['nip/nim'] ?></td>
                                            <td><?= $tb['email'] ?></td>
                                            <td>
                                                <!-- Tombol -->
                                                <!-- Detail -->
                                                <a href="" class="badge badge-primary" data-toggle="modal" data-target="#lihatMahasiswa<?= $tb['id_user']; ?>">detail</a> |
                                                <!-- delete -->
                                                <a href="<?= base_url('Admin/aDataMahasiswa/delete_user/'); ?><?= $tb['id_user']; ?>" class="badge badge-danger" onclick="return confirm('Your data will be delete. Are you sure to continue?');">hapus</a>

                                                <!-- Modal Detail -->
                                                <div class="modal fade" id="lihatMahasiswa<?= $tb['id_user']; ?>" tabindex="-1" aria-labelledby="lihatMahasiswalabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="lihatMahasiswalabel">Detail <?= $title; ?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <!-- Form -->
                                                            <form action="<?= base_url('Admin/aDataMahasiswa/ubah_user/'); ?><?= $tb['id_user']; ?>" method="post">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">Id User</label>
                                                                        <input type="text" class="form-control" class="form-control" id="id_user" name="id_user" placeholder="<?= $tb['id_user']; ?>" readonly>
                                                                    </div>
                                                                    <!-- Nama -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">Nama Mahasiswa</label>
                                                                        <input type="text" class="form-control" class="form-control" id="name" name="name" value="<?= $tb['name']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                                                    </div>
                                                                    <!-- NIM -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">NIM</label>
                                                                        <input type="text" class="form-control" class="form-control" id="nip/nim" name="nip/nim" value="<?= $tb['nip/nim']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                                        <?= form_error('nip/nim', '<small class="text-danger">', '</small>'); ?>
                                                                    </div>
                                                                    <!-- Email -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">Email</label>
                                                                        <input type="text" class="form-control" class="form-control" id="email" name="email" value="<?= $tb['email']; ?>" readonly>
                                                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                                                    </div>
                                                                    <!-- Password -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput2">Password</label>
                                                                        <input type="password" class="form-control" class="form-control" id="password" name="password" value="<?= $tb['password']; ?>" readonly>
                                                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                                                    </div>
                                                                    <!-- Role -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect2">Role</label>
                                                                        <select class="form-control" name="id_role" id="id_role" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                                            <?php foreach ($getrole as $rol) : ?>
                                                                                <option value="<?php echo $rol['id_role']; ?>" <?php if ($rol['id_role'] == $tb['id_role']) : ?> selected="selected" <?php endif; ?>>
                                                                                    <?php echo $rol['role']; ?>
                                                                                </option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Prodi -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect2">Prodi</label>
                                                                        <select class="form-control" name="id_prodi" id="id_prodi" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                                            <?php foreach ($getprodi as $prod) : ?>
                                                                                <option value="<?php echo $prod['id_prodi']; ?>" <?php if ($prod['id_prodi'] == $tb['id_prodi']) : ?> selected="selected" <?php endif; ?>>
                                                                                    <?php echo $prod['nama_prodi']; ?>
                                                                                </option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <!-- Picture -->
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect2">Foto Profil</label>
                                                                        <div class="form-group">
                                                                            <img src="<?= base_url('assets/img/profile/') . $tb['image']; ?>" class="img-thumbnail" width="100px">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Detail -->

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Akhir View TKK -->
                    <!-- Output Collapse TKK -->
                </div>
                <!-- Akhir Card TKK -->

            </div>
        </div>
        <!-- AKHIR KONTEN TIF -->

    </div>
    <!-- AKHIR KONTEN -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->