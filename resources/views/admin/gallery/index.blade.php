@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mt-0"> ছবির গ্যালারী</h4>
                    <a class="btn btn-primary" href="{{route('galleries.create')}}"> নতুন গ্যালারী যোগ করুন</a>
                </div>
                <div class="card-body">
                    <table  class="table table-striped table-sm table-bordered w-100">
                        <thead>
                        <tr>
                            <th width="1%">#</th>
                            <th>নাম</th>
                            <th> কভার ছবি</th>
                            <th> ছবিসমূহ</th>
                            <th>  স্লাইড</th>
                            <th width="10%">Action</th>
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
                                    <a class="btn btn-sm btn-success" href="{{route('gallery-photos.index', $gallery)
                                    }}">
                                        ছবিসমূহ ({{$gallery->photos_count}})</a>
                                </td>
                                <td>
                                    @if ($gallery->is_slider)
                                        <a class="btn btn-success btn-circle" href="#">
                                            Yes
                                        </a>
                                    @else
                                        <form action="{{route('galleries.slider', $gallery)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary btn-circle">
                                                No
                                            </button>
                                        </form>

                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('galleries.edit', $gallery)}}" class=""><i class="fa
                                    fa-edit"></i></a>
                                    <a href="{{route('galleries.destroy', $gallery)}}" class="deletable"><i class="fa
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
