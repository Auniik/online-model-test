@extends('admin.master')
@section('body')
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Submitted Work</h4>
                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
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
                                <td>{{$row->link}}</td>
                                <td>
                                    <a href="/{{$row->file}}" target="_blank">View File</a>
                                    <a href="{{route('delete-work',['id'=>$row->id])}}"  onclick="alert('Are You Delete This ')">Delete</a>
                                </td>
                                <td>{{$row->user_name}}</td>
                                <td>{{$row->mobile_no}}</td>
                                <td>{{$row->updated_at}}</td>
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