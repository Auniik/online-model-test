@extends('admin.master')
@section('body')
    <div class="row  m-t-15">
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
                    <form class="form-horizontal">
                        <div class="row">
                            <h4 class="header-title col-6"><span id="header-title">Manage Quizzes </span></h4>
                            <select name="exam_id" class="form-control col-2 exam_id">
                                <option value="">Select One</option>
                                @foreach($selectableQuizzes as $id => $name)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                            <select name="subject_id" class="form-control col-2 subject_id">
                                <option value="">Select One</option>
{{--                                @foreach($subjects as $id => $name)--}}
{{--                                    <option value="{{$id}}">{{$name}}</option>--}}
{{--                                @endforeach--}}
                            </select>
                            <button type="submit" class="btn btn-secondary" style="height: 35px; "><i
                                    class="fa fa-search-plus"></i></button>
                            <a class="btn btn-secondary" href="{{route('exams.index')}}" style="height: 35px; "><i
                                    class="fa fa-refresh"></i></a>
                            <a href="{{route('quizzes.create')}}" style="height: 35px; " class="btn btn-primary
                            col-1">Add new</a>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-sm table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Duration</th>
                            <th>Participants</th>
                            <th>Questions</th>
                            <th>Default</th>
                            <th>Published</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quizzes as $key => $quiz)
                            <tr>
                                <td width="1">{{++$key}}</td>
                                <td>
                                    <span class="view-exam text-info" data-quiz="{{$quiz}}">{{$quiz->name}}</span>
                                </td>
                                <td>{{$quiz->date->format('d/m/Y h:m:s')}}</td>
                                <td>{{$quiz->duration}}</td>
                                <td align="center">
                                    <a class="btn btn-info" href="{{route('quiz-participants.create',  $quiz->id)}}">
                                        {{$quiz->assigned_participants_count}}
                                    </a>
                                </td>
                                <td align="center">
                                    <a class="btn btn-info" href="{{route('quiz-questions.index',  $quiz->id)}}">
                                        {{$quiz->questions_count}}
                                    </a>
                                </td>
                                <td>{{$quiz->is_default ? 'Yes' : 'No'}}</td>
                                <td>{{$quiz->is_published ? 'Yes' : 'No'}}</td>
                                <td width="1" align="center">
                                    <div class="btn-group">
                                        <button class="btn btn-secondary btn-xs dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu">
                                            <a title="Set Participants"
                                               class="dropdown-item"
                                               href="{{route('quiz-participants.create',  $quiz->id)}}">
                                                <i class="fa fa-user-plus" aria-hidden="true"></i> Set Participants
                                            </a>
                                            <a title="Set Questions"
                                               class="dropdown-item"
                                               href="{{route('quiz-questions.index',  $quiz->id)}}">
                                                <i class="fa fa-quora" aria-hidden="true"></i> Set Questions
                                            </a>
                                            <a title="Edit"
                                               class="dropdown-item"
                                               href="{{route('quizzes.edit',  $quiz->id)}}">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                            </a>
                                            <a class="dropdown-item deletable"
                                               title="Delete"
                                               href="{{route('quizzes.destroy',  $quiz->id)}}">
                                                <i class="fa fa fa-trash" aria-hidden="true"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="exam-block"> </div>
                </div>
            </div>
        </div>

        <!-- end col -->
    </div>
@endsection

@push('script')
    <script>

        // $(document).ready(function () {
        //     $('.exam-block').html('')
        //     $('.view-exam').click(function () {
        //         const exam = $(this).data('exam');
        //         $.ajax({
        //             url: `/exams/${exam.id}`,
        //             type:'GET',
        //             dataType:'HTML',
        //         }).done(function (data) {
        //             $('.exam-block').html(data)
        //             $('#ExamModal').modal('show')
        //         });
        //     })
        // })

    </script>
@endpush
