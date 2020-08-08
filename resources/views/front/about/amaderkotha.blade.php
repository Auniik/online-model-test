@extends('front.layout.master')
@section('content')

    <section id="about_bg">
        <div class="overlay">
            <div class="container-fulied">
                <div class="text_center animated zoomIn">
                    <h1> আমাদের সম্পর্কে</h1>
                </div>
            </div>
        </div>
    </section>

    <section id="about_part">
        <div class="container-fulied">
            <div class="row online-left">
                <div class="col-lg-9 col-md-12 col-sm-12 right_side">
                    <div class="about_content animated bounceInRight slow">
                       {!! $director->message !!}}
                    </div>
                </div>

                <div class="col-lg-3 col-md-12 col-sm-12 left_side">
                    <div class="imag_side">
                        <a href="javascript:void(0)">
                            <div class="round animated zoomIn slow">
                                <img src="{{url($director->image)}}" alt="testi_3">
                            </div>
                            <div class="text">
                                <h6>{{$director->name}}</h6>
                                <p>{{$director->designation}}</p>
                                <p>টেকসই বাংলা লি.</p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <a href="{{$director->facebook_link}}" class="social-icon mt-0" target="blank">
                                    <i class="fab fa-facebook  icon-alias" style="color: #3b5998"></i>
                                </a>

                                <a href="{{$director->twitter_link}}" class="social-icon mt-0" target="blank">
                                    <i class="fab fa-twitter icon-alias" style="color: #1DA1F2"></i>
                                </a>
                                <a href="{{$director->instagram_link}}" class="social-icon mt-0"
                                   target="blank">
                                    <i class="fab fa-instagram icon-alias" style="color: #8a2387;"></i>
                                </a>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="team_member">
        <div class="overlay">
            <div class="container-fulied">
                <div class="text_center">
                    <h1> টিম মেম্বার </h1>
                </div>
                <div class="row online-left">
                    @foreach ($team_members as $team_member)
                        <div class="col-lg-3 col-md-6 col-sm-6 left_side">
                            <div class="imag_side">
                                <a href="javascript:void(0)">
                                    <div class="round">
                                        <img src="{{url($team_member->image)}}" alt="testi_3">
                                    </div>
                                    <div class="text">
                                        <h6>{{$team_member->name}}</h6>
                                        <p>{!! $team_member->designation !!}</p>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{$team_member->facebook_link}}" class="social-icon mt-0" target="blank">
                                            <i class="fab fa-facebook  icon-alias" style="color: #3b5998"></i>
                                        </a>

                                        <a href="{{$team_member->twitter_link}}" class="social-icon mt-0" target="blank">
                                            <i class="fab fa-twitter icon-alias" style="color: #1DA1F2"></i>
                                        </a>
                                        <a href="{{$team_member->instagram_link}}" class="social-icon mt-0"
                                           target="blank">
                                            <i class="fab fa-instagram icon-alias" style="color: #8a2387;"></i>
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

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
                        <div class="row d-flex justify-content-between">
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
