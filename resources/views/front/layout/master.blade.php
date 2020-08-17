<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('front._partials.meta')

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
    <link rel="stylesheet" href="/css/toastr.min.css">

    <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">
    <style>
        body {
            font-family: 'AdorshoLipi', Arial, sans-serif !important;
        }

        @font-face {
            font-family: shorif-shishir;
            src: url('/front-end/fonts/Shorif-Shishir-Unicode.ttf');
        }
    </style>
    @stack('style')
</head>

<body class="content" id="body">

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/bn_IN/sdk.js#xfbml=1&version=v8.0&appId=909731212771520&autoLogAppEvents=1" nonce="cjB6ryb4"></script>

@include('front._partials.header')
<!---------------------------- স্ক্রল বাটন শুরু --------------->
<!-- Load Facebook SDK for JavaScript -->

<!-- Go to www.addthis.com/dashboard to customize your tools -->


<section class="scroll">
    <a href="#" class="scroll_btn  animated slideInDown"><i class="fas fa-angle-double-up"></i></a>
</section>

@yield('content')


<br><br>

{{--<button id="myBtn">Open Modal</button>--}}

<div id="myModal" class="share-modal">
    <!-- Modal content -->
    <div class="share-modal-content">
        <div class="share-modal-content text-center">
            <div class="share-modal-header">
                <span class="close">×</span>
                <h2>Share now!</h2>
            </div>
            <div class="share-modal-body">
                <div class="social-icons">


                </div>
                <div class="col-lg-5 d-flex my-5" style="margin: 0 auto">
                    <input type="text" class="form-control" autocomplete="off" id="shareable-url"
                           value="{{request()->url()}}">
                    <button onclick="copyURL(this)" class="btn btn-outline-success copy-btn">Copy</button>
                </div>
            </div>

        </div>
    </div>

</div>

<!---------------------------- বার্তা অংশ শেষ --------------->
@include('front._partials.footer')



@if ($assessment)
    <div class="pop-up-timer">
        <a  href="{{url('exam-hall')}}" title=" পরীক্ষা চালিয়ে যেতে এখানে ক্লিক করুন">
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
<!-- Magnific Popup -->
<script src="{{asset('/')}}front/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('/')}}front/js/magnific.init.js"></script>
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
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('/')}}viewer/js/jquery.magnify.js"></script>
<script src="/front-end/js/custom.js"></script>
<script src="/js/toastr.min.js"></script>
<script>
    toastr.options.closeMethod = 'fadeOut';
    toastr.options.closeDuration = 300;
    toastr.options.closeEasing = 'swing';
    toastr.options.progressBar = true;
    window.prettyPrint && prettyPrint();
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
<script>
    @if(session()->has('errors'))
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
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    // var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    // btn.onclick = function() {
    //     modal.style.display = "block";
    // }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    $(document).on('click', '.share-button', function (e) {
        let url = $(this).data('url')
        if(!url) {
            url = "{{request()->url()}}"
        }
        $('.copy-btn').html('Copy')
        $.ajax({
            url: `/get-social-links`,
            data: {
                url,
                '_token': "{{csrf_token()}}"
            },
            type: 'POST',
            dataType:'HTML',
        }).done(function (data) {
            if(url) {
                $('#shareable-url').val(url)
            }

            $('.social-icons').html(data)
            modal.style.display = "block"
        });

    })

    function copyURL(e) {
        e.innerHTML = 'Copied!'
        /* Get the text field */
        var copyText = document.getElementById("shareable-url");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/

        /* Copy the text inside the text field */
        document.execCommand("copy");
    }
</script>

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

<script>

</script>
@stack('script')
@yield('script')


</body>

</html>
