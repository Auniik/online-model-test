@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class=""> ভিডিও  হালনাগাদ করুন</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('videos.update', $video)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label for="name" class="col-sm-1 col-form-label"> শিরোনাম</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="name" type="text" name="name" autocomplete="off"
                                       placeholder="Title of this video"
                                       value="{{$video->name}}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-sm-1 col-form-label"> URL</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="url" name="link" autocomplete="off"
                                       placeholder="https://www.youtube.com/watch?v=Asdfsdfwt9XIY"
                                       value="{{$video->url}}"
                                       id="example-url-input">

                                <img class="my-5" src="{{$video->thumbnail}}" alt="{{$video->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-sm-1 col-form-label"> &nbsp;</label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"> সেভ করুন
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

@endsection
