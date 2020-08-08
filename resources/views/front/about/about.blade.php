@extends('front.layout.master')
@section('content')
    <!-- About Start -->
    @foreach($abouts as $about)
    <section class="section front-about mt-0 pt-0">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 pr-0 pl-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        <img src="{{asset($about->image)}}" class="" alt="" height="400px" width="100%">
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <section class="section about ">
        <div class="container">
            <div class="row align-items-center shadow-lg mission-vision">
                <div class="col-lg-6 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="section-title ml-lg-4">
                        <h4 class="title mb-4">মিশন</h4>
                        <p class="text-justify">{{$about->mission}}</p>
                    </div>
                </div><!--end col-->

                <div class="col-lg-6 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="section-title ml-lg-4">
                        <h4 class="title mb-4">ভিশন</h4>
                        <p class="text-justify">{{$about->vision}}</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- About End -->
    <section class="section about">
        <div class="container">
            <div class="row align-items-center shadow-lg  mission-vision">
                <div class="col-lg-12 col-md-12 mt-sm-0 pt-sm-0 mb-5">
                    <div class="section-title ml-lg-4">
                        <h4 class="title mb-4">গল্প</h4>
                        <p class="text-justify">{!! $about->short_description !!}</p>
                    </div>
                </div><!--end col-->
                <br><br>
                <div class="col-lg-12 col-md-12 mt-sm-0 pt-sm-0 mt-5">
                    <div class="section-title ml-4">
                        <h4 class="title mb-4">ভবিষ্যৎ পরিকল্পনা</h4>
                        <p class="text-justify">{!! $about->long_description !!}</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <section class="section about">
        <div class="container">
            <div class="row align-items-center">

            </div><!--end row-->
        </div><!--end container-->
    </section>
    @endforeach
@endsection
