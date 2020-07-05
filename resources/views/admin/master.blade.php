<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from mannatthemes.com/zoter/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2010], Sun, 03 Feb 2019 19:07:39 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Admin | Techshoi</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Mannatthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{asset('/')}}admin/assets/images/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <!-- jvectormap -->
    <link href="{{asset('/')}}admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <link href="{{asset('/')}}admin/assets/plugins/fullcalendar/vanillaCalendar.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}admin/assets/plugins/morris/morris.css" rel="stylesheet">

    <link href="{{asset('/')}}admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}admin/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}admin/assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link href="{{asset('/')}}admin/assets/css/font-awesome.css" rel="stylesheet" type="text/css">

    <!-- DataTables -->
    <link href="{{asset('/')}}admin/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}admin/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Responsive datatable examples -->
    <link href="{{asset('/')}}admin/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

        <!--Editor-->
    <!-- CKEditor Sample-->
    <script src="{{asset('/')}}admin/ckeditor/ckeditor.js"></script>
    <script src="{{asset('/')}}admin/ckeditor/samples/js/sample.js"></script>
    <link href="{{asset('/')}}admin/assets/swal/sweetalert2.min.css" rel="stylesheet">
    <link href="{{asset('/')}}admin/assets/plugins/select2/select2.min.css" rel="stylesheet">


    <!--End Editor-->

</head>

<body class="fixed-left">
<!-- Loader -->
<!-- Begin page -->
<div id="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
@include('admin.include.sidebar')
    <!-- Left Sidebar End -->
    <!-- Start right Content here -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <!-- Top Bar Start -->
           @include('admin.include.header')
            <!-- Top Bar End -->
           @yield('body')
            <!-- Page content Wrapper -->
        </div>
        <!-- content -->
        @include('admin.include.footer')

    </div>
    <!-- End Right content here -->
</div>
<!-- END wrapper -->
<script>
    var $t = JSON.parse("{{json_encode(trans('default'))}}".replace(/&quot;/g, '"'));
</script>
<!-- jQuery  -->
<script src="{{asset('/')}}admin/assets/js/jquery.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/popper.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/modernizr.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/detect.js"></script>
<script src="{{asset('/')}}admin/assets/js/fastclick.js"></script>
<script src="{{asset('/')}}admin/assets/js/jquery.blockUI.js"></script>
<script src="{{asset('/')}}admin/assets/js/waves.js"></script>
<script src="{{asset('/')}}admin/assets/js/jquery.nicescroll.js"></script>

<!-- Required datatable js -->
<script src="{{asset('/')}}admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{asset('/')}}admin/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatables/jszip.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatables/pdfmake.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatables/vfs_fonts.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatables/buttons.print.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="{{asset('/')}}admin/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<!-- Datatable init js -->
<script src="{{asset('/')}}admin/assets/pages/datatables.init.js"></script>

<script src="{{asset('/')}}admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/skycons/skycons.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/fullcalendar/vanillaCalendar.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/raphael/raphael-min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/morris/morris.min.js"></script>
<script src="{{asset('/')}}admin/assets/pages/dashborad.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/select2/select2.min.js"></script>

<script>

    initSample();
</script>


<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('#datatable2').DataTable();
    });
</script>

<!--Date-->
<script src="{{asset('/')}}admin/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{asset('/')}}admin/js/wickedpicker.min.js"></script>
<script>
    $('#dateTimeMy').daterangepicker({
        singleDatePicker: true,
        startDate: new Date(),
        showDropdowns: true,
        timePicker: true,
        timePickerIncrement: 10,
        autoUpdateInput: true,
        locale: {
            format: 'M/DD/Y, hh:mm A'
        }
    });
    if($('.timepicker').length) {
        $('.timepicker').wickedpicker();
    }
</script>
<script>
    //initSample();
