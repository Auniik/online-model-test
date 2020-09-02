@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    @include('admin._partials.success-alert')
                    <form id="refForm" action="{{route('subjects.store')}}" method="POST" >
                        @csrf
                        <h4 class="mt-0"> বিষয় <span id="header-title"> যুক্ত করুন</span></h4>
                        <input type="hidden" id="id" class="form-control" name="id">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> নাম *</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" autocomplete="off" value=""
                                       placeholder="Subject name"
                                       name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> বিষয় কোড</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" autocomplete="off" placeholder="Subject code"
                                       name="code" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> শ্রেণী *</label>
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
                                <button type="submit" class="btn btn-primary waves-effect waves-light"> সেভ করুন
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5"
                                        onclick="location.reload()"> বাদ দিন</button>
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
                <div class="card-header">
                    <h4 class="mt-0"> সকল বিষয়সমূহ</h4>
                </div>
                <div class="card-body">
                    <table   class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> নাম</th>
                            <th> কোড</th>
                            <th> শ্রেণী</th>
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
                                    @if (!$subject->exams_count)
                                        <a class="deletable" href="{{route('subjects.destroy', $subject->id)}}" >
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    @endif
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
