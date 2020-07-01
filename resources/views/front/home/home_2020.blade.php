@extends('front.master')
@section('body')
    <section class="main-slider">
        <ul class="slides">
            @foreach($sliders as $slider)
            <li class="bg-slider bg-animation-left d-flex align-items-center" style="background-image:url('{{asset($slider->image)}}')">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-7">
                            <div class="title-heading position-relative mt-4" style="z-index: 1;">
                                <h1 class="heading mb-3">{{$slider->title}}</h1>
                                <p class="para-desc">{!! $slider->short_description !!}</p>
                                <div class="watch-video mt-4 pt-2">
                                    <a href="{{$slider->link}}" class="video-play-icon watch text-dark"><i class="mdi mdi-play play-icon-circle text-center d-inline-block mr-2 rounded-pill text-white title-dark position-relative play play-iconbar"></i> WATCH VIDEO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </section><!--end section-->
    <!-- Hero End -->
    <!-- Feature Start -->
    <section class="section">
        <div class="container mt-10">
            <div class="row">
                <div class="col-md-12 message-top-title">
                    <h2>VIP Message</h2>
                    <p>I am still there</p>
                </div>
            </div>
            <div class="row align-items-center">
                @foreach($eventmessages as $eventmessage)
                <div class="col-lg-6 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0 mb-2">
                    <div class="row">
                        <div class="col-lg-6 main-message text-right">
                            <div><h4>{{$eventmessage->name}}</h4></div>
                            <div><h5>{{$eventmessage->designation}}</h5></div>
                            <p>{!! substr($eventmessage->message,0,130 )!!}</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{asset($eventmessage->image)}}" class="img-fluid">
                        </div>
                    </div>
                </div><!--end col-->
                @endforeach
                {{ $eventmessages->links() }}

            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Feature End -->
    <!-- End Price -->
    </section><!--end section-->
    <!-- CTA END -->
    <section class="section-two bg-light" id="bookroom">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="mb-2">কুইজে অংশ নিন </h3>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="p-4 shadow bg-white rounded">

                                <h4 class="mb-3">General</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Email</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="email" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Phone</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="number" name="phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="submit" name="btn" value="Start Quiz">
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-lg-12 col-md-12">
                                        <img src="{{asset('/')}}front/images/coworking/cta.jpg" class="rounded align-items-center mb-3" style="height: 400px" width="100%px"alt="">
                                        <div class="form-group">
                                            <h5 class="event-questions">বঙ্গবন্ধু কত সালে এবং কিভাবে আনুষ্ঠানিকভাবে রাজনীতিতে অভিষিক্ত হন ?</h5>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">১৯৪২ সালে; গোপালগঞ্জ মিশনারি স্কুল ছাত্রলীগে যোগদানের মাধ্যমে। </label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">১৯৪৪ সালে; কুষ্টিয়ায় নিখিল বঙ্গমুসলিম ছাত্রলীগের সম্মেলনে যোগদানের মাধ্যমে। </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3">১৯৪৬ সালে; হোসেন শহীদ সোহরাওয়ার্দীর সহকারী নিযুক্ত হওয়ার মাধ্যমে।</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">১৯৪৭ সালে; কলকাতা ইসলামিয়া কলেজে ছাত্রলীগের যোগদানের মাধ্যমে। </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 offset-10 mt-5">
                                    <div class="form-group">
                                        <input type="submit" id="search" name="search" class="searchbtn btn btn-primary w-100 p" value="Submit">
                                    </div>
                                </div><!--end col-->
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form class="p-4 shadow bg-white rounded">
                                <h4 class="mb-3">প্রশ্ন উত্তর পর্ব</h4>
                                <div class="row text-center">
                                    <div class="col-lg-12 col-md-12">
                                        <img src="{{asset('/')}}front/images/coworking/cta.jpg" class="rounded align-items-center mb-3" style="height: 400px" width="100%px"alt="">
                                        <div class="form-group">
                                            <h5 class="event-questions">বঙ্গবন্ধু কত সালে এবং কিভাবে আনুষ্ঠানিকভাবে রাজনীতিতে অভিষিক্ত হন ?</h5>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">১৯৪২ সালে; গোপালগঞ্জ মিশনারি স্কুল ছাত্রলীগে যোগদানের মাধ্যমে। </label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">১৯৪৪ সালে; কুষ্টিয়ায় নিখিল বঙ্গমুসলিম ছাত্রলীগের সম্মেলনে যোগদানের মাধ্যমে। </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3">১৯৪৬ সালে; হোসেন শহীদ সোহরাওয়ার্দীর সহকারী নিযুক্ত হওয়ার মাধ্যমে।</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">১৯৪৭ সালে; কলকাতা ইসলামিয়া কলেজে ছাত্রলীগের যোগদানের মাধ্যমে। </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 offset-10 mt-5">
                                    <div class="form-group">
                                        <input type="submit" id="search" name="search" class="searchbtn btn btn-primary w-100 p" value="Submit">
                                    </div>
                                </div><!--end col-->
                            </form>
                        </div>
                    </div>

                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Partners End -->
    <!-- Partners End -->
    <!-- Rooms End -->

    <!-- CTA Start -->
    @foreach($eventvideos as $eventvideo)
    <section class="section bg-cta" style="background: url('{{asset($eventvideo->image)}}') center center;" id="cta">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h4 class="title title-dark text-white mb-4">{{$eventvideo->title}}</h4>
                        <p class="text-light para-dark para-desc mx-auto">{!! $eventvideo->short_description !!}</p>
                        <a href="{{$eventvideo->link}}" class="play-btn border border-light mt-2 video-play-icon">
                            <i class="mdi mdi-play title-dark text-white"></i>
                        </a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    @endforeach
    <!-- CTA End -->
    <!-- Project Start -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h4 class="title mb-4">Our Latest Video</h4>
                        <p class="mt-4">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @foreach($youtubes as $youtube )
                <div class="col-lg-3 col-md-3 mt-4 pt-2">
                    <div class="embed-responsive embed-responsive-21by9">
                        <iframe width="722" height="409" src="{{$youtube->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div><!--end col-->
                    @endforeach
                    {{ $youtubes->links() }}
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Project End -->
    <!-- Services Start -->
    <!-- End services -->
    @endsection