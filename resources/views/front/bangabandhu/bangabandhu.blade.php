@extends('front.layout.master')
@push('meta')
    <meta name="description" content="বঙ্গবন্ধুর জন্ম শতবার্ষিকী উপলক্ষে তার আদর্শ ও চেতনার প্রতি বিনম্রচিত্ত্বে সম্মান রেখে tekasaibd.com টেকসই লক্ষ্যমাত্রা নির্ধারণ করে মুজিব বর্ষব্যাপী বিভিন্ন সামাজিক ও মানবিক সমস্যার স্থায়ী সমাধান কার্যক্রম হাতে নিয়েছে।">
    <meta name="keywords" content="টেকসই বিডি, tekasaibd.com">
    <meta name="author" content="মোঃ নুরউদ্দিন রোকসার">
    <meta property="og:type"          content="website" />
    <meta property="og:url"           content="{{request()->fullUrl()}}" />
    <meta property="og:title"         content="বঙ্গবন্ধু" />
    <meta property="og:description"   content="বঙ্গবন্ধুর জন্ম শতবার্ষিকী উপলক্ষে তার আদর্শ ও চেতনার প্রতি বিনম্রচিত্ত্বে সম্মান রেখে tekasaibd.com টেকসই লক্ষ্যমাত্রা নির্ধারণ করে মুজিব বর্ষব্যাপী বিভিন্ন সামাজিক ও মানবিক সমস্যার স্থায়ী সমাধান কার্যক্রম হাতে নিয়েছে।" />
    <meta property="og:image"         content="{{url($bangabandhu->image)}}" />
@endpush
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
                @include('front._partials.share', ['url' => url('/bangabandhu')])
            </div>
                {!! $bangabandhu->description !!}
            </p>
        </div>
    </section>



{{--    <section class="section privacy mt-0 pt-0">--}}
{{--        <div class="container">--}}
{{--            <div class="row align-items-center">--}}

{{--                <div class="col-lg-10 offset-md-1 col-md-12 mt-sm-0 pt-5"--}}
{{--                     style="font-size: 18px"--}}
{{--                >--}}
{{--                    @foreach($bangabandhus as $bangabandhu)--}}
{{--                        <img src="{{asset($bangabandhu->image)}}" class="shadow-lg" alt=""  height="400" width="100%">--}}
{{--                    @endforeach--}}
{{--                    <div class="card shadow-lg p-5">--}}
{{--                        <div class="card-body">--}}

{{--                    @foreach($bangabandhus as $bangabandhu)--}}
{{--                        <h3>{{$bangabandhu->title}}</h3>--}}
{{--                        <p class="text-justify">--}}
{{--                                <div class="text-right mb-5">--}}
{{--                                    @include('front._partials.share', ['url' => url('/bangabandhu')])--}}
{{--                                </div>--}}
{{--                            {!! $bangabandhu->description !!}--}}
{{--                        </p>--}}
{{--                    @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div><!--end col-->--}}
{{--            </div><!--end row-->--}}
{{--        </div><!--end container-->--}}
{{--    </section>--}}
@endsection
