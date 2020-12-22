<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Konten -->
    <div class="col">

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($mRequest as $data):
                $id_user = $data['id_user'];
                $query = $this->db->query("SELECT * FROM tb_user WHERE id_user = '$id_user'")->row_array();
            ?>
                <tr>
                    <td><?= $query['name']; ?></td>
                    <td><?= $query['nip/nim']; ?></td>
                    <td><?= $data['title']; ?></td>
                    <td><?= $data['start_event']; ?></td>
                    <td>
                        <a href="<?= base_url();?>dosen/drequest/accept/<?= $data['id']; ?>">Accept</a> |
                        <a href="<?= base_url();?>dosen/drequest/reject/<?= $data['id']; ?>">Reject</a>
                    </td>
                </tr>
            <?php
            endforeach; ?>
            </tbody>
        </table>

    </div>
    <!-- End Konten -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->