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
                    <li class="list-group-item kebutuhan"></li>
                    <li class="list-group-item status"></li>
                </ul>
                <hr>
                <form class="form-inline">
                    <div class="form-group mr-3 mb-2">
                        <input class="form-control status_id" type="hidden" />
                        <label for="inputPassword2" class="sr-only">Change Status</label>
                        <select name="status" class="form-control status_event">
                            <option value="waiting">Waiting</option>
                            <option value="accept">Accept</option>
                            <option value="reject">Reject</option>
                        </select>
                    </div>
                    <div class="form-group mr-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Message</label>
                        <textarea class="form-control message_report"></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary mb-2" onclick="updateEvent();">Change</button>
                </form>
                <hr>
                <form class="form-inline">
                    <div class="form-group mr-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Delete Event</label>
                        <input class="form-control event_id" readonly name="id" />
                    </div>
                    <button type="button" class="btn btn-danger mb-2" onclick="deleteEvent();">Delete</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- event modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Event</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <input type="text" placeholder="title" class="form-control" id="addTitle" name="title">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="datetime range" class="form-control" id="rangeTime" name="rangeTime">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addEventButton">Submit Event</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
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

    <script src="<?= base_url('assets/sb-admin/'); ?>js/datetimepicker.js"></script>
    <script>
        function deleteEvent() {
            var eventId = $('.event_id').val();
            $.ajax({
                url: "<?php echo base_url(); ?>Dosen/DJadwal/delete",
                type: "POST",
                data: {
                    id: eventId
                },
                success: function() {
                    alert('Event Removed');
                    window.location.href = "<?= base_url(); ?>Dosen/DJadwal";
                }
            })
        }

        function updateEvent() {
            var eventStatus = $(".status_event option:selected").val();
            var eventId = $('.status_id').val();
            var message = $('.message_report').val();
            // console.log(`${eventStatus} dan ${eventId}`);
            $.ajax({
                url: "<?php echo base_url(); ?>Dosen/DJadwal/update",
                type: "POST",
                data: {
                    status: eventStatus,
                    id: eventId,
                    message: message
                },
                success: function() {
                    alert('Event Updated');
                    window.location.href = "<?= base_url(); ?>Dosen/DJadwal";
                }
            })
        }

        $(document).ready(function() {
            $('#rangeTime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'Y-MM-DD HH:mm:ss'
                }
            })

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                eventColor: 'green',
                selectable: true,
                selectHelper: true,
                events: "<?php echo base_url(); ?>Dosen/Djadwal/load",
                select: function(start, end, allDay) {
                    jQuery.noConflict();
                    $('#addEventModal').modal('show');

                    $('#addEventButton').on('click', function() {
                        var addTitle = $('#addTitle').val();
                        var datetime = $('#rangeTime').val();
                        var id_user = <?= $id_user_dosen; ?>;
                        var arrDate = datetime.split(" ");
                        var start = arrDate[0] + " " + arrDate[1];
                        var end = arrDate[3] + " " + arrDate[4];
                        // console.log(start);
                        // console.log(end);

                        $.ajax({
                            url: "<?php echo base_url(); ?>Dosen/Djadwal/insert",
                            type: "POST",
                            data: {
                                title: addTitle,
                                start: start,
                                end: end,
                                user: id_user,
                                dosen: id_user
                            },
                            success: function(data) {
                                calendar.fullCalendar('refetchEvents');
                                $('#addEventModal').modal('hide');
                                alert(data);
                            }
                        });
                    })
                },
                eventClick: function(event) {
                    jQuery.noConflict();
                    $('#eventModal').modal('show');
                    $('.nama').text(`Nama Lengkap: ${event.user}`);
                    $('.kebutuhan').text(`Kebutuhan: ${event.title}`);
                    $('.status').text(`Status: ${event.status}`);
                    $('.event_id').val(event.id);
                    $('.status_id').val(event.id);
                    $('.message_report').val(event.message);
                }
            });
        });
    </script>

    </body>

    </html>