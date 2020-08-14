@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mt-0"> সকল গ্যালারী সমূহ</h4>
                    <a class="btn btn-primary" href="{{route('galleries.create')}}"> নতুন গ্যালারী যোগ করুন</a>
                </div>
                <div class="card-body">
                    <table  class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($galleries as $gallery)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$gallery->title}}</td>
                                <td><img src="{{asset($gallery->image)}}" width="50" height="30"></td>
                                <td>
                                    <a href="{{route('galleries.edit', $gallery)}}" class=""><i class="fa
                                    fa-edit"></i></a>
                                    <a href="{{route('galleries.destroy', $gallery)}}" class=""><i class="fa
                                    fa-trash"></i></a>
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
