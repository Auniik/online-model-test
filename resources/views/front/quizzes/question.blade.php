@extends('front.layout.master')
@push('style')
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
        .unselectable {
            -webkit-user-select: none;
            -webkit-touch-callout: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
    </style>

@endpush
@section('content')
    <section class="section-two unselectable bg-light custom-new-quiz" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 mt-2 bg-white shadow-sm text-center">
                            <div id="countdown">
                                <span id="timer"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row p-4 shadow bg-white">
                        <div class="col-lg-12">
                            <form id="form" class="question-form">
                                @csrf
                                <div class="row questions-row" id="question-row" style="display: none">

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <hr>
    <hr>
@endsection

@push('script')
{{--    preventions--}}
    <script>
        body = document.getElementById('body');
        $('.contact-form').remove()
        $('#location-part').remove()

        function handler(event) {
            event = event || window.event;

            if (event.stopPropagation)
                event.stopPropagation();

            event.cancelBubble = true;
            return false;
        }


        // body.oncontextmenu = handler;
        // body.onmousedown = handler;
        // body.onmouseup = handler;
    </script>

{{--    initializations--}}
    <script>

        var duration = "{{$duration}}";
        var assessment_id = "{{$assessment_id}}";
        const timeArray = duration.split(':')
        const seconds = (parseInt(timeArray[0]) * 60) + parseInt(timeArray[1]);
        const type = "{{$participant_type}}";

        document.getElementById('timer').innerHTML = duration



    </script>


{{--    definations--}}
    <script>
        function scrollToTop() {
            window.scroll({
                top: 0,
                left: 0,
                behavior: 'smooth'
            });
        }

        loadQuestion();


        function loadQuestion() {
            $.ajax({
                url: `/render-question/{{$assessment_id}}`,
                type: 'GET',
                dataType: 'HTML',
            }).done(function (data) {
                if(data === 'COMPLETED') {
                    completedAction()
                } else {
                    scrollToTop()
                    $('.questions-row').html(data).show(500)
                    if(type !== 'vip') {
                        startTimer("{{$duration}}");
                    }
                }
            });
        }



        $(document).on('click', '.go-on-btn', function () {
            $('#stage').val('question');
            $('.discussion-wrapper').hide(500)
            $('#wrapper').show(500)

        })
        $(document).on('click', '#show-options-btn', function () {
            $(this).hide(300)
            $('#nextButton').show(300)
            $('.option-wrapper').show(300)
            $('#stage').val('option')
            startTimer("{{$duration}}")
        })

        $(document).on('click', '#nextButton', function () {
            $('#question-row').hide(200);
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
                    scrollToTop()
                    $('#nextButton').attr('disabled', true)
                    $('.questions-row').html(data).show(500)
                    {{--if ("{{$participant_type}}" !== 'general') {--}}
                    {{--    document.getElementById('timer').innerHTML = "{{$duration}}"--}}
                    {{--}--}}
                }
            });
        })

        $(document).on('click', '#skipButton', function () {
            $('#question-row').hide(200);
            let data = {
                quiz_question_id: $("input[name=quiz_question_id]").val(),
                quiz_assessment_id: $("input[name=quiz_assessment_id]").val(),
                quiz_option_id: null,
                _token: "{{csrf_token()}}"
            }
            $.ajax({
                url: `/save-answer`,
                data,
                type: 'POST',
                dataType: 'HTML',
            }).done(function (data) {
                if(data === 'COMPLETED') {
                    completedAction()
                }
                else {
                    scrollToTop()
                    $('#nextButton').attr('disabled', true)
                    $('.questions-row').html(data).show(500)
                    {{--if ("{{$participant_type}}" !== 'general') {--}}
                    {{--    document.getElementById('timer').innerHTML = "{{$duration}}"--}}
                    {{--}--}}
                }
            });
        })

        $(document).on('click', '.custom-control-label, .custom-control-input', () => {
            $('#nextButton').attr('disabled', false)
        })


        function completedAction() {
            $('#nextButton').hide()
            $('#skipButton').hide()
            $('#timer').hide()
            location.href = `complete-quiz/{{$assessment_id}}`
        }

    </script>

    <script>
        // window.onbeforeunload = function() {
        //     window.setTimeout(function () {
        //         window.location = `/complete-quiz/${assessment.id}`;
        //      }, 0);
        //     window.onbeforeunload = null;
        // }
    </script>

{{--Timer--}}
    <script>
        function startTimer(time = null) {
            let presentTime = time || document.getElementById('timer').innerHTML;
            let timeArray = presentTime.split(/[:]+/);
            let m = parseInt(timeArray[0]);
            let s = checkSecond(timeArray[1] - 1);
            if (s === 59) m--

            if (m < 0) {
                {{--location.href = `complete-quiz/{{$assessment_id}}`;--}}
                // alert('timer completed')
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
