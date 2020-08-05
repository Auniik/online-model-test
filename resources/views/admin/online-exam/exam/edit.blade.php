@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <form id="refForm" action="{{route('exams.update', $exam->id)}}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary float-right" href="{{route('exams.index')}}">All Exams</a>
                        <h4><span id="header-title">Edit</span> Exam</h4>
                    </div>
                    <div class="card-body">
                        @include('front.partials.notifications')
                        <input type="hidden" id="id" class="form-control" name="id">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Exam Name *</label>
                            <div class="col-sm-10">
                                <input
                                    class="form-control"
                                    type="text"
                                    value="{{$exam->name}}"
                                    placeholder="Exam name"
                                    name="name"
                                    autocomplete="off"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Class *</label>
                            <div class="col-sm-4">
                                <select class="form-control class" name="class">
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
                            <label for="example-text-input" class="col-sm-2 col-form-label"> শুরুর তারিখ</label>
                            <div class="col-sm-4">
                                <input type="text" name="start_at"  value="{{$exam->start_at->format('Y-m-d')}}"
                                       class="form-control datepicker"
                                >
                            </div>
                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">  শেষের
                                তারিখ</label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$exam->end_at->format('Y-m-d')}}" name="end_at"
                                       class="form-control datepicker">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Duration</label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="02:30:00" autocomplete="off"
                                       value="{{$exam->duration}}"
                                       name="duration"
                                       class="form-control">
                            </div>
                            <label for="example-text-input" class="col-sm-2 col-form-label text-right"> পাশ মার্ক</label>
                            <div class="col-sm-4">
                                <input type="number" min="0" value="{{$exam->competency_score}}" class="form-control"
                                       placeholder="Pass mark"
                                       name="competency_score">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Cover Image</label>
                            <div class="col-sm-2">
                                <img src="/{{$exam->image}}" class="img img-fluid" style="height: 70px"
                                     alt="{{$exam->name}}">
                            </div>
                            <div class="col-sm-8">
                                @if ($exam->image)
                                    <p class="text-warning">Want to replace this image ? Then Choose a new one.</p>
                                @endif
                                <input type="file" class="form-control" placeholder="Image" name="image" accept="image/*">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description"  id="editor" class="form-control">{{$exam->description
                                }}</textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-4">
                                <input type="checkbox" id="in_homepage" value="1" {{$exam->in_homepage ? 'checked': ''}}
                                name="in_homepage">
                                <label for="in_homepage">Show in homepage</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" id="is_published" value="1" {{$exam->is_published ? 'checked' : ''}}  name="is_published">
                                <label for="is_published">{{__('default.is_published')}}</label>
                            </div>
                            <label for="example-text-input" class="col-sm-2 col-form-label text-right
                            d-none">Status</label>
                            <div class="col-sm-4 d-none">
                                <select class="form-control status" name="status">
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
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                    Changes</button>
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
            @if($value = $exam->subject_id)
            $('.subject').val("{{$value}}")
            @endif
        }).val("{{$exam->class_id}}").change()


        @if($value = $exam->status)
            $('.status').val("{{$value}}").change()
        @endif

    </script>

@endpush
