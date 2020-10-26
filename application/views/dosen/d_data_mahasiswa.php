<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="accordion" id="accordionExample">

        <div class="col mb-4">
            <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne">MIF</button>
            <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseTwo" aria-controls="collapseTwo">TIF</button>
            <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseThree" aria-controls="collapseThree">TKK</button>
        </div>

        <!-- Content 1 -->
        <div id="collapseOne" class="col collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card shadow mb-4" id="headingOne">
                <div class="card-header py-3 text-center">
                    <h6 class="font-weight-bold text-primary">Manajemen Informatika (MIF)</h6>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">id User</th>
                                        <th scope="col">Nama Mahasiswa</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Image</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($mahasiswa_mif as $mif) :
                                    ?>
                                        <tr>
                                            <td><?= $mif['id_user'] ?></td>
                                            <td><?= $mif['name'] ?></td>
                                            <td><?= $mif['nip/nim'] ?></td>
                                            <td>
                                                <div class="col">
                                                    <img class="img-thumbnail" width="80px" src="<?= base_url('assets/img/profile/') . $mif['image'] ?>" alt="img">
                                                </div>
                                            </td>
                                            <td>
                                                <a href="" class=" badge badge-primary" data-toggle="modal" data-target="#lihatMahasiswa<?= $mif['id_user']; ?>">detail</a> |
                                                <a href="" class=" badge badge-success" data-toggle="modal" data-target="#lihatMahasiswa<?= $mif['id_user']; ?>">Chat</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Content 1 -->

        <!-- Content 2 -->
        <div id="collapseTwo" class="col collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card shadow mb-4" id="headingTwo">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary text-center">Teknik Informatika (TIF)</h6>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">id User</th>
                                        <th scope="col">Nama Mahasiswa</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Image</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($mahasiswa_tif as $tif) :
                                    ?>
                                        <tr>
                                            <td><?= $tif['id_user'] ?></td>
                                            <td><?= $tif['name'] ?></td>
                                            <td><?= $tif['nip/nim'] ?></td>
                                            <td>
                                                <div class="col">
                                                    <img class="img-thumbnail" width="80px" src="<?= base_url('assets/img/profile/') . $mif['image'] ?>" alt="img">
                                                </div>
                                            </td>
                                            <td>
                                                <a href="" class=" badge badge-primary" data-toggle="modal" data-target="#lihatMahasiswa<?= $mif['id_user']; ?>">detail</a> |
                                                <a href="" class=" badge badge-success" data-toggle="modal" data-target="#lihatMahasiswa<?= $mif['id_user']; ?>">Chat</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Content 2 -->

        <!-- Content 3 -->
        <div id="collapseThree" class="col collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card shadow mb-4" id="headingThree">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary text-center">Teknik Komputer (TKK)</h6>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table class="table table-">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">id User</th>
                                        <th scope="col">Nama Mahasiswa</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Image</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($mahasiswa_tkk as $tkk) :
                                    ?>
                                        <tr>
                                            <td><?= $tkk['id_user'] ?></td>
                                            <td><?= $tkk['name'] ?></td>
                                            <td><?= $tkk['nip/nim'] ?></td>
                                            <td>
                                                <div class="col">
                                                    <img class="img-thumbnail" width="80px" src="<?= base_url('assets/img/profile/') . $mif['image'] ?>" alt="img">
                                                </div>
                                            </td>
                                            <td>
                                                <a href="" class=" badge badge-primary" data-toggle="modal" data-target="#lihatMahasiswa<?= $mif['id_user']; ?>">detail</a> |
                                                <a href="" class=" badge badge-success" data-toggle="modal" data-target="#lihatMahasiswa<?= $mif['id_user']; ?>">Chat</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Content 3 -->
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->