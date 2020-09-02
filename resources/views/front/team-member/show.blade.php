@extends('front.layout.master')
@section('content')
    <section  id="about_bg">
        <div class="overlay">
            <div class="container-fulied">
                <div class="text_center animated slideInUp">
                    <h1> {{$member->name}} </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="bongobondhu animated bounceInRight slow">
        <div class="container">
            <img height="200px" class="shadow mb-4" src="{{url($member->image)}}"
                 alt="{{$member->name}}">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>
                        {{$member->name}}<br>
                        <small>
                            {{$member->designation}}
                        </small>
                    </h5>
                </div>
                <div class="d-flex">
                    <a href="{{$member->facebook_link}}" class="social-icon mt-0" target="blank">
                        <i class="fab fa-facebook  icon-alias" style="color: #3b5998"></i>
                    </a>

                    <a href="{{$member->twitter_link}}" class="social-icon mt-0" target="blank">
                        <i class="fab fa-twitter icon-alias" style="color: #1DA1F2"></i>
                    </a>
                    <a href="{{$member->instagram_link}}" class="social-icon mt-0"
                       target="blank">
                        <i class="fab fa-instagram icon-alias" style="color: #8a2387;"></i>
                    </a>
                </div>
            </div>
            <p class="text-justify">
            {!! $member->message !!}
            </p>
        </div>
    </section>
@endsection
