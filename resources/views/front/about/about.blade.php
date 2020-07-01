@extends('front.master')
@section('body')
   <section class="news-scroll" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="onoffswitch3">
                        <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="myonoffswitch3"
                               checked>
                        <label class="onoffswitch3-label" for="myonoffswitch3">
        <span class="onoffswitch3-inner">
            <span class="onoffswitch3-active">
                @if($news)
                    <marquee class="scroll-text">{!! $news !!}</marquee>
                @endif
                <span class="onoffswitch3-switch">আপডেট </span>
            </span>
            <span class="onoffswitch3-inactive"><span class="onoffswitch3-switch">SHOW BREAKING NEWS</span></span>
        </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Start -->
    @foreach($abouts as $about)
    <section class="section front-about mt-0 pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 pr-0 pl-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        <img src="{{asset($about->image)}}" class="" alt="" height="400px" width="100%">
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <section class="section about">
        <div class="container">
            <div class="row align-items-center">
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
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-sm-0 pt-sm-0">
                    <div class="section-title ml-lg-4">
                        <h4 class="title mb-4">গল্প</h4>
                        <p class="text-justify">{!! $about->short_description !!}</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><section class="section about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-sm-0 pt-sm-0">
                    <div class="section-title ml-lg-4">
                        <h4 class="title mb-4">ভবিষ্যৎ পরিকল্পনা</h4>
                        <p class="text-justify">{!! $about->long_description !!}</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    @endforeach
    @endsection