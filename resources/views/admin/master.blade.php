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
{{--    <link href="{{asset('/')}}admin/assets/plugins/fullcalendar/vanillaCalendar.css" rel="stylesheet" type="text/css">--}}
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
    <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="/css/toastr.min.css">
    <style>
        body {
            font-family: 'AdorshoLipi', Arial, sans-serif !important;
        }
        span.select2-selection.select2-selection--single {
            height: 36px;
        }
        @media print
        {
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
        @media screen
        {
            .no-screen, .no-screen *
            {
                display: none !important;
            }
        }
    </style>

    @stack('style')

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
    var $_loading = false;
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
{{--<script src="{{asset('/')}}admin/assets/plugins/fullcalendar/vanillaCalendar.js"></script>--}}
{{--<script src="{{asset('/')}}admin/assets/plugins/raphael/raphael-min.js"></script>--}}
{{--<script src="{{asset('/')}}admin/assets/plugins/morris/morris.min.js"></script>--}}
{{--<script src="{{asset('/')}}admin/assets/pages/dashborad.js"></script>--}}
<script src="{{asset('/')}}admin/assets/plugins/select2/select2.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $( function() {
        $( ".datepicker" ).datepicker({
            dateFormat: "yy-mm-dd",
            minDate: 0
        });
        $( ".datepicker-2" ).datepicker({
            dateFormat: "yy-mm-dd",
        });
    } );

</script>


<script>
    $(document).ready(function() {
        initSample();
        $('.select2').select2();
        $('#datatable2').DataTable();

    });
    $("input.integer").bind("change keyup input", function () {
        var position = this.selectionStart - 1;
        //remove all but number and .
        var fixed = this.value.replace(/[^0-9]/g, '');

        if (this.value !== fixed) {
            this.value = fixed;
            this.selectionStart = position;
            this.selectionEnd = position;
        }
    });
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

</script>

<!--Date-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/wickedpicker@0.4.3/dist/wickedpicker.min.js"></script>
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
<script src="{{asset('/')}}admin/assets/js/app.js"></script>
<script src="{{asset('/')}}admin/assets/swal/sweetalert2.all.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/custom.js"></script>
<script src="/js/toastr.min.js"></script>
<script>

    @if($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{$error}}")
        @endforeach
    @endif
    @if(session()->has('success'))
        toastr.success("{{session('success')}}")
    @endif
    @if(session()->has('danger'))
        toastr.error("{{session('danger')}}")
    @endif
    @if(session()->has('warning'))
        toastr.warning("{{session('warning')}}")
    @endif
</script>
@stack('script')

</body>
</html>
