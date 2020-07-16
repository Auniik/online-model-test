@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title"><span id="header-title">Examine {{$assessment->participant->name}} of
                            {{$assessment->quiz->name}}</span></h4>
                    <p class="mb-0">Question Total: {{$assessment->quiz->questions->count()}},
                        Correct Count: {{$assessment->correctCount()}},
                        Wrong Count: {{$assessment->wrongCount()}}</p>
                </div>
                <div class="card-body">
                    @include('admin._partials.success-alert')
                    <div class="question-block">
                        <div class="table-responsive-sm">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>Questions</th>
                                    <th>Option 1</th>
                                    <th>Option 2</th>
                                    <th>Option 3</th>
                                    <th>Option 4</th>
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
                                              $answer = $assessment->answers->firstWhere('quiz_option_id', $option->id)
                                            ?>
                                            <td class="{{$option->is_correct ? 'text-success' : 'text-danger'}}">
                                                @if ($answer)
                                                    @php
                                                        $answerRow = $answer->option->is_correct
                                                    @endphp
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
