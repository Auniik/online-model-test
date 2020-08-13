@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0  "> স্লাইডারে ছবি যোগ করুন</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('sliders.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> ছবি</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" placeholder="Image" name="image" accept="image/*"
                                       required>
                                <small>Slider image size should be: 1280x850</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> শিরোনাম</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="" autocomplete="off" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> বিবরণ</label>
                            <div class="col-sm-10">
                                <textarea name="short_description" class="form-control" id="editor"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-2 col-form-label text-lg-right">LINK 1</label>
                            <div class="col-lg-4">
                                <input class="form-control" type="text" value="" placeholder="https://something.com"
                                       autocomplete="off"
                                       name="link_1">
                            </div>
                            <label for="example-text-input" class="col-lg-2 col-form-label text-lg-right">LINK text</label>
                            <div class="col-lg-4">
                                <input class="form-control" type="text" value="" placeholder="Something"
                                       autocomplete="off"
                                       name="link_1_text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-2 col-form-label text-lg-right">LINK 2</label>
                            <div class="col-lg-4">
                                <input class="form-control" type="text" value="" placeholder="https://something.com" autocomplete="off"
                                       name="link_2">
                            </div>
                            <label for="example-text-input" class="col-lg-2 col-form-label text-lg-right">LINK text</label>
                            <div class="col-lg-4">
                                <input class="form-control" type="text" value="" placeholder="Something"
                                       autocomplete="off"
                                       name="link_2_text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" checked value="1"/>
                                        <span> পাবলিশ</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" value="0"/>
                                        <span> আনপাবলিশ</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 offset-10">
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
