@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <form id="refForm" action="{{route('exams.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary float-right" href="{{route('exams.index')}}">All Exams</a>
                        <h4 class="header-title"><span id="header-title">Add New</span> Exam</h4>
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{session('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <input type="hidden" id="id" class="form-control" name="id">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Exam Name *</label>
                            <div class="col-sm-10">
                                <input
                                    class="form-control"
                                    type="text"
                                    value="{{old('name')}}"
                                    placeholder="Exam name"
                                    name="name"
                                    autocomplete="off"
                                >
{{--                                @if($errors->has('name'))<div class="invalid-feedback">{{$errors->name}}</div>--}}
{{--                                @endif--}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Class *</label>
                            <div class="col-sm-4">
                                <select class="form-control class" name="class_id">
                                    <option value="">Select One</option>
                                    @foreach(config('exam.classes') as $key => $name)
                                        <option value="{{$key}}">{{trans('default')[$name]}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Subject</label>
                            <div class="col-sm-4">
                                <select class="form-control subject" name="subject_id" id="">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Start at</label>
                            <div class="col-sm-4">
                                <input type="text" id="dateTimeMy" value="{{old('start_at')}}" name="start_at"
                                       class="form-control">
                            </div>
                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Duration</label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="02:30:00" value="{{old('duration')}}" name="duration"
                                       class="form-control">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Cover Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" placeholder="Image" name="image"
                                       accept="image/*">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description"  id="editor" class="form-control">{{old('description')
                                }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-4">
                                <input type="checkbox" id="in_homepage" value="1" name="in_homepage">
                                <label for="in_homepage">Show in homepage</label>
                            </div>
                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Status</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 offset-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5"
                                        onclick="location.reload()">Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const subjects = JSON.parse("{{$subjects}}".replace(/&quot;/g, '"'));
        $('.class').change(function (e) {
            const classId = $(this).val();

            $('.subject').empty().html(
                subjects.filter(e => e.class === "0" || e.class === classId)
                    .map(e => `<option value="${e.id}">${e.name}</option>`)
            )
            @if($value = old('subject_id'))
                $('.subject').val("{{$value}}")
            @endif
        })

        @if($value = old('class'))
            $('.class').val("{{$value}}").change()
        @endif

    </script>

@endpush
