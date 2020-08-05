@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card" id="print-this">
                <div class="card-header d-flex flex-column align-items-center">
                    <h4>
                        <span id="header-title">
                            <a class="text-info" href="{{route('participants.show', $assessment->participant_id)}}">
                                {{$assessment->participant->name}} </a> -এর {{$assessment->exam->name}} পরীক্ষার
                            ফলাফল
                        </span>
                    </h4>
                    <p class="mb-0">
                        বিষয়: {{$assessment->exam->subject->name}},  শ্রেণী: {{$assessment->exam->class}},
                        মোট সংগ্রীহিত মার্ক: <strong>{{$assessment->totalRemarks()}}</strong>,
                        মোট মার্ক: <strong>{{$assessment->exam->totalRemarks()}}</strong>,
                            পাশ মার্ক: <strong>{{$assessment->exam->competency_score}}</strong>,
                        ফলাফল: {!! $assessment->totalRemarks()  >= $assessment->exam->competency_score
                                ? '<strong class="text-success">উত্তীর্ণ</strong>'
                                :'<strong class="text-danger">অনুর্ত্তীর্ণ</strong>' !!}
                    </p>
                    <button type="button" class="btn btn-secondary no-print mt-2"  onclick="printDiv
                    ('print-this')"
                            style="height: 35px; "><i
                            class="fa fa-print"></i> Print</button>
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
                                    <th class="text-center no-print">নিরীক্ষণ করা হয়েছে?</th>
                                    <th class="text-center no-print">উত্তর</th>
                                    <th width="13%">Remarks</th>
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
                                            <th class="text-center no-print">
                                                @if($answer)
                                                    @if ($answer->remarks !== null)
                                                         হ্যাঁ
                                                    @else
                                                        না
                                                    @endif
                                                @endif
                                            </th>
                                            <th class="text-center no-print">

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
                                                     --
                                                @endif
                                            </th>
                                            <th>
                                                @if ($answer)
                                                <input type="number"
                                                       max="{{$question->remark}}"
                                                       min="0"
                                                       class="form-control"
                                                       placeholder="Mark out of {{$question->remark}}"
                                                       disabled
                                                       value="{{$answer->remarks}}"
                                                       @if ($answer->remarks)
                                                       style="font-size: x-large; border: none"
                                                       @endif
                                                />
                                                @else
                                                    উত্তর দেয়নি
                                                @endif
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
