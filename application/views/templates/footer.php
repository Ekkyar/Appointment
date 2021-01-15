<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Appointment JTI <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if want to exit from this account.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('Auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- event modal -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Event</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <ul class="list-group">
                <li class="list-group-item nama"></li>
                <li class="list-group-item dosen-dituju"></li>
                <li class="list-group-item kebutuhan"></li>
                <li class="list-group-item status"></li>
                <li class="list-group-item event-id"></li>
            </ul>
            <hr>
            <div class="form-group">
                <label for="inputPassword2">Message from Sender</label>
                <textarea class="form-control message_report" rows="3" readonly></textarea>
            </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" onClick="deleteEvent()" type="button" data-dismiss="modal">Delete</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/sb-admin/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sb-admin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/sb-admin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/sb-admin/'); ?>js/sb-admin-2.min.js"></script>

<!-- Full Calendar Script -->
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js'></script>
<script>
    function deleteEvent()
    {
        var eventId = $('.event-id').text();
        $.ajax({
            url: "<?php echo base_url(); ?>Mahasiswa/MJadwal/delete",
            type: "POST",
            data: {
                id: eventId
            },
            success: function(data) {
                alert("Event deleted");
                window.location.href = "<?= base_url(); ?>Mahasiswa/MJadwal";
            }
        })
    }

    $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            eventColor: "blue",
            events: "<?php echo base_url(); ?>Mahasiswa/MJadwal/load",
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
                var title = prompt("Masukkan Keperluan");
                var id_prodi = <?= $id_prodi; ?>;

                if (title) {
                    var id_user = <?= $id_user_mahasiswa; ?>;

                    if (id_prodi == 1) {
                        var id_dosen = $("#select_mif option:selected").val();
                    }

                    if (id_prodi == 2) {
                        var id_dosen = $("#select_tif option:selected").val();
                    }

                    if (id_prodi == 3) {
                        var id_dosen = $("#select_tkk option:selected").val();
                    }

                    console.log(id_dosen);
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                    $.ajax({
                        url: "<?php echo base_url(); ?>Mahasiswa/MJadwal/insert",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            user: id_user,
                            dosen: id_dosen
                        },
                        success: function(data) {
                            calendar.fullCalendar('refetchEvents');
                            alert(data);
                        }
                    });
                    
                }
            },
            eventClick: function(event) {
                jQuery.noConflict(); 
                $('#eventModal').modal('show'); 
                $('.nama').text(`Nama Lengkap: ${event.user}`);
                $('.dosen-dituju').text(`Nama Dosen: ${event.dosen == null ? 'semua dosen' : event.dosen}`);
                $('.kebutuhan').text(`Kebutuhan: ${event.title}`);
                $('.status').text(`Status: ${event.status}`);
                $('.event-id').text(`${event.id}`);
                $('.status_id').val(event.id);
                $('.message_report').val(event.message);
                
            }
        });

        $('#select_mif').on('change', function(events) {
            id_dosen_selected = $(this).children("option:selected").val();

            // var eventSources = calendar.getEventSources();

            if (id_dosen_selected != "") {
                console.log(id_dosen_selected);

                events_new = {
                    url: "<?php echo base_url(); ?>Mahasiswa/MJadwal/loadByDosen/" + id_dosen_selected,
                    type: "GET"
                }


                
                calendar.fullCalendar('removeEventSources');
                calendar.fullCalendar('addEventSource', events_new);
                calendar.fullCalendar('refetchEvents');

                // jQuery.noConflict(); 
                // $('#eventModal').modal('show'); 
                // $('.nama').text(`Nama Lengkap: ${events_new.user}`);
                // $('.dosen-dituju').text(`Nama Dosen: ${events_new.dosen}`);
                // $('.kebutuhan').text(`Kebutuhan: ${events_new.title}`);
                // $('.status').text(`Status: ${events_new.status}`);
                // $('.event_id').val(events_new.id);
                // $('.status_id').val(events_new.id);
                // $('.message_report').val(events_new.message);
            } else {
                console.log("semua");
                events_new = {
                    url: "<?php echo base_url(); ?>Mahasiswa/MJadwal/load",
                    type: "GET"
                }

                
                calendar.fullCalendar('removeEventSources');
                calendar.fullCalendar('addEventSource', events_new);
                calendar.fullCalendar('refetchEvents');

                // jQuery.noConflict(); 
                // $('#eventModal').modal('show'); 
                // $('.nama').text(`Nama Lengkap: ${events_new.user}`);
                // $('.dosen-dituju').text(`Nama Dosen: ${events_new.dosen}`);
                // $('.kebutuhan').text(`Kebutuhan: ${events_new.title}`);
                // $('.status').text(`Status: ${events_new.status}`);
                // $('.event_id').val(events_new.id);
                // $('.status_id').val(events_new.id);
                // $('.message_report').val(events_new.message);
            }
        });

        $('#select_tif').on('change', function(events) {
            id_dosen_selected = $(this).children("option:selected").val();

            // var eventSources = calendar.getEventSources();

            if (id_dosen_selected != null) {
                console.log(id_dosen_selected);

                events_new = {
                    url: "<?php echo base_url(); ?>Mahasiswa/MJadwal/loadByDosen/" + id_dosen_selected,
                    type: "GET"
                }

                calendar.fullCalendar('removeEventSources');
                calendar.fullCalendar('addEventSource', events_new);
                calendar.fullCalendar('refetchEvents');
            }
        });

        $('#select_tkk').on('change', function(events) {
            id_dosen_selected = $(this).children("option:selected").val();

            // var eventSources = calendar.getEventSources();

            if (id_dosen_selected != null) {
                console.log(id_dosen_selected);

                events_new = {
                    url: "<?php echo base_url(); ?>Mahasiswa/MJadwal/loadByDosen/" + id_dosen_selected,
                    type: "GET"
                }

                calendar.fullCalendar('removeEventSources');
                calendar.fullCalendar('addEventSource', events_new);
                calendar.fullCalendar('refetchEvents');
            }
        });
    });
</script>

</body>

</html>