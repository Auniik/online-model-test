@extends('front.layout.master')
@section('content')
    <!---------------------------- ব্যানার অংশ শুরু --------------->
    <section id="banner">
        @if (!$slider_images)
            <div class="banner-1">
                <div class="overlay">
                    <div class="container main_banner">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="banner-text-1">
                                    <p class="fadeInLeft animated" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms;">শিক্ষা তথ্য ও সৃজনশীল অনলাইন প্লাটফর্ম</p>
                                    <h2 class="inner-box wow fadeInRight animated" data-wow-delay="0ms"
                                        data-wow-duration="1500ms" style="visibility: visible; animation-duration:
                                    1500ms; animation-delay: 0ms; animation-name: fadeInRight; font-family: shorif-shishir">টেকসই
                                        <span>বাংলা</span>
                                    </h2>
                                    <p class="fadeInLeft animated p-2" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms;">সবকিছু একসাথে এখানেই</p>
                                    <a href="{{url('/submit-work?ref=creativity')}}">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                                            সৃজনশীলতা জমা দিন
                                        </button>
                                    </a>
                                    @if (!auth('participant')->check())
                                        <a href="{{route('participants.register.index')}}">
                                            <button class="btn btn-outline-success my-2 my-sm-0"
                                                    type="submit"> রেজিস্ট্রেশন
                                            </button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @foreach($slider_images as $k => $image)
            <div class="banner"
                 style='background: url("{{asset($image->image)}}") no-repeat center; background-size: cover;'>
                <div class="overlay">
                    <div class="container main_banner">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="banner-text-1">
                                    <div class="text-center">
                                        {!! $image->short_description !!}
                                    </div>

                                    <div class="text-center mt-2">
                                        @if ($image->link_1)
                                            <a href="{{$image->link_1}}">
                                                <button class="btn btn-lg btn-primary my-2 my-sm-0" type="submit">
                                                    {{$image->link_1_text}}
                                                </button>
                                            </a>
                                        @endif
                                        @if ($image->link_2)
                                            <a href="{{$image->link_2}}">
                                                <button class="btn btn-lg btn-primary my-2 my-sm-0" type="submit">
                                                    {{$image->link_2_text}}
                                                </button>
                                            </a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        @endif

    </section>

    <!---------------------------- ব্যানার অংশ শেষ --------------->

    @include('front._partials.online-exam', ['exams' => $exams])
    @if ($switch['site_map'])
        @include('front._partials.sitemap')
    @endif

    @include('front._partials.creativity')


    <!---------------------------- বার্তা অংশ শুরু --------------->

    <section id="our-message">
        <div class="container-fulied cont our-blog">
            <div class="text_center">
                <h1>বার্তা</h1>
            </div>

            <div class="row blog_slide online-left">
                @foreach($news_feed as $blog)
                <div class="col">
                    <div class="blog-">
                    <div class="card shadow">
                        <a class="text-secondary" href="{{url("/blog-details/{$blog->id}?ref=blog&id={$blog->id}")}}">
                            <img class="card-img-top" src="{{asset($blog->image)}}" alt="Card image"
                            >
                            <div class="card-body p-2" style="min-height: 99px;">
                                <h6 class="card-text d-flex justify-content-between">
                                    <h6> <strong>{!! $blog->title !!}</strong></h6>
                                    {{ Str::limit($blog->short_description, 110) }}
                                </h6>
                            </div>
                        </a>


                        <div class="card-footer p-1">
                            <div class="d-flex justify-content-between">
                                {{$blog->created_at->format('M d, Y h:i A')}}
                                @include('front._partials.share', [
                                    'url' => url("/blog-details/{$blog->id}?ref=blog&id={$blog->id}")
                                ])
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

<script>
    window.onscroll = function() {
        myFunction()
    };

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }

</script>

@stop

