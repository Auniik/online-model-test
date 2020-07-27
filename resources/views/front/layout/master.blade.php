<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>টেকসই বিডি</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="বঙ্গবন্ধুর জন্ম শতবার্ষিকী উপলক্ষে তার আদর্শ ও চেতনার প্রতি বিনম্রচিত্ত্বে সম্মান রেখে tekasaibd.com টেকসই লক্ষ্যমাত্রা নির্ধারণ করে মুজিব বর্ষব্যাপী বিভিন্ন সামাজিক ও মানবিক সমস্যার স্থায়ী সমাধান কার্যক্রম হাতে নিয়েছে।">
    <meta name="keywords" content="টেকসই বিডি,tekasaibd.com">
    <meta name="author" content="Md Hafizul Islam">
    <link rel="shortcut icon" type="image/x-icon" href="/front-end/images/logo-1.png">



    <!-- Font Awesome -->
    <link rel="stylesheet" href="/front-end/css/fontawesome.min.css">
    <link rel="stylesheet" href="/front-end/webfonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="/front-end/css/all.min.css">
    <!-- Vendors Files -->
    <link rel="stylesheet" href="/front-end/css/normalize.css">
    <link rel="stylesheet" href="/front-end/css/slick.css">
    <link rel="stylesheet" href="/front-end/css/animate.css">
    <link rel="stylesheet" href="/front-end/css/venobox.css">
    <link rel="stylesheet" href="/front-end/css/bootstrap.min.css">
    <!-- Resources Files -->
    <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">
    <link rel="stylesheet" href="/front-end/css/style.css">
    <link rel="stylesheet" href="/front-end/css/responsive.css">
    <link rel="stylesheet" href="/news/news.css">

    <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">


    <style>
        body {
            font-family: 'AdorshoLipi', Arial, sans-serif !important;
        }
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
    @stack('style')
</head>

<body class="content" id="body">
@include('front._partials.header')
<!---------------------------- স্ক্রল বাটন শুরু --------------->

<section class="scroll">
    <a href="#" class="scroll_btn  animated slideInDown"><i class="fas fa-angle-double-up"></i></a>
</section>

@yield('content')


<br><br>


<!---------------------------- বার্তা অংশ শেষ --------------->
@include('front._partials.footer')



@if ($assessment)
    <div class="pop-up-timer">
        <a  href="/exam-hall" title=" পরীক্ষা চালিয়ে যেতে এখানে ক্লিক করুন">
            <span class="timer"></span>
        </a>

    </div>
    <form class="exam-finish-form d-none"
          action="{{route('exams.finish')}}" method="post">
        @csrf
        <input type="hidden" name="assessment_id" value="{{$assessment->id}}">
        <button class="btn btn-block btn-success submit-assessment"> পরীক্ষা শেষ করুন</button>
    </form>
@endif



<script src="/front-end/js/jquery-1.12.4.min.js"></script>
<script src="/front-end/js/jquery.magnific-popup.min.js"></script>
<script src="/front-end/js/popper.min.js"></script>
<script src="/front-end/js/bootstrap.min.js"></script>
<script src="/front-end/js/venobox.min.js"></script>
<script src="/front-end/js/slick.min.js"></script>
<script src="/front-end/js/html5shiv.min.js"></script>
<script src="/front-end/js/mixitup.min.js"></script>
<script src="/front-end/js/respond.min.js"></script>
<script src="/front-end/js/selectivizr-min.js"></script>
<script src="/front-end/js/script.js"></script>

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
<script src="/front-end/js/custom.js"></script>
<script>

    @if($assessment)
    const started_at = "{{$assessment->possibleEndTime()->format('M d, Y H:i:s')}}"
    // Set the date we're counting down to
    let countDownDate = new Date(started_at).getTime();

    // Update the count down every 1 second
    let x = setInterval(function() {

        // Get today's date and time
        let now = new Date().getTime();

        // Find the distance between now and the count down date
        let distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        // document.querySelector(".timer").innerHTML =  hours + "h " + minutes + "m " + seconds + "s ";
        let timerElement = $('.timer')
        timerElement.text(hours + "h " + minutes + "m " + seconds + "s ")

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            timerElement.text('END');
            // document.querySelector(".timer").innerHTML = 'END';
            document.querySelector(".exam-finish-form").submit();
        }
    }, 1000);
    @endif
</script>
@stack('script')
@yield('script')


</body>

</html>
