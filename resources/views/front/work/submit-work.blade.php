@extends('front.master')
@section('body')
    <section class="work-section m-b-20" style="margin-top: 125px">
        <div class="container-fluid">
            <div class="col-md-6 offset-md-3">
                @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                    <form class="login-form" action="{{route('new-work')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control pl-5" placeholder="Title" name="title" required="">
                                </div>
                            </div><!--end col-->

                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label>Select Category <span class="text-danger">*</span></label>
                                    <select name="work_type" class="form-control">
                                        <option value="0">Select</option>
                                        <option value="অসমাপ্ত আত্মজীবনী">অসমাপ্ত আত্মজীবনী</option>
                                        <option value="কারাগারের রোজনামচা">কারাগারের রোজনামচা</option>
                                        <option value="সংগ্রামের ইতিহাস">সংগ্রামের ইতিহাস</option>
                                        <option value="ইউটিউব ভিডিও কনটেন্ট">ইউটিউব ভিডিও কনটেন্ট</option>
                                        <option value="স্কিপ রাইটিং">স্কিপ রাইটিং</option>
                                        <option value="স্কক্যানভাসে বঙ্গবন্ধু">স্কক্যানভাসে বঙ্গবন্ধু</option>
                                    </select>
                                </div>
                            </div><!--end col-->

                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea required class="form-control" name="description"></textarea>
                                </div>
                            </div><!--end col-->

                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label>Upload File <span class="text-danger">*</span></label>
                                    <input type="file" class="form-file" placeholder="file" required="" name="file">
                                </div>
                            </div><!--end col-->

                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label>Url Link<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control pl-5" placeholder="Video or property url" name="link">
                                </div>
                            </div><!--end col-->

                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label>User Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control pl-5" placeholder="User name" value="{{auth()->user()->name ?? ''}}" required="required" name="user_name">
                                </div>
                            </div><!--end col-->

                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control pl-5" placeholder="Email :" value="{{auth()->user()->email ?? ''}}" required="required" name="user_name">
                                </div>
                            </div><!--end col-->

                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label>Contact Number<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control pl-5" placeholder="Contact No" value="{{auth()->user()->contact ?? ''}}" required="required" name="mobile_no">
                                </div>
                            </div><!--end col-->

                            <div class="col-md-12">
                                <input type="submit" name="submit" value="Submit" class="btn btn-success btn-block">
                            </div><!--end col-->

                        </div><!--end row-->
                    </form>
                <br><br><br>
            </div>
        </div><!--end container fluid-->
    </section><!--end section-->

@endsection