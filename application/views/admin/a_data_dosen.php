<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Dosen Row -->
   <div class="col mb-4">
      <div class="card shadow mb-4">
         <div class="card-header py-3 text-center">
            <h6 class="m-0 font-weight-bold text-primary">Program Studi</h6>
         </div>

         <!-- Content Row -->
         <div class="card-body accordion mx-auto" id="accordion">

            <!-- Create Collapse -->
            <div class="row mt-4">
               <!-- Collapse MIF Card -->
               <div class="col mb-4">
                  <div class="card" style="width: 15rem;">
                     <img src="<?= base_url('assets/logo/mif.png'); ?>" class="card-img-top" alt="...">
                     <div class="card-body text-center">
                        <a type="button" data-toggle="collapse" data-target="#collapseMIF" aria-expanded="true" aria-controls="collapseMIF">
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
                        <a type="button" data-toggle="collapse" data-target="#collapseTIF" aria-expanded="true" aria-controls="collapseTIF">
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
                        <a type="button" data-toggle="collapse" data-target="#collapseTKK" aria-expanded="true" aria-controls="collapseTKK">
                           <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Teknik Komputer</div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Akhir Create Collapse -->

            <!-- Output Collapse MIF -->
            <div class="collapse show mb-4" id="collapseMIF" data-parent="#accordion">
               <div class="row">
                  <div class="col text-center">
                     <h3 class="text-primary">Data Dosen MIF</h3>
                  </div>
               </div>
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
                        <form action="<?= base_url('Admin/aDataDosen/insert_dosen_mif'); ?>" method="post">
                           <div class="modal-body">
                              <!-- Nama -->
                              <div class="form-group">
                                 <label for="exampleFormControlInput1">Nama Dosen</label>
                                 <input type="text" class="form-control" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                 <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <!-- NIP -->
                              <div class="form-group">
                                 <label for="exampleFormControlInput1">NIP</label>
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
                              <th scope="col">NIP</th>
                              <th scope="col">Email</th>
                              <th scope="col"></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           foreach ($dosen_mif as $tb) :
                           ?>
                              <tr>
                                 <td><?= $tb['id_user'] ?></td>
                                 <td><?= $tb['name'] ?></td>
                                 <td><?= $tb['nip/nim'] ?></td>
                                 <td><?= $tb['email'] ?></td>
                                 <td>
                                    <!-- Tombol -->
                                    <!-- Detail -->
                                    <a href="" class="badge badge-primary" data-toggle="modal" data-target="#lihatDosen<?= $tb['id_user']; ?>">detail</a> |
                                    <!-- delete -->
                                    <a href="<?= base_url('Admin/aDataDosen/delete_user/'); ?><?= $tb['id_user']; ?>" class="badge badge-danger" onclick="return confirm('Your data will be delete. Are you sure to continue?');">hapus</a>

                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="lihatDosen<?= $tb['id_user']; ?>" tabindex="-1" aria-labelledby="lihatDosenlabel" aria-hidden="true">
                                       <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="lihatDosenlabel">Detail <?= $title; ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>

                                             <!-- Form -->
                                             <form action="<?= base_url('Admin/aDataDosen/ubah_user/'); ?><?= $tb['id_user']; ?>" method="post">
                                                <div class="modal-body">
                                                   <div class="form-group">
                                                      <label for="exampleFormControlInput2">Id User</label>
                                                      <input type="text" class="form-control" class="form-control" id="id_user" name="id_user" placeholder="<?= $tb['id_user']; ?>" readonly>
                                                   </div>
                                                   <!-- Nama -->
                                                   <div class="form-group">
                                                      <label for="exampleFormControlInput2">Nama Dosen</label>
                                                      <input type="text" class="form-control" class="form-control" id="name" name="name" value="<?= $tb['name']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                      <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                                   </div>
                                                   <!-- NIP -->
                                                   <div class="form-group">
                                                      <label for="exampleFormControlInput2">NIP</label>
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
                                                         <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" width="100px">
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
            </div>
            <!-- Akhir Output Collapse MIF -->

            <!-- Output Collapse TIF -->
            <div class="collapse mb-4" id="collapseTIF" data-parent="#accordion">
               <div class="row">
                  <div class="col text-center">
                     <h3 class="text-primary">Data Dosen TIF</h3>
                  </div>
               </div>
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
                        <form action="<?= base_url('Admin/aDataDosen/insert_dosen_tif'); ?>" method="post">
                           <div class="modal-body">
                              <!-- Nama -->
                              <div class="form-group">
                                 <label for="exampleFormControlInput1">Nama Dosen</label>
                                 <input type="text" class="form-control" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                 <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <!-- NIP -->
                              <div class="form-group">
                                 <label for="exampleFormControlInput1">NIP</label>
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
                              <th scope="col">NIP</th>
                              <th scope="col">Email</th>
                              <th scope="col"></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           foreach ($dosen_tif as $tb) :
                           ?>
                              <tr>
                                 <td><?= $tb['id_user'] ?></td>
                                 <td><?= $tb['name'] ?></td>
                                 <td><?= $tb['nip/nim'] ?></td>
                                 <td><?= $tb['email'] ?></td>
                                 <td>
                                    <!-- Tombol -->
                                    <!-- Detail -->
                                    <a href="" class="badge badge-primary" data-toggle="modal" data-target="#lihatDosen<?= $tb['id_user']; ?>">detail</a> |
                                    <!-- delete -->
                                    <a href="<?= base_url('Admin/aDataDosen/delete_user/'); ?><?= $tb['id_user']; ?>" class="badge badge-danger" onclick="return confirm('Your data will be delete. Are you sure to continue?');">hapus</a>

                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="lihatDosen<?= $tb['id_user']; ?>" tabindex="-1" aria-labelledby="lihatDosenlabel" aria-hidden="true">
                                       <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="lihatDosenlabel">Detail <?= $title; ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>

                                             <!-- Form -->
                                             <form action="<?= base_url('Admin/aDataDosen/ubah_user/'); ?><?= $tb['id_user']; ?>" method="post">
                                                <div class="modal-body">
                                                   <div class="form-group">
                                                      <label for="exampleFormControlInput2">Id User</label>
                                                      <input type="text" class="form-control" class="form-control" id="id_user" name="id_user" placeholder="<?= $tb['id_user']; ?>" readonly>
                                                   </div>
                                                   <!-- Nama -->
                                                   <div class="form-group">
                                                      <label for="exampleFormControlInput2">Nama Dosen</label>
                                                      <input type="text" class="form-control" class="form-control" id="name" name="name" value="<?= $tb['name']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                      <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                                   </div>
                                                   <!-- NIP -->
                                                   <div class="form-group">
                                                      <label for="exampleFormControlInput2">NIP</label>
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
                                                         <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" width="100px">
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
            </div>
            <!-- Akhir Output Collapse TIF -->

            <!-- Output Collapse TKK -->
            <div class="collapse mb-4" id="collapseTKK" data-parent="#accordion">
               <div class="row">
                  <div class="col text-center">
                     <h3 class="text-primary">Data Dosen TKK</h3>
                  </div>
               </div>
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
                        <form action="<?= base_url('Admin/aDataDosen/insert_dosen_tkk'); ?>" method="post">
                           <div class="modal-body">
                              <!-- Nama -->
                              <div class="form-group">
                                 <label for="exampleFormControlInput1">Nama Dosen</label>
                                 <input type="text" class="form-control" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                 <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <!-- NIP -->
                              <div class="form-group">
                                 <label for="exampleFormControlInput1">NIP</label>
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
                              <th scope="col">NIP</th>
                              <th scope="col">Email</th>
                              <th scope="col"></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           foreach ($dosen_tkk as $tb) :
                           ?>
                              <tr>
                                 <td><?= $tb['id_user'] ?></td>
                                 <td><?= $tb['name'] ?></td>
                                 <td><?= $tb['nip/nim'] ?></td>
                                 <td><?= $tb['email'] ?></td>
                                 <td>
                                    <!-- Tombol -->
                                    <!-- Detail -->
                                    <a href="" class="badge badge-primary" data-toggle="modal" data-target="#lihatDosen<?= $tb['id_user']; ?>">detail</a> |
                                    <!-- delete -->
                                    <a href="<?= base_url('Admin/aDataDosen/delete_user/'); ?><?= $tb['id_user']; ?>" class="badge badge-danger" onclick="return confirm('Your data will be delete. Are you sure to continue?');">hapus</a>

                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="lihatDosen<?= $tb['id_user']; ?>" tabindex="-1" aria-labelledby="lihatDosenlabel" aria-hidden="true">
                                       <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="lihatDosenlabel">Detail <?= $title; ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>

                                             <!-- Form -->
                                             <form action="<?= base_url('Admin/aDataDosen/ubah_user/'); ?><?= $tb['id_user']; ?>" method="post">
                                                <div class="modal-body">
                                                   <div class="form-group">
                                                      <label for="exampleFormControlInput2">Id User</label>
                                                      <input type="text" class="form-control" class="form-control" id="id_user" name="id_user" placeholder="<?= $tb['id_user']; ?>" readonly>
                                                   </div>
                                                   <!-- Nama -->
                                                   <div class="form-group">
                                                      <label for="exampleFormControlInput2">Nama Dosen</label>
                                                      <input type="text" class="form-control" class="form-control" id="name" name="name" value="<?= $tb['name']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                      <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                                   </div>
                                                   <!-- NIP -->
                                                   <div class="form-group">
                                                      <label for="exampleFormControlInput2">NIP</label>
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
                                                         <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" width="100px">
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
            </div>
            <!-- Akhir Output Collapse TKK -->



         </div>

      </div>
   </div>
   <!-- End Dosen Row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->