@extends('admin.master')
@section('body')
{{--    <div class="row m-t-15">--}}
{{--        <div class="col-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h4 class="mt-0"> আমাদের কথা</h4>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <form action="{{route('new-event-message')}}" method="POST" enctype="multipart/form-data">--}}
{{--                        @csrf--}}

{{--                        <h3>{{Session::get('message')}}</h3>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <input class="form-control" type="text" value="" name="name" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="example-text-input" class="col-sm-2 col-form-label">Designation</label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <input class="form-control" type="text" value="" name="designation" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="example-text-input" class="col-sm-2 col-form-label">Image 600*600</label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <input type="file" class="form-file" placeholder="Image" name="image" accept="image/*" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="example-text-input" class="col-sm-2 col-form-label">Message</label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <textarea name="message" class="form-control" id="editor" required></textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <div class="form-check form-check-radio">--}}
{{--                                    <label>--}}
{{--                                        <input name="status" type="radio" checked value="1" />--}}
{{--                                        <span>Publish</span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="form-check form-check-radio">--}}
{{--                                    <label>--}}
{{--                                        <input name="status" type="radio"   value="0"/>--}}
{{--                                        <span>Unpublish</span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>--}}
{{--                            <div class="col-sm-10 offset-10">--}}
{{--                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>--}}
{{--                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">Cancel</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- end col -->--}}
{{--    </div>--}}
    <div class="row m-t-15">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0">Manage Event</h4>
                </div>
                <div class="card-body">

                    <p class="text-muted mb-4 font-14"></p>
                    <table   class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Image</th>
                            <th>Is Team Member</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($eventmessages as $message)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$message->name}}</td>
                                <td>{{$message->designation}}</td>
                                <td><img src="{{asset($message->image)}}" width="50" height="30"></td>
                                <td>
                                    {{$message->is_team_member ? 'Yes' : 'No'}}
                                </td>
                                <td>
                                    <a href="{{route('edit-event-message',['id'=>$message->id])}}" class=""><i class="fa fa-edit"></i></a>
                                    <a href="{{route('delete-event-message',['id'=>$message->id])}}" class="" onclick="alert('Are You Delete This ')"><i class="fa fa-trash"></i></a>
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
