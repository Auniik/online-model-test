@extends('front.layout.master')
@section('content')

    <section id="bongobondhu_bg">
        <div class="overlay">
            <div class="container-fulied">
                <div class="text_center animated slideInUp">
                    <h1> বঙ্গবন্ধু </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="bongobondhu animated bounceInRight slow">
        <div class="container">
            <h5>{{$bangabandhu->title}}</h5>
            <p class="text-justify">
            <div class="text-right mb-5">
                @include('front._partials.share', ['url' => url('/bangabandhu?ref=bb')])
            </div>
                {!! $bangabandhu->description !!}
            </p>
        </div>
    </section>
@endsection
