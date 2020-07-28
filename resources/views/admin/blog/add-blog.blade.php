@extends('admin.master')
@section('body')
    <div class="row m-t-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0">Manage Blog</h4>
                </div>
                <div class="card-body">

                    <p class="text-muted mb-4 font-14"></p>
                    <table class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$blog->title}}</td>
                                <td>{{$blog->short_description}}</td>
                                <td><img src="{{asset($blog->image)}}" width="50" height="30"></td>
                                <td>
                                    <a href="{{route('edit-blog',['id'=>$blog->id])}}" class=""><i class="fa fa-edit"></i></a>
                                    <a href="{{route('delete-blog',['id'=>$blog->id])}}" class="" onclick="alert('Are You Delete This')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="pull-right">
                        {{$blogs->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
