<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>টেকসই বিডি </title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content=" ডিজিটাল বাংলাদেশের প্রযুক্তি সুবিধা কাজে লাগিয়ে tekasaibd.com একটা টেকসই মানের অনলাইন প্ল্যাটফর্ম তৈরিতে কাজ করছে। এতে বেকারত্ব দূরীকরণের মধ্যদিয়ে জাতির পিতার স্বপ্নের বাস্তবায়ণ দারিদ্র মুক্ত স্বনির্ভর সোনার বাংলা বিনির্মাণে টেকসই লক্ষ্যমাত্র অর্জনে ভূমিকা রাখবে"/>
    <meta name="keywords" content="ডিজিটাল বাংলাদেশের প্রযুক্তি "/>
    <meta name="author" content="Shreethemes"/>
    <meta name="Version" content="2.0"/>
    <!-- favicon -->
    <link href="{{asset('/')}}news/news.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('/')}}front/images/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap -->
    <link href="{{asset('/')}}front/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Icons -->
    <link href="{{asset('/')}}front/css/materialdesignicons.min.css" rel="stylesheet" type="text/css"/>
    <!--Fonts-->
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <!-- Magnific -->
    <link href="{{asset('/')}}front/css/magnific-popup.css" rel="stylesheet" type="text/css"/>
    <!-- Slider -->
    <link rel="stylesheet" href="{{asset('/')}}front/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="{{asset('/')}}front/css/owl.theme.default.min.css"/>
    <!-- FLEXSLIDER -->
    <link href="{{asset('/')}}front/css/flexslider.css" rel="stylesheet" type="text/css"/>
    <!-- Date picker -->
    <link rel="stylesheet" href="{{asset('/')}}front/css/flatpickr.min.css">
    <!-- Main Css -->
    <link href="{{asset('/')}}front/css/style.css" rel="stylesheet" type="text/css" id="theme-opt"/>
    <link href="{{asset('/')}}front/css/colors/default.css" rel="stylesheet" id="color-opt">
    <!-- Image viewer -->
    <link href="https://cdn.bootcss.com/balloon-css/0.5.0/balloon.min.css" rel="stylesheet">
    <link href="{{asset('/')}}viewer/css/jquery.magnify.css" rel="stylesheet">
    <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">
{{--<link href="{{asset('/')}}viewer/css/snack.css" rel="stylesheet">--}}
{{--<link href="{{asset('/')}}viewer/css/snack-helper.css" rel="stylesheet">--}}
{{--<link href="{{asset('/')}}viewer/css/docs.css" rel="stylesheet">--}}
<!--End Image viewer -->

    <style>
        .quiz_time {
            background: #2f55d4;
            color: #fff;
            bottom: 0;
            padding: 10px 20px;
            font-size: 20px;
            border-radius: 10px 10px 0 0;
            font-weight: bold;
            display: none;
        }
    </style>

</head>

<body>
<!-- Loader -->
<!-- Loader -->


<!-- Navbar End -->
@include('front.include.header')
<!-- Hero Start -->


@yield('body')
<!-- Footer Start -->
@include('front.include.footer')

<!-- Start Style switcher -->
<!--<div id="style-switcher" style="left: 0px;" class="bg-light border p-3 pt-2 pb-2">-->
<!--    <h3 class="title text-center">Select Your Color</h3>-->
<!--    <ul class="pattern text-center mb-2">-->
<!--        <li class="list-inline-item">-->
<!--            <a class="default" href="{{asset('/')}}front/#"></a>-->
<!--        </li>-->
<!--        <li class="list-inline-item">-->
<!--            <a class="green" href="{{asset('/')}}front/#"></a>-->
<!--        </li>-->
<!--        <li class="list-inline-item">-->
<!--            <a class="red" href="{{asset('/')}}front/#"></a>-->
<!--        </li>-->
<!--        <li class="list-inline-item">-->
<!--            <a class="skyblue" href="{{asset('/')}}front/#"></a>-->
<!--        </li>-->
<!--    </ul>-->

<!--    <h3 class="title text-center pt-3 mb-0 border-top">Theme Option</h3>-->
<!--    <div class="text-center">-->
<!--        <a href="{{asset('/')}}front/#" class="btn btn-sm w-100 btn-primary rtl-version t-rtl-light mt-2">RTL</a>-->
<!--        <a href="{{asset('/')}}front/#" class="btn btn-sm w-100 btn-primary ltr-version t-ltr-light mt-2">LTR</a>-->
<!--        <a href="{{asset('/')}}front/#" class="btn btn-sm w-100 btn-primary dark-rtl-version t-rtl-dark mt-2">RTL</a>-->
<!--        <a href="{{asset('/')}}front/#" class="btn btn-sm w-100 btn-primary dark-ltr-version t-ltr-dark mt-2">LTR</a>-->
<!--        <a href="{{asset('/')}}front/#" class="btn btn-sm w-100 btn-dark dark-version t-dark mt-2">Dark</a>-->
<!--        <a href="{{asset('/')}}front/#" class="btn btn-sm w-100 btn-dark light-version t-light mt-2">Light</a>-->
<!--    </div>-->
<!--    <div class="bottom">-->
<!--        <a href="{{asset('/')}}front/#" class="settings bg-white shadow d-block"><i class="mdi mdi-settings ml-1 mdi-24px position-absolute mdi-spin text-primary"></i></a>-->
<!--    </div>-->
<!--</div>-->
<!-- End Style switcher -->

