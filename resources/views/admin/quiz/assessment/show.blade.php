@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card" id="print-this">
                <div class="card-header  d-flex flex-column align-items-center">
                    <h4>
                        <span id="header-title">
                        <a class="text-info" href="{{route('participants.show', $assessment->participant_id)}}">
                            {{$assessment->participant->name}} </a> -এর {{$assessment->quiz->name}} -এর
                        ফলাফল
                        </span>
                    </h4>
                    <p class="mb-0">
                         মোট প্রশ্ন: {{$assessment->quiz->questions->count()}},
                         সঠিক উত্তর: {{$assessment->correctCount()}},
                         ভুল উত্তর: {{$assessment->wrongCount()}}
                         উত্তর দেয়নি: {{$assessment->quiz->questions->count() - ($assessment->correctCount() +
                         $assessment->wrongCount())}}
                          স্কিপ করেছে: {{$assessment->skippedCount()}}
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
                                    <th> প্রশ্ন</th>
                                    <th> অপশন  ১</th>
                                    <th> অপশন  ২</th>
                                    <th> অপশন  ৩</th>
                                    <th> অপশন  ৪</th>
                                    <th width="5%" class="text-center">Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($assessment->quiz->questions as $question)
                                    @php
                                        $answerRow = '';
                                    @endphp
                                    <tr>
                                        <td>{{$question->title}}</td>
                                        @foreach($question->options as $option)
                                            <?php

                                              $answer = $assessment->answers->firstWhere('quiz_option_id', $option->id);
                                              if ($answer) {

                                                  $answerRow = optional($answer->option)->is_correct;
                                              }
                                            ?>
                                            <td class="{{$option->is_correct ? 'text-success' : 'text-danger'}}">
                                                @if ($answer)
                                                    {!!
                                                        $answerRow
                                                        ? '<i class="fa fa-check" aria-hidden="true"></i>'
                                                        : '<i class="fa fa-times" aria-hidden="true"></i>'
                                                    !!}
                                                @endif
                                                {{$option->value}}
                                            </td>
                                        @endforeach
                                        <td class="text-center">
                                            @if ($answerRow)
                                                1
                                            @else
                                                0
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
