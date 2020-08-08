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
                    <div class="about_content animated bounceInRight slow p-lg-5  p-sm-0 p-md-4 m-sm-0 m-md-2">
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





@endsection
