@extends('front.layout.master')
@push('style')
    {{--    <link href="/front-end/timeto/timeTo.css" type="text/css" rel="stylesheet"/>--}}
    <link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&display=swap" rel="stylesheet">
    <style>
        @media (max-width: 991px) and (min-width: 768px) {
            label {
                padding-top: 0;
            }
        }

        #countdown {
            font-family: 'Major Mono Display', monospace;
            font-size: 27px;
            color: black;
            font-weight: 800;
        }
    </style>
@endpush
@section('content')
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
    <section class="section-two bg-light custom-new-quiz" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12 mt-2 bg-white shadow-sm text-center">
                            <div id="countdown">
                                <span id="timer"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row p-4 shadow bg-white">
                        <div class="col-12">
                            <form id="form" class="question-form">
                                @csrf
                                <div class="row questions-row">

                                </div>
                            </form>
                        </div>
                        <div class="col-12 text-center">
                            <hr>
                            <div class="form-group">
                                <input type="button" id="nextButton" disabled class="btn
                            btn-primary  w-25" value="পরবর্তী"/>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <hr>
    <hr>
@endsection

@push('script')
    <script>
        const assessment = JSON.parse("{{$assessment}}".replace(/&quot;/g, '"'));
        const timeArray = assessment.quiz.duration.split(':')
        const seconds = (parseInt(timeArray[0]) * 60) + parseInt(timeArray[1]);
        const type = assessment.participant_type;
        loadQuestion();
        document.getElementById('timer').innerHTML = assessment.quiz.duration


        function loadQuestion() {
            $.ajax({
                url: `/render-question/${assessment.id}`,
                type: 'GET',
                dataType: 'HTML',
            }).done(function (data) {
                if(data === 'COMPLETED') {
                    completedAction()
                } else {
                    $('.questions-row').html(data)
                    startTimer(assessment.quiz.duration);
                }
            });
        }

        $(document).on('click', '#nextButton', function () {
            const data = $('#form').serializeArray().reduce((obj, item) => {
                obj[item.name] = item.value;
                return obj;
            }, {})
            $.ajax({
                url: `/save-answer`,
                data,
                type: 'POST',
                dataType: 'HTML',
            }).done(function (data) {
                if(data === 'COMPLETED') {
                    completedAction()
                } else {
                    $('#nextButton').attr('disabled', true)
                    $('.questions-row').html(data)
                    if (type !== 'general') {
                        document.getElementById('timer').innerHTML = assessment.quiz.duration
                    }
                }
            });
        })

        $(document).on('click', '.custom-control-label, .custom-control-input', () => {
            $('#nextButton').attr('disabled', false)
        })

        const COMPLETE_ALERT = `
        <div class="alert alert-success w-100" role="alert">
          You have completed this quiz. Thank you
        </div>
        `

        function completedAction() {
            ('#nextButton').hide()
            $('.questions-row').html(COMPLETE_ALERT)
            $('#timer').hide()
        }

        // window.onbeforeunload = function ( ) {
        //     return true
        // }
    </script>


    <script>
        function startTimer(time = null) {
            let presentTime = time || document.getElementById('timer').innerHTML;
            let timeArray = presentTime.split(/[:]+/);
            let m = parseInt(timeArray[0]);
            let s = checkSecond(timeArray[1] - 1);
            if (s === 59) m--

            if (m < 0) {
                // location.href = 'complete';
                alert('timer completed')
            } else {

                document.getElementById('timer').innerHTML = `${m}:${s}`;
                setTimeout(startTimer, 1000);
            }
        }

        function checkSecond(sec) {
            if (sec < 10 && sec >= 0) {
                sec = "0" + sec
            } // add zero in front of numbers < 10
            if (sec < 0) {
                sec = 59
            }
            return sec;
        }
    </script>


@endpush
