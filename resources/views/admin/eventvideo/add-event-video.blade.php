@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('new-event-video')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4 class="mt-0 header-title">Add Event Video</h4>
                        <h3>{{Session::get('message')}}</h3>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-file" placeholder="Image" name="image" accept="image/*" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="short_description" class="form-control" id="editor"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-sm-2 col-form-label">YouTube URL</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="link" type="url" value="" id="example-url-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" checked value="1" />
                                        <span>Publish</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio"   value="0"/>
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
                <div class="card-body">
                    <h4 class="mt-0 header-title">Manage Event</h4>
                    <p class="text-muted mb-4 font-14"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Short Description</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($eventvideos as $eventvideo)
                            <tr>
                                <td>{{$i++}}</td>
                                <td><img src="{{asset($eventvideo->image)}}" width="50" height="30"></td>
                                <td>{{$eventvideo->title}}</td>
                                <td>{!! $eventvideo->short_description !!}</td>
                                <td>{{$eventvideo->link}}</td>
                                <td>{{$eventvideo->status}}</td>
                                <td>
                                    <a href="{{route('edit-event-video',['id'=>$eventvideo->id])}}"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('delete-slider',['id'=>$eventvideo->id])}}" onclick="alert('Are You Delete This')"><i class="fa fa-trash"></i></a>
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