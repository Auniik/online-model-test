@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <form id="refForm" action="{{route('exams.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary float-right" href="{{route('exams.index')}}">{{__('default.all_exams')}}</a>
                        <h4></h4><span id="header-title">{{__('default.add_new_exam')}}</h4>
                    </div>
                    <div class="card-body">
                        @include('front.partials.notifications')
                        <input type="hidden" id="id" class="form-control" name="id">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('default.exam_name')}}
                                *</label>
                            <div class="col-sm-10">
                                <input
                                    class="form-control"
                                    type="text"
                                    value="{{old('name')}}"
                                    placeholder="{{__('default.exam_name')}}"
                                    name="name"
                                    autocomplete="off"
                                >
{{--                                @if($errors->has('name'))<div class="invalid-feedback">{{$errors->name}}</div>--}}
{{--                                @endif--}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('default.class')}}
                                *</label>
                            <div class="col-sm-4">
                                <select class="form-control class" name="class_id">
                                    <option value="">{{__('default.choose_one')}}</option>
                                    @foreach(config('exam.classes') as $key => $name)
                                        <option value="{{$key}}">{{__('default')[$name]}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">
                                {{__('default.subject')}}</label>
                            <div class="col-sm-4">
                                <select class="form-control subject" name="subject_id" id="">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> শুরুর তারিখ</label>
                            <div class="col-sm-4">
                                <input type="text" name="start_at" autocomplete="off" value="{{old('start_at')}}"
                                       class="form-control datepicker">
                            </div>
                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">  শেষের
                                তারিখ</label>
                            <div class="col-sm-4">
                                <input type="text" autocomplete="off" value="{{old('end_at')}}" name="end_at"
                                       class="form-control datepicker">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">
                                {{__('default.duration')}}</label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="02:30:00" value="{{old('duration')}}" name="duration"
                                       class="form-control" pattern="(?:[01]\d|2[0-3]):(?:[0-5]\d):(?:[0-5]\d)">
                            </div>
                            <label for="example-text-input" class="col-sm-2 col-form-label text-right"> পাশ
                                মার্ক</label>
                            <div class="col-sm-4">
                                <input type="number" min="0" class="form-control integer" placeholder="Pass mark"
                                       name="competency_score">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('default.cover_image')
                            }}</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" placeholder="Image" name="image"
                                       accept="image/*">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('default.description')
                            }}</label>
                            <div class="col-sm-10">
                                <textarea name="description"  id="editor" class="form-control">{{old('description')
                                }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-4">
                                <input type="checkbox" id="in_homepage" value="1" name="in_homepage">
                                <label for="in_homepage">{{__('default.show_in_homepage')}}</label>
                            </div>
{{--                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Published ?--}}
{{--                            </label>--}}
                            <div class="col-sm-4">
                                <input type="checkbox" id="is_published" value="1" name="is_published">
                                <label for="is_published">{{__('default.is_published')}}</label>
                            </div>
                            <div class="col-sm-4 d-none">
                                <select class="form-control" name="status">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 offset-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"> সেভ করুন
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5"
                                        onclick="location.reload()"> বাদ দিন
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
