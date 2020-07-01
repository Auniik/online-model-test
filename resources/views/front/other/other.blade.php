@extends('front.master')
@section('body')
    <section class="section">
        <div class="container mt-10">
            <div class="row">
                <div class="col-md-12 message-top-title">
                    <h2>মূল্যবান বার্তা</h2>
                    <p>আমাদের সম্পর্কে মূল্যবান বার্তা গুলো নিম্নে দেওয়া হল</p>
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

    <!-- CTA Start -->
    @foreach($eventvideos as $eventvideo)
        <section class="section bg-cta" style="background: url('{{asset($eventvideo->image)}}') center center;"
                 id="cta">
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
                        <p class="mt-4">আমাদের প্রোগ্রামের কিছু সংখ্যক ভিডিও</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @foreach($youtubes as $youtube )
                    <div class="col-lg-3 col-md-3 mt-4 pt-2">
                        <div class="embed-responsive embed-responsive-21by9">
                            <iframe width="722" height="409" src="{{$youtube->link}}" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
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