@extends('front.layout.master')
@section('content')
    <section id="home_part">
        <div class="container">
            @include('front.online-exam.header' , ['assessment' => $assessment])


            @php
                $sl = $questions->firstItem();
            @endphp
            <div class="questions_part">
                @foreach ($questions as $question)
                    @php
                        $answer = $question->answer ?  $question->answer->answer : null;
                        $attachments = $question->answer ? $question->answer->attachments : [];
                    @endphp


                    <h6>প্রশ্ন {{$sl++}}: {{$question->title}}</h6>


                    @if ($question->isMCQ())
                        <form class="mcqForm margin_left"
                              action="{{route('assessment-answer.store', [$assessment->id, $question->id])}}">
                            @csrf
                            @foreach($question->MCQs as $mcq)
                                <input type="radio"
                                       class="mcq-answer"
                                       id="{{$mcq->id}}"
                                       name="answer"
                                       value="{{$mcq->id}}"
                                       @if ($answer)
                                           @if ($mcq->id == $answer)
                                           checked
                                        @endif
                                    @endif
                                >
                                <label for="{{$mcq->id}}">{{$mcq->value}}</label><br>
                            @endforeach
                        </form>
                    @endif





                    @if ($question->isWritten())
                        <form class="writtenForm margin_left" action="{{route('assessment-answer.store', [$assessment->id,
                        $question->id])}}">
                            @csrf
                            <textarea class="form-control written-answer" name="answer" placeholder="উত্তর  লিখুন"
                                      rows="8">@if($answer){{$answer}}@endif</textarea>
                            <br>
                        </form>


                        @include('front.online-exam._partial.files', [
                            'attachments' => $attachments
                        ])

                        @include('front.online-exam._partial.file-attach-form', [
                            'assessment_id' => $assessment->id,
                            'question_id' => $question->id,
                        ])
                    @endif


                    @if ($question->isCQ())

                        <div class="margin_left">
                            @if ($question->description)
                                <p class="cq-description"><b>উদ্দীপকঃ</b> {{$question->description}}</p>
                            @endif

                            <ul class="list-group" style="margin-bottom:20px ">
                                @foreach($question->CQs as $k => $cq)
                                    <li class="list-group-item d-flex justify-content-between align-items-center
                                    cq-meta">
                                        {{++$k}}. {{$cq->title}}
                                        <span class="badge badge-secondary badge-pill">{{$cq->translatedLevel}}
                                            - {{$cq->max_remarks}}</span>
                                    </li>
                                @endforeach
                            </ul>

                            @include('front.online-exam._partial.files', [
                                'attachments' => $attachments
                            ])
                            @include('front.online-exam._partial.file-attach-form', [
                                'assessment_id' => $assessment->id,
                                'question_id' => $question->id,
                            ])


                        </div>
                    @endif

                @endforeach

                @php
                    $flag = ($questions->lastPage() == request('page'))
                @endphp

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <button type="button"
                            class="btn btn-block btn-success submit-assessment @if (!$flag) d-none @endif">
                        পরীক্ষা শেষ করুন
                    </button>

                {{$questions->links()}}


            </div>
        </div>
    </section>
@endsection

@push('script')

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


        body.oncontextmenu = handler;
    </script>

    <script>

        var writtenAnswer = '';

        $(document).ready(function () {

            $('.submit-assessment').click(function (e) {
                $(".exam-finish-form").submit();
            })

            $('.mcq-answer').click(function (e) {
                $(e.target).parents('.mcqForm').submit()
            })

            $('.written-answer').on('focus', function (e) {
                writtenAnswer = $(e.target).val();
            })
                .on('blur', function (e) {
                    const answer = $(e.target).val();
                    if (answer.length && (answer !== writtenAnswer)) {
                        $(e.target)
                            .parents('.writtenForm')
                            .submit()
                    }
                })
            $('.written-attachments').on('change', function (e) {
                $(e.target)
                    .parents('.writtenFileForm')
                    .submit()
            })

            $('.writtenForm').on('submit', function (e) {
                e.preventDefault()
                const form = $(this)
                triggerSubmitAnswer(form)
            })

            $('.mcqForm').on('submit', function (e) {
                e.preventDefault()
                const form = $(this)
                triggerSubmitAnswer(form)

            })
            $('.delete-file').on('click', function (e) {
                const url = $(this).data('url')

                const flag = confirm('Are you sure want to delete this file ?')

                const li = $(this).parents('li');
                if (flag) {

                    $.ajax({
                        url,
                        type: 'POST',
                        data: {
                            _token: "{{csrf_token()}}"
                        }
                    }).done(function (data) {
                        alert(data.message)
                        li.remove()
                    });
                }

            })

            function triggerSubmitAnswer(form) {
                const data = form.serializeArray().reduce((obj, item) => {
                    obj[item.name] = item.value;
                    return obj;
                }, {})

                const url = form.attr('action')
                $.ajax({
                    url,
                    type: 'POST',
                    data
                }).done(function (data) {
                    alert(data.message)
                });
            }

        })
    </script>

@endpush
