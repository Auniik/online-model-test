@extends('front.layout.master')
@section('content')


    <section class="section pt-0 pb-5">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        @foreach($abouts as $about)
                            <img src="{{asset($about->image)}}" class="img img-fluid" width="100%">
                        @endforeach
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

    <section class="section pt-0 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="amaderkotha-heading bg-transparent text-center">
                        <h4>আমাদের কথা</h4>
                    </div>
                    <div class="position-relative">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="amaderkotha-heading bg-primary text-center">
                                    <h4 class="p-2" style="padding-left:10px; color:#fff;">ফেসবুকে আমাদের সাথে থাকুন</h4>
                                </div>
                                <div class="card shadow-lg bg-transparent">
                                    <div class="card-body">
                                        <iframe class="shadow-sm"
                                            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTekasaibd%2F&tabs=timeline&width=350&height=375&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=442275712930029"
                                            width="300" height="340" style="border:none;overflow:hidden"
                                            allowTransparency="true"
                                            allow="encrypted-media"></iframe>

                                    </div>
                                </div>
                            </div>
                            @foreach($eventmessages as $eventmessag)
                                <div class="col-md-4 mb-1">
                                    <div class="card shadow-lg bg-transparent">
                                        <img class="card-img-top" src="{{asset($eventmessag->image)}}"
                                             alt="Card image cap" width="100%" height="300">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">{{$eventmessag->name}}</h5>
                                            <p class="text-center">{{$eventmessag->designation}} <span
                                                    class="pl-2"><br/><a href="{{route('event-details',
                                                    ['id'=> $eventmessag->id])}}">বিস্তারিত</a></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section pt-0 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        <div class="amaderkotha-heading bg-transparent text-center">
                            <h4 class="mt-5" style="padding-left:10px">প্রকাশনা</h4>
                        </div>
                        <div class="row">
                            @foreach($publications as $publication)
                                <div class="col-md-3 mb-2 mt-2">
                                    <div class="card shadow-lg">
                                        <a href="{{route('publication-details',['id'=>$publication->id])}}"
                                           target="_blank"><img class="card-img-top"
                                                                src="{{asset($publication->image)}}"
                                                                alt="Card image cap" width="100%" height="300"></a>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-sm-12 col-sm-offset-6">
                                {{ $publications->links() }}
                            </div>

                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <section class="section pt-5 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        <div class="amaderkotha-heading bg-transparent text-center">
                            <h4>গ্যালারি</h4>
                        </div>
                        <div class="row">
                            @foreach($galleris as $gallery)
                                <div class="col-md-3 mb-2 mt-2">
                                    <div class="card">
                                        <a data-magnify="gallery" data-src="" data-caption="Tekasaibd"
                                           data-group="a" href="{{asset($gallery->image)}}">
                                            <img class="card-img-top" src="{{asset($gallery->image)}}"
                                                 alt="Card image cap" width="100%" height="300">
                                        </a>
                                        {{--<a href="#"><img class="card-img-top" src="{{asset($gallery->image)}}" alt="Card image cap" height="250"></a>--}}
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-sm-12 col-sm-offset-6">
                                {{ $galleris->links() }}
                            </div>

                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <section class="section pt-0 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 pr-0 pl-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        {{--<div class="amaderkotha-heading bg-light text-center">--}}
                        {{--<h4 class="" style="padding-left:10px">গ্যালারী</h4>--}}
                        {{--</div>--}}
                        <div class="row m-0">
                            <div class="col-md-9">
                                @foreach($eventvideos as $eventvideo)
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="{{$eventvideo->link}}"
                                                allowfullscreen></iframe>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-3">
                                @foreach($youtubes as $youtube )
                                    <div class="embed-responsive embed-responsive-21by9 mb-1">
                                        <iframe width="722" height="200" src="{{$youtube->link}}" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                    </div>
                                @endforeach
                                {{ $youtubes->links() }}
                            </div>

                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
@endsection
