<!-- Begin Page Content -->
<div class="container-fluid mx-auto">

    <!-- Dosen Row -->
    <div class="col mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-center">
                <h6 class="m-0 font-weight-bold text-primary">Program Studi</h6>
            </div>

            <!-- Content Row -->
            <div class="card-body mx-auto">

                <!-- Collapse -->
                <div class="row mt-4">
                    <!-- Collapse MIF Card -->
                    <div class="col mb-4">
                        <div class="card" style="width: 15rem;">
                            <img src="<?= base_url('assets/logo/mif.png'); ?>" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <a data-toggle="collapse" href="#collapseMIF" role="button" aria-expanded="false" aria-controls="collapseMIF">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Manajemen Informatika</div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-0"></div>

                    <!-- Collapse TIF Card -->
                    <div class="col mb-4">
                        <div class="card" style="width: 15rem;">
                            <img src="<?= base_url('assets/logo/tif.png'); ?>" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <a data-toggle="collapse" href="#collapseTIF" role="button" aria-expanded="false" aria-controls="collapseTIF">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Teknik Informatika</div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-0"></div>

                    <!-- Collapse TKK Card -->
                    <div class="col mb-4">
                        <div class="card" style="width: 15rem;">
                            <img src="<?= base_url('assets/logo/tkk.png'); ?>" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <a data-toggle="collapse" href="#collapseTKK" role="button" aria-expanded="false" aria-controls="collapseTKK">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Teknik Komputer</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Output Collapse MIF -->
                <div class="collapse mb-4" id="collapseMIF">
                    <div class="row">
                        <div class="col text-center">
                            <h3 class="text-primary">List Dosen MIF</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Id Dosen</th>
                                        <th scope="col">Nama Dosen</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dosen as $tb) :
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $tb['id_dosen'] ?></td>
                                            <td><?= $tb['nama_dosen'] ?></td>
                                            <td><?= $tb['nip'] ?></td>
                                            <td>
                                                <a href="" class="badge badge-success" data-target="<?= $tb['id_dosen']; ?>">Lihat Profil</a> |
                                                <a href="" class="badge badge-primary" data-target="<?= $tb['id_dosen']; ?>">Lihat Jadwal</a> |
                                                <a href="" class="badge badge-danger" data-target="<?= $tb['id_dosen']; ?>">Chat</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Output Collapse TIF -->
                <div class="collapse mb-4" id="collapseTIF">
                    <div class="row">
                        <div class="col text-center">
                            <h3 class="text-primary">List Dosen TIF</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Id Dosen</th>
                                        <th scope="col">Nama Dosen</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dosen as $tb) :
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $tb['id_dosen'] ?></td>
                                            <td><?= $tb['nama_dosen'] ?></td>
                                            <td><?= $tb['nip'] ?></td>
                                            <td>
                                                <a href="" class="badge badge-success" data-target="<?= $tb['id_dosen']; ?>">Lihat Profil</a> |
                                                <a href="" class="badge badge-primary" data-target="<?= $tb['id_dosen']; ?>">Lihat Jadwal</a> |
                                                <a href="" class="badge badge-danger" data-target="<?= $tb['id_dosen']; ?>">Chat</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Output Collapse TKK -->
                <div class="collapse" id="collapseTKK">
                    <div class="row">
                        <div class="col text-center">
                            <h3 class="text-primary">List Dosen TKK</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Id Dosen</th>
                                        <th scope="col">Nama Dosen</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dosen as $tb) :
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $tb['id_dosen'] ?></td>
                                            <td><?= $tb['nama_dosen'] ?></td>
                                            <td><?= $tb['nip'] ?></td>
                                            <td>
                                                <a href="" class="badge badge-success" data-target="<?= $tb['id_dosen']; ?>">Lihat Profil</a> |
                                                <a href="" class="badge badge-primary" data-target="<?= $tb['id_dosen']; ?>">Lihat Jadwal</a> |
                                                <a href="" class="badge badge-danger" data-target="<?= $tb['id_dosen']; ?>">Chat</a>
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
    </div>
    <!-- End Dosen Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->