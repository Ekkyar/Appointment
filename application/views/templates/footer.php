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

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/sb-admin/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sb-admin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/sb-admin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/sb-admin/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/sb-admin/'); ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/sb-admin/'); ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/sb-admin/'); ?>js/demo/chart-pie-demo.js"></script>

<!-- Calendar -->
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/moment.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/fullcalendar/fullcalendar.js'; ?>"></script>

<!-- Custom Calendar -->
<script type="text/javascript">
    var get_data = '<?php echo $get_data; ?>';
    var backend_url = '<?php echo base_url(); ?>';

    $(document).ready(function() {
        $('.date-picker').datepicker();
        $('#calendarIO').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: moment().format('YYYY-MM-DD'),
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                $('#create_modal input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
                $('#create_modal input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
                $('#create_modal').modal('show');
                save();
                $('#calendarIO').fullCalendar('unselect');
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position
                editDropResize(event);
            },
            eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur
                editDropResize(event);
            },
            eventClick: function(event, element) {
                deteil(event);
                editData(event);
                deleteData(event);
            },
            events: JSON.parse(get_data)
        });
    });

    $(document).on('click', '.add_calendar', function() {
        $('#create_modal input[name=calendar_id]').val(0);
        $('#create_modal').modal('show');
    })

    $(document).on('submit', '#form_create', function() {

        var element = $(this);
        var eventData;
        $.ajax({
            url: backend_url + 'calendar/save',
            type: element.attr('method'),
            data: element.serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
            },
            success: function(data) {
                if (data.status) {
                    eventData = {
                        id: data.id,
                        title: $('#create_modal input[name=title]').val(),
                        description: $('#create_modal textarea[name=description]').val(),
                        start: moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                        end: moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                        color: $('#create_modal select[name=color]').val()
                    };
                    $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                    $('#create_modal').modal('hide');
                    element[0].reset();
                    $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                } else {
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html(data.notif);
                }
                element.find('button[type=submit]').html('Submit');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                element.find('button[type=submit]').html('Submit');
                element.find('.alert').css('display', 'block');
                element.find('.alert').html('Wrong server, please save again');
            }
        });
        return false;
    })

    function editDropResize(event) {
        start = event.start.format('YYYY-MM-DD HH:mm:ss');
        if (event.end) {
            end = event.end.format('YYYY-MM-DD HH:mm:ss');
        } else {
            end = start;
        }

        $.ajax({
            url: backend_url + 'calendar/save',
            type: 'POST',
            data: 'calendar_id=' + event.id + '&title=' + event.title + '&start_date=' + start + '&end_date=' + end,
            dataType: 'JSON',
            beforeSend: function() {},
            success: function(data) {
                if (data.status) {
                    $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html('Data success update');
                } else {
                    $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Data cant update');
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Wrong server, please save again');
            }
        });
    }

    function save() {
        $('#form_create').submit(function() {
            var element = $(this);
            var eventData;
            $.ajax({
                url: backend_url + 'calendar/save',
                type: element.attr('method'),
                data: element.serialize(),
                dataType: 'JSON',
                beforeSend: function() {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data) {
                    if (data.status) {
                        eventData = {
                            id: data.id,
                            title: $('#create_modal input[name=title]').val(),
                            description: $('#create_modal textarea[name=description]').val(),
                            start: moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            end: moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            color: $('#create_modal select[name=color]').val()
                        };
                        $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                        $('#create_modal').modal('hide');
                        element[0].reset();
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    } else {
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html(data.notif);
                    }
                    element.find('button[type=submit]').html('Submit');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    element.find('button[type=submit]').html('Submit');
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html('Wrong server, please save again');
                }
            });
            return false;
        })
    }

    function deteil(event) {
        $('#create_modal input[name=calendar_id]').val(event.id);
        $('#create_modal input[name=start_date]').val(moment(event.start).format('YYYY-MM-DD'));
        $('#create_modal input[name=end_date]').val(moment(event.end).format('YYYY-MM-DD'));
        $('#create_modal input[name=title]').val(event.title);
        $('#create_modal input[name=description]').val(event.description);
        $('#create_modal select[name=color]').val(event.color);
        $('#create_modal .delete_calendar').show();
        $('#create_modal').modal('show');
    }

    function editData(event) {
        $('#form_create').submit(function() {
            var element = $(this);
            var eventData;
            $.ajax({
                url: backend_url + 'calendar/save',
                type: element.attr('method'),
                data: element.serialize(),
                dataType: 'JSON',
                beforeSend: function() {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data) {
                    if (data.status) {
                        event.title = $('#create_modal input[name=title]').val();
                        event.description = $('#create_modal textarea[name=description]').val();
                        event.start = moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss');
                        event.end = moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss');
                        event.color = $('#create_modal select[name=color]').val();
                        $('#calendarIO').fullCalendar('updateEvent', event);

                        $('#create_modal').modal('hide');
                        element[0].reset();
                        $('#create_modal input[name=calendar_id]').val(0)
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    } else {
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html(data.notif);
                    }
                    element.find('button[type=submit]').html('Submit');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    element.find('button[type=submit]').html('Submit');
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html('Wrong server, please save again');
                }
            });
            return false;
        })
    }

    function deleteData(event) {
        $('#create_modal .delete_calendar').click(function() {
            $.ajax({
                url: backend_url + 'calendar/delete',
                type: 'POST',
                data: 'id=' + event.id,
                dataType: 'JSON',
                beforeSend: function() {},
                success: function(data) {
                    if (data.status) {
                        $('#calendarIO').fullCalendar('removeEvents', event._id);
                        $('#create_modal').modal('hide');
                        $('#form_create')[0].reset();
                        $('#create_modal input[name=calendar_id]').val(0)
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    } else {
                        $('#form_create').find('.alert').css('display', 'block');
                        $('#form_create').find('.alert').html(data.notif);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#form_create').find('.alert').css('display', 'block');
                    $('#form_create').find('.alert').html('Wrong server, please save again');
                }
            });
        })
    }
</script>

<!-- Custom Profile -->
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>

</body>

</html>