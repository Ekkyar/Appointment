<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Konten -->
	<div class="row">
		<div class="col-md-12 mb-4">
			<span>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					Mulai Chat
				</button>
			</span>
		</div>
        <?php foreach($chatList as $chat) : ?>
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<h4><?= $chat['topic']; ?></h4>
					<p class="card-text">
						<?= $chat['update_time']; ?>
					</p>
                    <a href="<?= base_url(); ?>mahasiswa/mchat/show/<?= $chat['id']; ?>" target="_blank" class="btn btn-primary"><i class="fas fa-eye"></i></a>
				</div>
			</div>
		</div>
        <?php endforeach; ?>
	</div>
	<!-- End Konten -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Chat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="exampleEmail1">Topik</label>
					<input type="text" id="topik" name="topik" class="form-control" placeholder="">
				</div>
				<div class="form-group">
					<label for="exampleEmail1">Dosen</label>
					<select class="form-control" id="id_user" name="id_user">
						<?php foreach($dosen as $d) : ?>
						<option value="<?= $d['id_user']; ?>"><?= $d['name']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="startChat()">Start Chat</button>
			</div>
		</div>
	</div>
</div>

<script>
	function startChat() {
        var topik = $('#topik').val();
        var dosen = $("#id_user option:selected").val();
		$.ajax({
			url: "<?php echo base_url(); ?>Mahasiswa/mChat/start",
			type: "POST",
			data: {
				id_user: dosen,
				topic: topik,
			},
			success: function () {
				alert("Chat Successfully added");
                window.location.href = "<?= base_url(); ?>Mahasiswa/mChat";
			}
		})
	}

</script>
