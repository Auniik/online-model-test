@extends('front.master')
@section('body')
    <section class="main-slider">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12 px-0">
                    <img src="{{asset('/')}}front/images/coworking/cta.jpg" class="align-items-center rounded-0"
                         style="height: 250px" width="100%px" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="section-two bg-light pt-4 custom-new-quiz" id="question-one">
        <div class="container">
            <div class="row justify-content-center quize-start">
                <div class="col-lg-12">
                    <div class="quiz_time">Time left = <span id="timer">{{session('quiz_time')}}</span></div>
                    @include('front.partials.notifications')
                    <form class="p-4 shadow bg-white" id="newQuestion">
                        <a href="javascript:" id="startMyQuiz" class="btn btn-lg btn-outline-success">Start My Quiz</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        const quizTime = "{{session('quiz_time')}}";
        function nextQuestion () {
            $.get('/quiz/new-quiz-question', function (response) {
                if (response === 'COMPLETE') {
                    location.href = '/quiz/complete';
                } else {
                    $('#newQuestion').html(response);

                }
            });

        };

        $('#startMyQuiz').on('click', function () {
            nextQuestion();
            $('.quiz_time').show();
            startTimer(quizTime);
        });

        // window.onbeforeunload = function(e) {
        //     console.log(e);
        //     return 'Bye now!';
        // };

        $('#newQuestion').on('click', '#nextQuestion', function () {
            let data = {
                question_id: $('input[name=questionId]').val(),
                answer_id: $('input[name=quizAnswer]:checked').val()
            };
            $.post('/quiz/submit-answer', data, function (r) {
                if (r === 'SUCCESS') {
                    nextQuestion();
                    document.getElementById('timer').innerHTML = quizTime
                }
            })
        });

        //document.getElementById('timer').innerHTML = 05 + ":" + 01;


        function startTimer(time = null) {
            let presentTime = time || document.getElementById('timer').innerHTML;
            let timeArray = presentTime.split(/[:]+/);
            let m = timeArray[0];
            let s = checkSecond((timeArray[1] - 1));
            if(s==59){m=m-1}
            if(m<0){
                location.href = 'complete';
                //alert('timer completed')
            }

            document.getElementById('timer').innerHTML =
                m + ":" + s;
            // console.log(m);
            setTimeout(startTimer, 1000);
        }

        function checkSecond(sec) {
            if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
            if (sec < 0) {sec = 59};
            return sec;
        }
    </script>


@endsection
