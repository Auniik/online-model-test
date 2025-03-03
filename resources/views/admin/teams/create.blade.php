@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mt-0"> টীম মেম্বার যুক্ত করুন</h4>
                    <a href="{{route('team-members.index')}}" style="height: 35px; " class="btn
                    btn-primary col-2"> টিম মেম্বারস দেখুন</a>
                </div>
                <div class="card-body">
                    <form action="{{route('team-members.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> নাম</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{old('name')}}" autocomplete="off"
                                       name="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> পদবী</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{old('designation')}}"
                                       autocomplete="off"
                                       name="designation">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> ছবি 600*600 </label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image" accept="image/*" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> শর্ট ম্যাসেজ</label>
                            <div class="col-sm-10">
                                <textarea name="short_message" class="form-control" id="editor1">{{old('short_message')
                                }}</textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace( 'editor1' );
                                    CKEDITOR.add
                                </script>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> ম্যাসেজ</label>
                            <div class="col-sm-10">
                                <textarea name="message" class="form-control" id="editor3" required>{{old('message')
                                }}</textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace( 'editor3' );
                                    CKEDITOR.add
                                </script>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Facebook Link</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" autocomplete="off" value="{{old
                                ('facebook_link')}}"
                                       name="facebook_link" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Twitter Link</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" autocomplete="off" value="{{old
                                ('twitter_link')}}"
                                       name="twitter_link">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Instagram Link</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" autocomplete="off" value="{{old
                                ('instagram_link')}}"
                                       name="instagram_link">
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
