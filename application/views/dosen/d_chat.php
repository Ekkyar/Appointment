<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Konten -->
	<div class="row">
        <?php foreach($chatList as $chat) : ?>
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<h4><?= $chat['topic']; ?></h4>
					<p class="card-text">
                        <small>from <?= $chat['id_user']; ?></small><br>
						<small>Diperbarui pada <?= $chat['update_time']; ?></small>
					</p>
                    <a href="<?= base_url(); ?>dosen/dchat/show/<?= $chat['id']; ?>" target="_blank" class="btn btn-primary"><i class="fas fa-eye"></i></a>
				</div>
			</div>
		</div>
        <?php endforeach; ?>
	</div>
	<!-- End Konten -->

</div>
<!-- /.container-fluid -->

</div>
