@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mt-0">  ভিডিওচিত্রসমূহ </h4>
                    <a class="btn btn-primary" href="{{route('videos.create')}}"> নতুন ভিডিও যোগ করুন</a>
                </div>
                <div class="card-body">
                    <table  class="table table-striped table-sm table-bordered w-100">
                        <thead>
                        <tr>
                            <th width="1%">#</th>
                            <th>  কভার ছবি</th>
                            <th>নাম</th>
                            <th> link </th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($videos as $video)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <img src="{{$video->thumbnail}}" height="150px" alt="{{$video->title}}">
                                </td>
                                <td>{{$video->name}}</td>
                                <td><a target="_blank" href="{{$video->url}}">{{$video->url}}</a></td>
                                <td>
                                    <a href="{{route('videos.edit', $video)}}" class=""><i class="fa fa-edit"></i></a>
                                    <a href="{{route('videos.destroy', $video)}}" class="deletable"><i class="fa
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
