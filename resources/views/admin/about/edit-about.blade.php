@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0 "> লক্ষ্য ও উদ্দেশ্য</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('about.update', $about)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$about->title}}"  name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> মিশন</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="mission" id="editor3">{{$about->mission}}</textarea>
                            </div>
                            <script type="text/javascript">
                                CKEDITOR.replace( 'editor3' );
                                CKEDITOR.add
                            </script>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> ভিশন</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="vision" id="editor4">{{$about->vision}}</textarea>
                            </div>
                            <script type="text/javascript">
                                CKEDITOR.replace( 'editor4' );
                                CKEDITOR.add
                            </script>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">  ভূমিকা</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="short_description" id="editor5"
                                >{{$about->short_description}}</textarea>
                            </div>
                            <script type="text/javascript">
                                CKEDITOR.replace( 'editor5' );
                                CKEDITOR.add
                            </script>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> বর্ণনা</label>
                            <div class="col-sm-10">
                                <textarea name="long_description" class="form-control" id="editor">{{$about->long_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> ছবি 2000*400</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" placeholder="Image" name="image" accept="image/*"
                                       required>
                                <img src="/{{$about->image}}" class="my-4" height="150px" alt="about image">
                            </div>
                        </div>
                        <div class="form-group row d-none">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" checked value="1" />
                                        <span> পাবলিশ</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio"  value="0"/>
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
