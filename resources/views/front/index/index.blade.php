@extends('front.layout.master')
@section('content')
    <!---------------------------- ব্যানার অংশ শুরু --------------->
    <section id="banner">
        <div class="banner-1">
            <div class="overlay">
                <div class="container main_banner">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="banner-text-1">
                                <p class="fadeInLeft animated" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms;">শিক্ষা তথ্য ও সৃজনশীল অনলাইন প্লাটফর্ম</p>
                                <h2 class="inner-box wow fadeInRight animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInRight;">টেকসই <span>বাংলা</span></h2>
                                <p class="fadeInLeft animated p-2" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms;">সবকিছু একসাথে এখানেই</p>
                                <a href="{{url('/submit-work')}}">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> সৃজনশীলতা জমা
                                        দিন</button></a>
                                @if (!auth('participant')->check())
                                    <a href="{{route('participants.register.index')}}"><button class="btn btn-outline-success my-2 my-sm-0"
                                                        type="submit">রেজিস্ট্রেশন</button></a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---------------------------- ব্যানার অংশ শেষ --------------->

    @include('front._partials.online-exam', ['exams' => $exams])

    @include('front._partials.sitemap')

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
                    <div class="blog-{{$blog->id}}">

                        <div class="card shadow-lg">
                            <img class="card-img-top" src="{{asset($blog->image)}}" alt="Card image"
                                 height="200">
                            <div class="card-body">
                                <h6 class="card-text d-flex justify-content-between">
                                    {{ Str::limit($blog->short_description, 50) }}
                                </h6>
                                <span>
                                    {{$blog->created_at->format('M d, Y h:i A')}}
                                </span>
                                <div class="mt-3 d-flex justify-content-between">
                                    @include('front._partials.share', ['url' => route('blog-details', $blog)])
                                    <a href="{{route('blog-details',['id'=>$blog->id])}}" class="btn
                                    btn-link">বিস্তারিত</a>
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
