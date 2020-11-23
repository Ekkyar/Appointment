<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Konten -->

  <div class="container" id="accordion">

    <a class="btn btn-primary mb-4" data-toggle="collapse" href="#collapsemif" role="button" aria-expanded="false" aria-controls="collapsemif">MIF</a>
    <a class="btn btn-primary mb-4" data-toggle="collapse" href="#collapsetif" role="button" data-toggle="modal" data-target="#collapsetif">TIF</a>
    <a class="btn btn-primary mb-4" data-toggle="collapse" href="#collapsetkk" role="button" data-toggle="modal" data-target="#collapsetkk">TKK</a>
    <br>

    <!-- Dosen MIF -->
    <div class="collapse show" id="collapsemif" data-parent="#accordion">
      <label>
        <h5 class="success">List Dosen MIF</h5>
      </label>
      <div>
        <select class="custom-select mb-4 w-50" name="id_role" id="id_role">
          <?php foreach ($mif as $dosmif) : ?>
            <option value="#">
              <?php echo $dosmif['name']; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <!-- Dosen TIF -->
    <div class="collapse" id="collapsetif" data-parent="#accordion">
      <label>
        <h5 class="success">List Dosen TIF</h5>
      </label>
      <div>
        <select class="custom-select mb-4 w-50" name="id_role" id="id_role">
          <?php foreach ($tif as $dostif) : ?>
            <option value="#">
              <?php echo $dostif['name']; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <!-- Dosen TKK -->
    <div class="collapse" id="collapsetkk" data-parent="#accordion">
      <label>
        <h5 class="success">List Dosen TKK</h5>
      </label>
      <div>
        <select class="custom-select mb-4 w-50" name="id_role" id="id_role">
          <?php foreach ($tkk as $dostkk) : ?>
            <option value="#">
              <?php echo $dostkk['name']; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div id="calendar"></div>

  </div>
  <!-- End Konten -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->