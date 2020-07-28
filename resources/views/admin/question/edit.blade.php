@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0">Add Question</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('question.update',$question->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h3>{{Session::get('message')}}</h3>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Event Name</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="event_id">
                                    @foreach($events as $event)
                                        <option value="{{$event->id}}"{{$question->event_id==$event->id?'selected':''}}>{{$event->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Question Title</th>
                                <th>Write Answer</th>
                                <th>Wrong Answer One</th>
                                <th>Wrong Answer Two</th>
                                <th>Wrong Answer Three</th>
                            </tr>
                            </thead>
                            <tbody id="questionRes">
                            <tr>
                                <td>1</td>
                                <td><textarea name="title" class="form-control">{{$question->title}}</textarea></td>
                                <td><input name="write_answer" type="text" class="form-control" value="{{$question->write_answer}}"/></td>
                                <td><input name="wrong_answer_one" type="text" class="form-control" value="{{$question->wrong_answer_one}}"/></td>
                                <td><input name="wrong_answer_two" type="text" class="form-control" value="{{$question->wrong_answer_two}}"/></td>
                                <td><input name="wrong_answer_three" type="text" class="form-control" value="{{$question->wrong_answer_three}}"/>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 offset-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
