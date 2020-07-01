@extends('front.master')
@section('body')
    {{--<section class="main-slider">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="row align-items-center">--}}
                {{--<div class="col-lg-12 px-0 mt-100 pt-0">--}}
                    {{--<img src="{{asset('/')}}front/images/coworking/cta.jpg" class="align-items-center rounded-0" style="height: 250px" width="100%px"alt="">--}}
                    {{--<img src="{{asset($active_event->image)}}" class="align-items-center rounded-0" style="height: 250px" width="100%px"alt="">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <section class="section-two mt-100 pt-0 pb-0 mb-5" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-justify">
                    <img src="{{asset($active_event->image)}}" class="align-items-center rounded-0" style="height: 250px" width="100%px"alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="section-two mt-0 pt-0 pb-0 mb-5" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-justify">
                    <h5> আপনাকে স্বাগতম {{$active_event->title}} কুইজে</h5>
                    <p>{!! $active_event->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section-two bg-light pt-4" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    @include('front.partials.notifications')
                    <br>
                    <a href="{{route('new-quiz')}}" class="btn btn-lg btn-outline-success">Start Quiz Now</a>
                </div>
            </div>
        </div>
    </section>
@endsection