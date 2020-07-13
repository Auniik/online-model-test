@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <button type="button" id="add-new" class="btn float-right btn-primary">Add new</button>
                    <h4 class="header-title col-2"><span id="header-title">Participants</span></h4>
                </div>
                <div class="card-body">
                    <div class="question-block">
                        <div class="table-responsive-sm">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>School</th>
                                    <th>District</th>
                                    <th>Division</th>
                                    <th>Score</th>
                                    <th width="1">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($participants as $participant)
                                    <tr>
                                        <td>{{$participant->name}}</td>
                                        <td>{{$participant->username}}</td>
                                        <td>{{$participant->email}}</td>
                                        <td>{{$participant->mobile_number}}</td>
                                        <td>{{$participant->school_name}}</td>
                                        <td>{{$participant->district}}</td>
                                        <td>{{$participant->division}}</td>
                                        <td>
                                            {{$participant->score}}
                                        </td>
                                        <td>
                                            <a class="deletable"
                                               title="Delete"
                                               href="{{route('participants.destroy',  $participant->id)}}">
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
            </div>
        </div>

        @include('admin.online-exam.participants.create')


    </div>
@endsection

@push('script')
    <script>


        $(document).ready(function () {
            $('#add-new').click(function () {
                $('#ParticipantModal').modal('show')
            })
        })


    </script>

@endpush
