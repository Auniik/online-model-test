@extends('front.layout.master')
@section('content')
    <section class="work-section mt-4">
        <div class="container-fluid">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-lg">
                    <div class="card-header text-center">
                        <h3> সৃজনশীল পোর্টাল</h3>
                    </div>
                    <div class="card-body">
                        @include('front.partials.notifications')
                        <form class="login-form" action="{{route('new-work')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" autocomplete="off" placeholder="Title"
                                               name="title"
                                               required="">
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
                                        <label>Upload Files <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control custom-file" placeholder="file" required multiple
                                               name="file[]">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>URL Link<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control  " placeholder="Video or property url" name="link">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Name" readonly
                                               value="{{auth('participant')->user()->name ?? ''}}" required="required" name="user_name">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Email<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control  " readonly placeholder="Email :"
                                               value="{{auth('participant')->user()->email ?? ''}}" required="required" name="user_name">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Mobile No.<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" readonly placeholder="Contact No"
                                               value="{{auth('participant')->user()->mobile_number ?? ''}}" required="required"
                                               name="mobile_number">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <button type="submit" name="submit"  class="btn btn-success btn-block"> Submit </button>
                                </div><!--end col-->

                            </div><!--end row-->
                        </form>
                        <br><br><br>
                    </div>
                </div>
            </div>
        </div><!--end container fluid-->
    </section><!--end section-->

@endsection
