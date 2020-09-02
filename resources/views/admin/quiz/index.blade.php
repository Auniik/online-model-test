@extends('admin.master')
@section('body')
    <div class="row  m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-horizontal">
                        <div class="row">
                            <h4 class="col-7"><span id="header-title"> সকল কুইজ সমূহ </span></h4>
                            <select name="quiz_id" class="form-control col-2 quiz_id">
                                <option value=""> বাছাই করুন</option>
                                @foreach($selectableQuizzes as $id => $name)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-secondary" style="height: 35px; "><i
                                    class="fa fa-search-plus"></i></button>
                            <a class="btn btn-secondary" href="{{route('quizzes.index')}}" style="height: 35px; "><i
                                    class="fa fa-refresh"></i></a>
                            <a href="{{route('quizzes.create')}}" style="height: 35px; " class="btn btn-primary
                            col-2"> নতুন কুইজ তৈরি করুন</a>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @include('admin._partials.success-alert')
                    <table class="table table-striped table-sm table-bordered w-100">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> নাম</th>
                            <th> কুইজের তারিখ</th>
                            <th> সময়সীমা</th>
                            <th> পরীক্ষার্থী</th>
                            <th> প্রশ্নসমূহ</th>
                            <th> বর্তমানে চলছে?</th>
                            <th> পাবলিশ হয়েছে?</th>
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
                                    <a class="btn btn-info btn-circle" href="{{route('quiz-participants.create',  $quiz->id)}}">
                                        {{$quiz->assigned_participants_count}}
                                    </a>
                                </td>
                                <td align="center">
                                    <a class="btn btn-info btn-circle" href="{{route('quiz-questions.index',  $quiz->id)}}">
                                        {{$quiz->questions_count}}
                                    </a>
                                </td>
                                <td>
                                    @if ($quiz->is_default)
                                        <a class="btn btn-success btn-circle" href="#">
                                             হ্যাঁ
                                        </a>
                                    @else
                                        <a class="btn btn-secondary btn-circle" href="{{route('quizzes.current',  $quiz)}}">
                                             না
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if ($quiz->is_published)
                                        <a class="btn btn-success btn-circle" href="#">
                                             হ্যা
                                        </a>
                                    @else
                                        <a class="btn btn-secondary btn-circle" href="{{route('quizzes.publish',  $quiz)}}">
                                             না
                                        </a>
                                    @endif
                                </td>
                                <td width="1" align="center">
                                    <div class="btn-group">
                                        <button class="btn btn-secondary btn-xs dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu">
                                            <a title="Set Participants"
                                               class="dropdown-item"
                                               href="{{route('quiz-participants.create',  $quiz->id)}}">
                                                <i class="fa fa-user-plus" aria-hidden="true"></i>  পরীক্ষার্থী যোগ করুন
                                            </a>
                                            <a title="Set Questions"
                                               class="dropdown-item"
                                               href="{{route('quiz-questions.index',  $quiz->id)}}">
                                                <i class="fa fa-quora" aria-hidden="true"></i>  প্রশ্নসমূহ যোগ করুন
                                            </a>
                                            <a title="Edit"
                                               class="dropdown-item"
                                               href="{{route('quizzes.edit',  $quiz->id)}}">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  হালনাগাদ করুন
                                            </a>
                                            <a class="dropdown-item deletable"
                                               title="Delete"
                                               href="{{route('quizzes.destroy',  $quiz->id)}}">
                                                <i class="fa fa fa-trash" aria-hidden="true"></i>  মুছে ফেলুন
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
