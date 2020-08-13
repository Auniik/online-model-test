@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mt-0"> স্লাইডার ম্যানেজ করুন</h4>
                    <a href="{{route('sliders.create')}}" style="height: 35px; " class="btn
                    btn-primary col-2"> স্লাইডার ছবি তৈরী করুন</a>
                </div>
                <div class="card-body">

                    <table  class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Link 1</th>
                            <th>Link 2</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{$i++}}</td>
                                <td><img src="{{asset($slider->image)}}" height="200px"></td>
                                <td>{{$slider->title}}</td>
                                <td>
                                    <a href="{{$slider->link_1}}">{{$slider->link_1_text}}</a>
                                </td>
                                <td>
                                    <a href="{{$slider->link_2}}">{{$slider->link_2_text}}</a>
                                </td>
                                <td>{{get_status($slider->status)}}</td>
                                <td>
                                    <a href="{{route('sliders.edit', $slider)}}"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('sliders.destroy', $slider)}}"
                                       class="deletable"><i class="fa fa-trash"></i></a>
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
