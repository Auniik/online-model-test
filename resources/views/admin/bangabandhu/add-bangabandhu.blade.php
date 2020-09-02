@extends('admin.master')
@section('body')
    {{--<div class="row m-t-15">--}}
        {{--<div class="col-12">--}}
            {{--<div class="card">--}}
                {{--<div class="card-body">--}}
                    {{--<form action="{{route('new-bangabandhu')}}" method="POST" enctype="multipart/form-data">--}}
                        {{--@csrf--}}
                        {{--<h4 class="mt-0 header-title">Add Bangabandhu Text</h4>--}}
                        {{--<h3>{{Session::get('message')}}</h3>--}}
                        {{--<div class="form-group row">--}}
                            {{--<label for="example-text-input" class="col-sm-2 col-form-label">Title</label>--}}
                            {{--<div class="col-sm-10">--}}
                                {{--<input class="form-control" type="text" value="" name="title">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group row">--}}
                            {{--<label for="example-text-input" class="col-sm-2 col-form-label"> বর্ণনা </label>--}}
                            {{--<div class="col-sm-10">--}}
                                {{--<textarea name="description" class="form-control" id="editor"></textarea>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group row">--}}
                            {{--<label for="example-text-input" class="col-sm-2 col-form-label">Image</label>--}}
                            {{--<div class="col-sm-10">--}}
                                {{--<input type="file" class="form-file" placeholder="Image" name="image" accept="image/*"--}}
                                       {{--required>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group row">--}}
                            {{--<label for="example-text-input" class="col-sm-2 col-form-label"></label>--}}
                            {{--<div class="col-sm-10 offset-10">--}}
                                {{--<button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>--}}
                                {{--<button type="reset" class="btn btn-secondary waves-effect m-l-5">Cancel</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- end col -->--}}
    {{--</div>--}}
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0">Manage Bangabandhu INFO</h4>
                </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($bangabandhus as $bangabandhu)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$bangabandhu->title}}</td>
                                <td>
                                    <a href="{{route('edit-bangabandhu',['id'=>$bangabandhu->id])}}" class=""><i class="fa fa-edit"></i></a>
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
