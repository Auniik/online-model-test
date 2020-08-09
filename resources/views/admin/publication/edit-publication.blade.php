@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0">পাবলিকেশন হালনাগাদ করুন</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('update-publication')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> শিরোনাম</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$publication->title}}"  name="title" re>
                                <input class="form-control" name="id" type="hidden" value="{{$publication->id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> বিস্তারিত বিবরণ</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" id="editor" required>{{$publication->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">  কভার ছবি</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" placeholder="Choose a image File" name="image"
                                       accept="image/*" required>
                                <small>Please make sure you entered the image file</small><br>

                                <img class="" src="/{{$publication->image}}" height="200px"
                                     alt="{{$publication->title}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> ফাইল</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="file"
                                       accept="application/pdf">
                                <small>Please make sure you entered the pdf file</small><br>
                                @if ($publication->file)
                                    <iframe
                                        class="my-4"
                                        src="/{{$publication->file}}"
                                        frameBorder="0"
                                        scrolling="auto"
                                        height="500px"
                                        width="100%"
                                    ></iframe>
                                @endif

                            </div>

                        </div>
                        <div class="form-group row mt-5">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" @if ($publication->status) checked @endif
                                        value="1" />
                                        <span> পাবলিশ</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" @if (!$publication->status) checked @endif
                                        value="0"/>
                                        <span> আনপাবলিশ</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 offset-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                    Changes</button>
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
