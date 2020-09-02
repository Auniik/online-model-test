@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0 header-title">Edit Gallery</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('galleries.update', $gallery)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-2 col-form-label"> শিরোনাম</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="text" value="{{$gallery->title}}" autocomplete="off"
                                       name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-2 col-form-label"> কভার ছবি</label>
                            <div class="col-lg-4">
                                <input type="file" class="form-control" placeholder="Image" name="image" accept="image/*">
                                <img src="{{url($gallery->image)}}" alt="">
                            </div>
                            <label for="example-text-input" class="col-lg-2 col-form-label text-lg-right">  তারিখ</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control datepicker-2" value="{{$gallery->date}}" autocomplete="off" name="date"
                                       placeholder=" তারিখ"
                                       required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-2 col-form-label"> ভূমিকা</label>
                            <div class="col-lg-10">
                                <textarea class="form-control"
                                          name="short_descriptions">{{$gallery->short_descriptions}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-2 col-form-label">Status</label>
                            <div class="col-lg-10">
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" {{$gallery->status ? 'checked' : ''}}
                                        value="1" />
                                        <span>  পাবলিশ</span>
                                    </label>&nbsp; &nbsp; &nbsp;
                                    <label>
                                        <input name="status" type="radio" {{!$gallery->status ? 'checked' : ''}}
                                        value="0"/>
                                        <span> আনপাবলিশ</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-2 col-form-label"></label>
                            <div class="col-lg-10 offset-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
