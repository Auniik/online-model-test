@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <form id="refForm" action="{{route('exam-questions.store', $exam)}}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class=" row">
                            <h4 class="header-title col-7"><span id="header-title">Set Questions for
                                    {{$exam->name}}</span>
                                <small>(Subject: {{$exam->subject->name}}, Class: {{$exam->class}}, Pass Mark:
                                    {{$exam->competency_score}})</small>
                            </h4>


                            <select name="type" class="form-control offset-2 col-2 type">
                                @foreach(config('exam.question_types') as $type)
                                    <option value="{{$type}}">{{__('default')[$type]}}</option>
                                @endforeach
                            </select>
                            <button type="button" id="add-new" class="btn btn-secondary col-1" style="height: 35px;">Add new</button>
                        </div>

                    </div>
                    <div class="card-body">
                        @include('admin._partials.success-alert')
                        <div class="question-block">
                            <div class="table-responsive-sm">
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th width="20">Type</th>
                                        <th>Title</th>
                                        <th  width="20">Remarks</th>
                                        <th width="8%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($exam->questions as $question)
                                        <tr>
                                            <td>{{$question->translatedType}}</td>
                                            <td>{{$question->title}}</td>
                                            <td>
                                                {{$question->remark}}
                                            </td>
                                            <td>
                                                <a title="View"
                                                   data-question="{{$question}}"
                                                   class="view-question">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a class="deletable"
                                                   title="Delete"
                                                   href="{{route('exam-questions.destroy',  $question->id)}}">
                                                    <i class="fa fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <th class="text-right">
                                            Total Mark:
                                        </th>
                                        <th>
                                            {{$exam->questions->sum('remark')}}
                                        </th>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal fade" id="QuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="questions-block"> </div>
                </div>
            </div>
        </div>



        @include('admin.online-exam.exam.questions.written', ['exam' => $exam])
        @include('admin.online-exam.exam.questions.cq-modal', ['exam' => $exam])
        @include('admin.online-exam.exam.questions.mcq-modal', ['exam' => $exam])


    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('.view-question').click(function () {
                const question = $(this).data('question');
                $.ajax({
                    url: `/exam-questions/${question.id}`,
                    type:'GET',
                    dataType:'HTML',
                }).done(function (data) {
                    $('.questions-block').html(data)
                    $('#QuestionModal').modal('show')
                });


            })
        })
    </script>
    <script>

        $(document).ready(function () {
            $('#add-new').click(function () {
                const type = $('.type').val();
                switch (type) {
                    case 'cq':
                        makeCQQuestion();
                        break;
                    case 'mcq':
                        makeMCQQuestion();
                        break;
                    case 'written':
                        makeWrittenQuestion();
                        break;
                }

            })
        })

        // $(document).on('hidden.bs.modal', '#CQQuestionModal', function (e) {
        //     location.reload()
        // })

        function makeCQQuestion() {
            $('#CQQuestionModal').modal('show')

            for (let i = 1; i<=4; i++ )
                addCQQuestionMeta(i);
        }
        function makeMCQQuestion() {
            $('#MCQQuestionModal').modal('show')
        }

        function makeWrittenQuestion() {
            $('#WrittenModal').modal('show')
        }

        function addCQQuestionMeta(questionCount) {
            const level = $t[`level_${questionCount}`]
            $('.cq-question-details').append(`
                <div class="row question-meta text-right my-3 ">
                    <div class="col-1 text-center">
                        <h4>${questionCount}</h4>
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" value="${level}"
                        readonly/>
                        <input type="hidden" class="form-control" name="CQ_LEVEL[]" value="level_${questionCount}"
                        readonly/>
                    </div>
                    <div class="col-6">
                        <textarea class="form-control" style="height:35px" required placeholder="Question Title"
                        name="name[]"></textarea>
                    </div>
                    <div class="col-2">
                        <input type="type" class="form-control" placeholder="Remarks" value="${questionCount}" required
                        name="max_remarks[]">
                    </div>
                </div>
            `)
        }

    </script>

@endpush
