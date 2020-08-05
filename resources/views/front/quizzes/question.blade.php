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
                                <div class="row questions-row">

                                </div>
                            </form>
                        </div>
                        <div class="col-lg-12 text-center">
                            <hr>
                            <div class="form-group">
                                <input type="button" id="nextButton" disabled class="btn
                            btn-primary w-25" value="পরবর্তী"/>
                            </div>
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
                    $('.questions-row').html(data)
                    startTimer("{{$duration}}");
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
                    if ("{{$participant_type}}" !== 'general') {
                        document.getElementById('timer').innerHTML = "{{$duration}}"
                    }
                }
            });
        })

        $(document).on('click', '.custom-control-label, .custom-control-input', () => {
            $('#nextButton').attr('disabled', false)
        })


        function completedAction() {
            $('#nextButton').hide()
            $('#timer').hide()
            location.href = `complete-quiz/{{$assessment_id}}`
        }

    </script>

    <script>
        window.onbeforeunload = function() {
            window.setTimeout(function () {
                window.location = `/complete-quiz/${assessment.id}`;
             }, 0);
            window.onbeforeunload = null;
        }
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
                location.href = `complete-quiz/{{$assessment_id}}`;
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
