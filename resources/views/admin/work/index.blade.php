@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Submitted Works</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Work Type</th>
                            <th>Url Link</th>
                            <th>File</th>
                            <th>User</th>
                            <th>Contact</th>
                            <th>Submitted At</th>
                        </tr>
                        </thead>
                        <tbody id="eventSearchRes">
                        @foreach($works as $key => $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->title}}</td>
                                <td>{{$row->work_type}}</td>
                                <td><a href="{{$row->link}}" target="_blank">{{$row->link}}</a></td>
                                <td>
                                    <a href="/{{$row->file}}" target="_blank">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="{{route('delete-work',['id'=>$row->id])}}"  onclick="alert('Are You Delete This ')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td>{{$row->user_name}}</td>
                                <td>{{$row->mobile_no}}</td>
                                <td>{{$row->updated_at->format('M d, Y h:i A')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{$works->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
