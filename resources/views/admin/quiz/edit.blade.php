@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <form id="refForm" action="{{route('quizzes.update', $quiz)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary float-right" href="{{route('quizzes.index')}}">
                            {{__('default.all_quizzes')}}</a>
                        <h4 class="header-title"><span id="header-title">{{__('default.edit_quiz')}}</h4>
                    </div>
                    <div class="card-body">
                        @include('admin._partials.success-alert')
                        <input type="hidden" id="id" class="form-control" name="id">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('default.quiz_name')}}
                                *</label>
                            <div class="col-sm-10">
                                <input
                                    class="form-control"
                                    type="text"
                                    value="{{$quiz->name}}"
                                    placeholder="{{__('default.quiz_name')}}"
                                    name="name"
                                    autocomplete="off"
                                >
                                {{--                                @if($errors->has('name'))<div class="invalid-feedback">{{$errors->name}}</div>--}}
                                {{--                                @endif--}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('default.date')
                            }}</label>
                            <div class="col-sm-4">
                                <input type="text" id="dateTimeMy" value="{{$quiz->date}}" name="date"
                                       class="form-control">
                            </div>
                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">
                                {{__('default.duration')}}</label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="02:30" value="{{$quiz->duration}}" name="duration"
                                       class="form-control">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('default.cover_image')
                            }}</label>
                            <div class="col-sm-2">
                                <img src="/{{$quiz->image}}" class="img img-fluid" style="height: 70px"
                                     alt="{{$quiz->name}}">
                            </div>
                            <div class="col-sm-8">
                                @if ($quiz->image)
                                    <p class="text-warning">Want to replace this image ? Then Choose a new one.</p>
                                @endif
                                <input type="file" class="form-control" placeholder="Image" name="image" accept="image/*">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">{{__('default.description')
                            }}</label>
                            <div class="col-sm-10">
                                <textarea name="description"  class="form-control">{{$quiz->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-4">
                                <input type="checkbox" id="is_default" value="1"
                                       {{$quiz->is_default ? 'checked' : ''}}
                                    name="is_default">
                                <label for="is_default">{{__('default.is_default')}}</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" id="is_published" value="1" {{$quiz->is_published ? 'checked' : ''}}  name="is_published">
                                <label for="is_published">{{__('default.is_published')}}</label>
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


    </script>

@endpush
