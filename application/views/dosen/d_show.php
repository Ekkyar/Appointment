<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Konten -->
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body" style="height: 250px; overflow: scroll;">
					<div id="chatMessage">
						<!-- chat message -->
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 mt-4">
			<div class="card">
				<div class="card-body">
					<div class="form-group">
						<textarea id="message" rows="3" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" onclick="send();">Send</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Konten -->

</div>
<!-- /.container-fluid -->

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

	setInterval(() => {
		loadChat();
	}, 6000);

	function loadChat() {
		$.ajax({
			url: "<?= base_url(); ?>dosen/dchat/chat_ajax/<?= $this->uri->segment(4); ?>",
			dataType: "json",
			success: function (data) {
				var baris = ``;
				for (var i = 0; i < data.length; i++) {
					var role = data[i].id_role;
					var from = data[i].from_by;
					var message = data[i].message;
					var time = data[i].update_time;

					if(role == 2) {
						var chat = `<div class="alert alert-info text-right">
						<small class="text-muted">from <b>${from}</b> at ${time}</small>
						<p>${message}</p>
						</div>`;
					} else if (role == 3) {
						var chat = `<div class="alert alert-success text-left">
						<small class="text-muted">from <b>${from}</b> at ${time}</small>
						<p>${message}</p>
						</div>`;
					}

					baris += `${chat}`;
				}
				$('#chatMessage').html(baris);
			}
		})
	}

	function send() {
		var message = $('#message').val();
		$.ajax({
				url: "<?php echo base_url(); ?>Dosen/dchat/sendReply",
				type: "POST",
				data: {
					id_chat: <?= $this->uri->segment(4); ?>,
					id_user: <?= $this->session->userdata('id_user'); ?>,
					message: message
				},
				success: function () {
					alert("Reply Successfully added");
					window.location.href = "<?= base_url(); ?>Dosen/dchat/show/<?= $this->uri->segment(4); ?>";
				}
			})
	}

</script>
