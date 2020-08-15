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
                        <form class="login-form" action="{{route('new-work')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" autocomplete="off" placeholder="Title"
                                               name="title"
                                               value="{{old('title')}}"
                                               required="">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Select Category <span class="text-danger">*</span></label>
                                        <select name="work_type" class="form-control">
                                            <option value="">Select One</option>
                                            @foreach($categories as $id => $name)
                                                <option value="{{$id}}">{{$name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Description</label>
                                        <textarea required class="form-control" name="description">{{old('description')}}</textarea>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Upload Files <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control custom-file" placeholder="file" required multiple
                                               name="file[]">
                                        <p>Note: You can upload Image, MP4, PDF, ZIP files here, each file must be
                                            under 20MB</p>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>URL Link</label>
                                        <input type="text" class="form-control" value="{{old('link')}}"
                                               autocomplete="off"
                                               placeholder="Video or property url"
                                               name="link">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="Name" readonly
                                               value="{{auth('participant')->user()->name ?? ''}}" required="required" name="user_name">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Email</label>
                                        <input type="text" class="form-control  " readonly placeholder="Email :"
                                               value="{{auth('participant')->user()->email ?? ''}}" required="required" name="user_name">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Mobile No.</label>
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
