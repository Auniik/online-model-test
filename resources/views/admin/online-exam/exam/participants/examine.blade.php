@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4><span id="header-title">Examine {{$assessment->participant->name}} of
                            {{$assessment->exam->name}}</span></h4>
                    <p class="mb-0">Subject: {{$assessment->exam->subject->name}}, Class: {{$assessment->exam->class}},
                        Pass Mark: {{$assessment->exam->competency_score}}</p>
                </div>
                <div class="card-body">
                    @include('admin._partials.success-alert')
                    <div class="question-block">
                        <div class="table-responsive-sm">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>প্রশ্নের ধরন</th>
                                    <th>প্রশ্ন</th>
                                    <th class="text-center">নিরীক্ষণ করা হয়েছে?</th>
                                    <th class="text-center">উত্তর</th>
                                    <th width="20%">Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($questions as $question)
                                        @php
                                            $answer = $question->answer;
                                        @endphp
                                        <tr>
                                            <th>{{$question->translatedType}}</th>
                                            <th>{{$question->title}}</th>
                                            <th class="text-center">
                                                @if($answer)
                                                    @if ($answer->remarks !== null)
                                                         হ্যাঁ
                                                    @else
                                                        না
                                                    @endif
                                                @endif
                                            </th>
                                            <th class="text-center">

                                                @if ($answer)
                                                    @if ($answer->remarks === null)
                                                        <button type="button"
                                                                data-answer="{{$answer}}"
                                                                data-question="{{$question->load('CQs', 'MCQs')}}"
                                                                class="btn btn-warning show-answer">
                                                             নিরীক্ষণ করুন
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                                data-answer="{{$answer}}"
                                                                data-question="{{$question->load('CQs', 'MCQs')}}"
                                                                class="btn btn-success show-answer">
                                                            পুনঃরায় নিরীক্ষণ করুন
                                                        </button>
                                                    @endif

                                                @else
                                                     উত্তর দেয়নি
                                                @endif
                                            </th>
                                            <th>
                                                <input type="number"
                                                       max="{{$question->remark}}"
                                                       min="0"
                                                       class="form-control"
                                                       placeholder="Mark out of {{$question->remark}}"
                                                       disabled
                                                       @if ($answer) value="{{$answer->remarks}}" @endif
                                                />
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.online-exam.exam.participants.answer')

    </div>
@endsection

@push('script')

    <script>


        $(document).ready(function () {
            $('.show-answer').click(function () {
                $_loading = true
                $('.answer-block').html('')
                const answer = $(this).data('answer')
                $.ajax({
                    url: `/assessments-answers/${answer.id}`,
                    type:'GET',
                    dataType:'HTML',
                }).done(function (data) {
                    $_loading = false
                    $('.answer-block').html(data)
                    $('#AnswerModal').modal('show')
                });


            })
        })


    </script>

@endpush
