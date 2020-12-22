<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Konten -->

  <div class="container">
    
    <?php if($id_prodi == 1) { ?>
      <div class="form-group">
      <label for="exampleEmail1">List Dosen MIF</label><br>
        <select class="custom-select mb-4 w-50" id="id_role">
          <?php foreach ($mif as $dosmif) : ?>
            <option value="<?php echo $dosmif['id_user']; ?>">
              <?php echo $dosmif['name']; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

    <?php } elseif($id_prodi == 2) { ?>
      <div class="form-group">
      <label for="exampleEmail1">List Dosen TIF</label><br>
        <select class="custom-select mb-4 w-50" id="id_role">
          <?php foreach ($tif as $dostif) : ?>
            <option value="<?php echo $dostif['id_user']; ?>">
              <?php echo $dostif['name']; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

    <?php } elseif($id_prodi == 3) { ?>
    <div class="form-group">
    <label for="exampleEmail1">List Dosen TKK</label><br>
        <select class="custom-select mb-4 w-50" id="id_role">
          <?php foreach ($tkk as $dostkk) : ?>
            <option value="<?php echo $dostkk['id_user']; ?>">
              <?php echo $dostkk['name']; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    <?php } ?>

    <div class="mt-4" id="calendar"></div>

  </div>
  <!-- End Konten -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->