<!-- Back to top -->
<a href="{{asset('/')}}front/#" class="back-to-top rounded text-center" id="back-to-top">
    <i class="mdi mdi-chevron-up d-block"></i>
</a>
<!-- Back to top -->

<!-- javascript -->
<script src="{{asset('/')}}front/js/jquery.min.js"></script>
<script src="{{asset('/')}}front/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}front/js/jquery.easing.min.js"></script>
<script src="{{asset('/')}}front/js/scrollspy.min.js"></script>
<!-- Magnific Popup -->
<script src="{{asset('/')}}front/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('/')}}front/js/magnific.init.js"></script>
<!-- SLIDER -->
<script src="{{asset('/')}}front/js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}front/js/owl.init.js"></script>
<!--FLEX SLIDER-->
<script src="{{asset('/')}}front/js/jquery.flexslider-min.js"></script>
<script src="{{asset('/')}}front/js/flexslider.init.js"></script>
<!-- Datepicker -->
<script src="{{asset('/')}}front/js/flatpickr.min.js"></script>
<script src="{{asset('/')}}front/js/flatpickr.init.js"></script>
<!-- Contact -->
<script src="{{asset('/')}}front/js/contact.js"></script>
<!-- Switcher -->
<script src="{{asset('/')}}front/js/switcher.js"></script>
<!-- Main Js -->
<script src="{{asset('/')}}front/js/app.js"></script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    $('#myTab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
    $('#myTab a[href="{{asset('/')}}front/#nav-profile"]').tab('show') // Select tab by name
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
</script>

@yield('script')

<script>
    var questionNo = 2;
    $(document).on('click', '#nextBtn', function () {
        var data1 = $('#eventId').val();
        var data2 = $('#playerId').val();
        var data3 = $('#questionId').val();
        var data4 = $("input[name='customRadio']:checked").val();
        $.ajax({
            url: "get-new-question/" + data1 + "/" + data2 + "/" + data3 + "/" + data4,
            method: 'GET',
            dataType: 'JSON',
            success: function (response) {
                console.log(response);
                var resultRow = $('#resultRow');
                resultRow.empty();
                var div = '';
                div += '<div class="col-lg-6 col-md-6">';
                div += '<div class="custom-control custom-radio">';
                div += '<input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">';
                div += '<label class="custom-control-label" for="customRadio1">' + response.one + '</label>';
                div += '</div>';
                div += '<div class="custom-control custom-radio">';
                div += '<input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">';
                div += '<label class="custom-control-label" for="customRadio2"> ' + response.two + ' </label>';
                div += '</div>';
                div += '</div>';
                div += '<div class="col-lg-6 col-md-6">';
                div += '<div class="custom-control custom-radio">';
                div += '<input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">';
                div += '<label class="custom-control-label" for="customRadio3"> ' + response.three + ' </label>';
                div += '</div>';
                div += '<div class="custom-control custom-radio">';
                div += '<input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">';
                div += '<label class="custom-control-label" for="customRadio4"> ' + response.four + ' </label>';
                div += '</div>';
                div += '</div>';
                resultRow.append(div);
                $('#questionNo').text(questionNo);
                $('#questionTitle').text(response.question);
                questionNo++;
            }
        });
    });
</script>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="{{asset('/')}}viewer/js/vendor/jquery-1.12.4.min.js"><\/script>')
</script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/prettify/r298/prettify.min.js"></script>
<script src="https://cdn.bootcss.com/vue/2.5.16/vue.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('/')}}viewer/js/jquery.magnify.js"></script>
<script>
    window.prettyPrint && prettyPrint();

    var defaultOpts = {
        draggable: true,
        resizable: true,
        movable: true,
        keyboard: true,
        title: true,
        modalWidth: 320,
        modalHeight: 320,
        fixedContent: true,
        fixedModalSize: false,
        initMaximized: false,
        gapThreshold: 0.02,
        ratioThreshold: 0.1,
        minRatio: 0.05,
        maxRatio: 16,
        headToolbar: ['maximize', 'close'],
        footToolbar: ['zoomIn', 'zoomOut', 'prev', 'fullscreen', 'next', 'actualSize', 'rotateRight'],
        multiInstances: true,
        initEvent: 'click',
        initAnimation: true,
        fixedModalPos: false,
        zIndex: 1090,
        dragHandle: '.magnify-modal',
        progressiveLoading: true
    };

    var vm = new Vue({
        el: '#playground',
        data: {
            options: defaultOpts
        },
        methods: {
            changeTheme: function (e) {
                if (e.target.value === '0') {
                    $('.magnify-theme').remove();
                } else if (e.target.value === '1') {
                    $('.magnify-theme').remove();
                    $('head').append('<link class="magnify-theme" href="{{asset('/')}}viewer/css/magnify-bezelless-theme.css" rel="stylesheet">');
                } else if (e.target.value === '2') {
                    $('.magnify-theme').remove();
                    $('head').append('<link class="magnify-theme" href="{{asset('/')}}viewer/css/magnify-white-theme.css" rel="stylesheet">');
                }
            }
        },
        updated: function () {
            $('[data-magnify]').magnify(this.options);
        }
    });

</script>
</body>
</html>