</script>
<!--End Pdf-->
<!-- App js -->
<script src="{{asset('/')}}admin/assets/js/app.js"></script>
<script src="{{asset('/')}}admin/assets/swal/sweetalert2.all.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/custom.js"></script>
<script>

    var index = 1;
    var slNo = 2;
    $(document).on('click', '.add-question-btn', function () {
        var tr = '';
        tr += '<tr>';
        tr += '<td>'+slNo+'</td>';
        tr += '<td><textarea          name="question['+index+'][title]" class="form-control"></textarea></td>';
        tr += '<td><input type="text" name="question['+index+'][write_answer]" class="form-control"/></td>';
        tr += '<td><input type="text" name="question['+index+'][wrong_answer_one]" class="form-control"/></td>';
        tr += '<td><input type="text" name="question['+index+'][wrong_answer_two]" class="form-control"/></td>';
        tr += '<td><input type="text" name="question['+index+'][wrong_answer_three]" class="form-control"/></td>';
        tr += '<td>';
        tr += '<button type="button" class="btn btn-success add-question-btn">+</button>';
        tr += '<button type="button" class="btn btn-danger remove-question-btn">-</button>';
        tr += '</td>';
        tr += '</tr>';
        $('#questionRes').append(tr);
        index++;
        slNo++;
    });

    $(document).on('click', '.remove-question-btn', function () {
        $(this).closest('tr').remove();
    });

</script>
<script>
    var slNo = 1;
    function  getEventByQuestionId(questionID) {
        $.ajax({
            url        : "get-event-by-question-id/"+questionID,
            method     : 'GET',
            dataType   : 'JSON',
            success: function (response) {
                console.log(response);
                var eventSearchRes = $('#eventSearchRes');
                eventSearchRes.empty();
                var tbody = '';
                var tr = '';
                var div = '';

                div +='<select class="form-control" name="event_id" onchange="getEventByQuestionId(this.value)">';
                div += '</select>';
                $.each(response, function (key, value) {
                    tbody+='<tbody>';
                    tr+='<tr>';
                    tr += '<td>'+slNo+'</td>';
                    tr += '<td>'+value.title+'</td>';
                    tr += '<td>'+value.write_answer+'</td>';
                    tr += '<td>'+value.wrong_answer_one+'</td>';
                    tr += '<td>'+value.wrong_answer_two+'</td>';
                    tr += '<td>'+value.wrong_answer_three+'</td>';
                    tr += '<td><a href="/edit-question/'+value.id+'">Edit</a><br/><a href="/delete-question/'+value.id+'">Delete</a></td>';
                    tr += '</tr>';
                    tbody += '</tbody>';
                });
                $('#slNo').text(slNo);
                slNo++;
                eventSearchRes.append(tr);
            }
        });
    }
</script>


<script>
    function getFilteredResult(ID){
        location.href = "/results?event_id="+ID;
    }


    var slNo = 1;
    function  getEventByResultId(resultID) {
        $.ajax({
            url        : "get-event-by-result-id/"+resultID,
            method     : 'GET',
            dataType   : 'JSON',
            success: function (response) {
                console.log(response);
                var resultSearchRes = $('#resultSearchRes');
                resultSearchRes.empty();
                var tbody = '';
                var tr = '';
                var div = '';

                div +='<select class="form-control" name="result_id" onchange="getEventByResultId(this.value)">';
                div += '</select>';
                $.each(response, function (key, value) {
                    tbody+='<tbody>';
                    tr+='<tr>';
                    tr += '<td>'+slNo+'</td>';
                    tr += '<td>'+value.iteration+'</td>';
                    tr += '<td>'+value.title+'</td>';
                    tr += '<td>'+value.name+'<br/>'+value.phone+'</td>';
                    tr += '<td>'+value.total_question+'</td>';
                    tr += '<td>'+value.incorrect+'</td>';
                    tr += '<td>'+value.points+'</td>';
                    tr += '<td>'+value.total_time+'</td>';
                    tr += '<td>'+value.updated_at+'</td>';
                    tr += '</tr>';
                    tbody += '</tbody>';
                })
                $('#slNo').text(slNo);
                slNo++;
                resultSearchRes.append(tr);
            }
        });
    }
</script>

@stack('script')

</body>
</html>
