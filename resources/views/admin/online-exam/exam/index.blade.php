@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('exams.create')}}" class="btn btn-primary float-right">Add new Exam</a>
                    <h4 class="header-title">Manage Exams</h4>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{session('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-sm table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Class</th>
                            <th>Date</th>
                            <th>Duration</th>
                            <th>Shown</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($exams as $key => $exam)
                            <tr>
                                <td width="1">{{++$key}}</td>
                                <td>
                                    <a href="{{route('exams.show', $exam)}}">{{$exam->name}}</a>
                                </td>
                                <td>{{$exam->subject->name}}</td>
                                <td> {{$exam->class}} </td>
                                <td>{{$exam->start_at->format('d/m/Y h:m:s')}}</td>
                                <td>{{$exam->duration}}</td>
                                <td>{{$exam->in_homepage ? 'Yes' : 'No'}}</td>

                                <td width="1" align="center">
                                    {{get_status($exam->status)}}
                                </td>
                                <td width="1" align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-secondary btn-xs dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu">
                                            <a title="Set Participants"
                                               class="dropdown-item"
                                               href="{{route('exams.edit',  $exam->id)}}">
                                                <i class="fa fa-user-plus" aria-hidden="true"></i> Set Participants
                                            </a>
                                            <a title="Set Participants"
                                               class="dropdown-item"
                                               href="{{route('exams.edit',  $exam->id)}}">
                                                <i class="fa fa-quora" aria-hidden="true"></i> Set Questions
                                            </a>
                                            <a title="Edit"
                                               class="dropdown-item"
                                               href="{{route('exams.edit',  $exam->id)}}">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                            </a>
                                            <a class="dropdown-item deletable"
                                               title="Delete"
                                               href="{{route('exams.destroy',  $exam->id)}}">
                                                <i class="fa fa fa-trash" aria-hidden="true"></i> Delete
                                            </a>
                                        </div>
                                    </div>
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

@push('script')
    <script>


    </script>
@endpush
