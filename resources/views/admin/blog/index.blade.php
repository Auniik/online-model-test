@extends('admin.master')
@section('body')
    <div class="row m-t-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0"> বার্তাসমূহ </h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> শিরোনাম</th>
                            <th> বিবরণ</th>
                            <th> ছবি</th>
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
                                <td><img src="{{asset($blog->image)}}"  height="30"></td>
                                <td>
                                    <a href="{{route('blogs.edit', $blog)}}" class=""><i class="fa
                                    fa-edit"></i></a>
                                    <a href="{{route('blogs.destroy', $blog)}}" class="deletable"><i class="fa
                                    fa-trash"></i></a>
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
