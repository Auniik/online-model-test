@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0"> আপডেট হালনাগাদ করুন</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('news-updates.update', $news)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label text-right"> শিরোনাম</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$news->title}}" name="title">
                                <input class="form-control" type="hidden" name="id" value="{{$news->id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Redirect
                                URL</label>
                            <div class="col-sm-10">
                                <input class="form-control" autocomplete="off" type="text"
                                       value="{{$news->link}}"
                                       placeholder="https://your-url.com"
                                       name="link">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 offset-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"> সেভ করুন
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5"> বাদ দিন </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- end col -->
    </div>
@endsection
