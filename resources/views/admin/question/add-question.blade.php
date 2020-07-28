@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0">Add Question</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('new-question')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h3>{{Session::get('message')}}</h3>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Event Name</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="event_id">
                                    @foreach($events as $event)
                                        <option value="{{$event->id}}">{{$event->title}}</option>
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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="questionRes">
                            <tr>
                                <td>1</td>
                                <td><textarea name="question[0][title]" class="form-control"></textarea></td>
                                <td><input name="question[0][write_answer]" type="text" class="form-control"/></td>
                                <td><input name="question[0][wrong_answer_one]" type="text" class="form-control"/></td>
                                <td><input name="question[0][wrong_answer_two]" type="text" class="form-control"/></td>
                                <td><input name="question[0][wrong_answer_three]" type="text" class="form-control"/>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success add-question-btn">+</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 offset-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0">Manage About</h4>
                </div>
                <div class="card-body">

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Select Event Name</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="event_id" onchange="getEventByQuestionId(this.value)">
                                @foreach($events as $event)
                                    <option value="{{$event->id}}">{{$event->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            {{--<th>Event Name</th>--}}
                            <th>Question</th>
                            <th>Write Ans</th>
                            <th>Wrong Ans One</th>
                            <th>Wrong Ans Two</th>
                            <th>Wrong Ans Three</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="eventSearchRes">
                        @php($i = 1)
                        @foreach($questions as $question)
                            <?php
                            $event = \App\Event::find($question->event_id);
                            ?>
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$question->title}}</td>
                                <td>{{$question->write_answer}}</td>
                                <td>{{$question->wrong_answer_one}}</td>
                                <td>{{$question->wrong_answer_two}}</td>
                                <td>{{$question->wrong_answer_three}}</td>
                                <td><a href="{{route('question.edit',$question->id)}}">Edit</a>
                                    <a href="{{route('delete-question',['id'=>$question->id])}}">Delete</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
