@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0">Add Eevnt Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('new-event')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h3>{{Session::get('message')}}</h3>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Event Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="date" id="dateTimeMy"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">No of Questions</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_of_questions"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Quiz Time</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="quiz_time" placeholder="5:00"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-file" placeholder="Image" name="image" accept="image/*"
                                       required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" id="editor"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" checked value="1"/>
                                        <span>Publish</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" value="0"/>
                                        <span>Unpublish</span>
                                    </label>
                                </div>
                            </div>
                        </div>
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0">Manage Event</h4>
                </div>
                <div class="card-body">

                    <p class="text-muted mb-4 font-14"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th># Questions</th>
                            <th>Quiz Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $key => $event)
                            <tr>
                                <td>{{$key++}}</td>
                                <td>{{$event->title}}</td>
                                <td>{{$event->date}}</td>
                                <td><img src="{{asset($event->image)}}" width="50" height="30"></td>
                                <td>{!! $event->description !!}</td>
                                <td>{{$event->no_of_questions}}</td>
                                <td>{{$event->quiz_time}}</td>
                                <td>{{ $event->status==1?'Active':'Inactive' }}</td>
                                <td><a href="{{route('edit.event',$event->id)}}">Edit</a>
                                    <a href="{{route('delete-event',['id'=>$event->id])}}">Delete</a>
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
