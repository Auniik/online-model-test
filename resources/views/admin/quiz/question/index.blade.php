@extends('admin.master')
@push('style')
    <style>
        .modal {
            padding: 0 !important; // override inline padding-right added from js
        }
        .modal .modal-dialog {
            width: 100%;
            max-width: none;
            height: 100%;
            margin: 0;
        }
        .modal .modal-content {
            height: auto;
            border: 0;
            border-radius: 0;
        }
        .modal .modal-body {
            overflow-y: auto;
        }
    </style>
@endpush
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <form id="refForm" action="{{route('quiz-questions.store', $quiz)}}" method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-header">
                        <div class=" row">
                            <h4 class="col-11"><span id="header-title">{{$quiz->name}}- এর প্রশ্নসমূহ সেট করুন
                                    </span><br>
                                <small>Total Questions: {{$quiz->questions->count()}}</small>
                            </h4>
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
                                        <th width="1%">#</th>
                                        <th>Title</th>
                                        <th>Option 1</th>
                                        <th>Option 2</th>
                                        <th>Option 3</th>
                                        <th>Option 4</th>
                                        <th width="8%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($quiz->questions as $k => $question)
                                        <tr>
                                            <td>{{++$k}}</td>
                                            <td>{{$question->title}}</td>
                                            @foreach($question->options as $option)
                                                <td class="{{$option->is_correct ? 'text-success' : 'text-danger'}}">
                                                    {{$option->value}}
                                                </td>
                                            @endforeach
                                            <td>
                                                <a class="deletable"
                                                   title="Delete"
                                                   href="{{route('quiz-questions.destroy',  $question->id)}}">
                                                    <i class="fa fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
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
                    <div class="questions-block">
                        <form action="{{route('quiz-questions.store', $quiz)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> কুইজের জন্য প্রশ্নসমূহ যুক্ত করুন</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="written-">
                                    <table class="table  table-bordered  table-hover">
                                        <thead>
                                            <tr>
                                                <th>  প্রশ্ন এবং ছবি</th>
                                                <th width="15%"> অপশন ১ </th>
                                                <th width="15%">অপশন ২</th>
                                                <th width="15%">অপশন ৩</th>
                                                <th width="15%">অপশন  ৪</th>
                                                <th width="1%">#</th>
                                            </tr>
                                        </thead>
                                        <tbody class="question-group">

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection

@push('script')
    <script>

        @if(!$quiz->questions->count())
            alert('প্রশ্ন তৈরী করুন, অন্যথায় কুইজটি পাবলিশ হবেনা')
        @endif


        var count = 1;
        $(document).ready(function () {
            $('#add-new').click(function () {
                $('#QuestionModal').modal('show')
                count = 1;
                addMCQQuestions(count)
            })
        })
        $(document).on('click', '.add-row', () => {
            count++
            addMCQQuestions(count)

        })

        $(document).on('click', '.delete-row', (e) => {
            count--
            $(e.target).parents('.question-row').remove();
        })

        $(document).on('hidden.bs.modal', '#QuestionModal', function (e) {
            $('.question-group').html(' ')
        })


        function addMCQQuestions(count) {
            $('.question-group').append(`
                <tr class="question-row">
                    <th>
                        <textarea name="title[${count}]" style="height: 36px; margin-bottom: 8px" required
                            placeholder="Please enter title for the question"
                        class="form-control"></textarea>
                        <input type="file" name="meta[${count}]" class="form-control">
                    </th>
                    <th>
                        <textarea type="text" name="options[${count}][]" autocomplete="off" class="form-control"
                        required></textarea>
                        <label for="option0-${count}">
                            <input type="radio" name="is_correct[${count}]" value="0" id="option0-${count}" required> is correct
                        </label>
                    </th>
                    <th>
                        <textarea type="text" name="options[${count}][]" autocomplete="off" class="form-control"
                        required></textarea>
                        <label for="option1-${count}">
                            <input type="radio" name="is_correct[${count}]"  value="1" id="option1-${count}" required> is
                            correct
                        </label>
                    </th>
                    <th>
                        <textarea type="text" name="options[${count}][]" autocomplete="off" class="form-control"
                        required></textarea>
                        <label for="option2-${count}">
                            <input type="radio" name="is_correct[${count}]"  value="2" id="option2-${count}" required> is
                            correct
                        </label>
                    </th>
                    <th>
                        <textarea type="text" name="options[${count}][]" autocomplete="off" class="form-control"
                        required></textarea>
                        <label for="option3-${count}">
                            <input type="radio" name="is_correct[${count}]"  value="3" id="option3-${count}" required>
                             is
                            correct
                        </label>
                    </th>
                    <th>
                        <a href="#" class="add-row"> <i class="fa fa-plus text-success" aria-hidden="true"></i></a>
                        <a href="#" class="delete-row"><i class="fa fa-trash text-danger" aria-hidden="true"></i> </a>
                    </th>
                </tr>
            `)
        }

    </script>

@endpush
