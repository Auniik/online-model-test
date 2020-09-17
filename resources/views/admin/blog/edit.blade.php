@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0"> বার্তা হালনাগাদ করুন</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('blogs.update', $blog)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> শিরোনাম</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$blog->title}}"  name="title" required>
                                <input class="form-control" name="id" type="hidden" value="{{$blog->id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> ভূমিকা</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="short_description" required>{{$blog->short_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> কভার ছবি:</label>
                            <div class="col-sm-10">
                                <input type="file"
                                       class="form-control"
                                       placeholder="Image" name="image" accept="image/*"
                                       >
                                <p class="text-primary">Image height must be in 500px, Width: 1000px</p>
                                <img src="{{url($blog->image)}}" class="img img-fluid" alt="{{$blog->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> বর্ণনা </label>
                            <div class="col-sm-10">
                                <textarea name="long_description" class="form-control" id="editor" required>{{$blog->long_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" checked value="1" />
                                        <span>  পাবলিশ</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio"   value="0"/>
                                        <span> আনপাবলিশ</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 offset-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"> সেভ করুন
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5"> বাদ দিন</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
