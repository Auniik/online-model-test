@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{session('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form id="refForm" action="{{route('subjects.store')}}" method="POST" >
                        @csrf
                        <h4 class="mt-0 header-title"><span id="header-title">Add New</span> Subject</h4>
                        <input type="hidden" id="id" class="form-control" name="id">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Subject Name *</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="" placeholder="Subject name" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Subject Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Subject code" name="code" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Class *</label>
                            <div class="col-sm-10">

                                <select class="form-control" name="class" id="">
                                    @foreach(config('exam.classes') as $key => $name)
                                        <option value="{{$key}}">{{trans('default')[$name]}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 offset-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5"
                                        onclick="location.reload()">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Manage Subjects</h4>
                    <p class="text-muted mb-4 font-14"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Subject name</th>
                            <th>Subject Code</th>
                            <th>Class</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subjects as $key => $subject)
                            <tr>
                                <td width="1">{{++$key}}</td>
                                <td>{{$subject->name}}</td>
                                <td>{{$subject->code}}</td>

                                <td>{{trans('default')[config('exam.classes')[$subject->class]]}}</td>
                                <td width="10" align="center">
                                    {{get_status($subject->status)}}
                                </td>
                                <td width="1" align="center">
                                    <a class="editable" data-item="{{$subject}}"
                                       href="{{route('subjects.show',  $subject->id)}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    <a class="deletable" href="{{route('subjects.destroy', $subject->id)}}" >
                                        <i class="fa fa-trash" aria-hidden="true"></i>
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

@push('script')
    <script>


    </script>
@endpush
