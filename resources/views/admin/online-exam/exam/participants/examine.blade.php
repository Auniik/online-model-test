@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <button type="button" id="add-new" class="btn float-right btn-primary">Add new</button>
                    <h4 class="header-title"><span id="header-title">Examine {{$assessment->participant->name}} of
                            {{$assessment->exam->name}}</span></h4>
                    <p class="mb-0">Subject: {{$assessment->exam->subject->name}}, Class: {{$assessment->exam->class}},
                        Pass Mark: {{$assessment->exam->competency_score}}</p>
                </div>
                <div class="card-body">
                    <div class="question-block">
                        <div class="table-responsive-sm">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>Questions</th>
                                    <th>Answers</th>
                                    <th width="20%">Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($assessment->exam->questions as $question)
                                        <tr>
                                            <th>{{$question->title}}</th>
                                            <th>
                                                <?php
                                                    $answer = $assessment->getAnswer($question)
                                                ?>
                                                @if ($answer)
                                                    <button type="button"
                                                            data-answer="{{$answer}}"
                                                            data-question="{{$question->load('CQs', 'MCQs')}}"
                                                            class="btn btn-success show-answer">Show</button>
                                                @else
                                                    Not answered
                                                @endif
                                            </th>
                                            <th>
                                                <input type="number"
                                                       max="{{$question->remark}}"
                                                       class="form-control"
                                                       placeholder="Remarks"
                                                       @if (!$answer) disabled @endif
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
                const answer = $(this).data('answer')
                $.ajax({
                    url: `/assessments-answers/${answer.id}`,
                    type:'GET',
                    dataType:'HTML',
                }).done(function (data) {
                    $('.answer-block').html(data)
                });

                $('#AnswerModal').modal('show')
            })
        })


    </script>

@endpush
