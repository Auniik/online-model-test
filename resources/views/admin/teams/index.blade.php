@extends('admin.master')
@section('body')
<div class="row m-t-15">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="mt-0"> টীম ম্যানেজ করুন</h4>
                <a href="{{route('team-members.create')}}" style="height: 35px; " class="btn
                    btn-primary col-1">Add new</a>
            </div>
            <div class="card-body">
                <table   class="table table-striped table-bordered w-100">
                    <thead>
                    <tr>
                        <th width="1%">#</th>
                        <th>নাম</th>
                        <th>Designation</th>
                        <th>ছবি</th>
                        <th>Is Highlighted</th>
                        <th width="5%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach($team_members as $member)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$member->name}}</td>
                            <td>{{$member->designation}}</td>
                            <td><img src="{{asset($member->image)}}" height="70"></td>
                            <td>
                                @if ($member->is_highlighted)
                                    <a class="btn btn-success btn-circle" href="#">
                                        Yes
                                    </a>
                                @else
                                    <a class="btn btn-secondary btn-circle" href="{{route('team-members.highlight', $member)}}">
                                        No
                                    </a>
                                @endif
                            </td>
                            <td>
                                <a title="Edit"
                                   href="{{route('team-members.edit',  $member->id)}}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a class="deletable"
                                   title="Delete"
                                   href="{{route('team-members.destroy',  $member->id)}}">
                                    <i class="fa fa fa-trash" aria-hidden="true"></i>
                                </a>
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
