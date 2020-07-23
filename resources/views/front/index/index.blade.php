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
                                <a href="javascript:void(0)"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">জমা দিন</button></a>
                                @if (!auth('participant')->check())
                                    <a href="javascript:void(0)"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">রেজিস্ট্রেশন</button></a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



{{--        <div class="banner-2">--}}
{{--            <div class="overlay">--}}
{{--                <div class="container main_banner">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12 col-md-12 col-sm-12">--}}
{{--                            <div class="banner-text-1">--}}
{{--                                <p class="fadeInLeft animated" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms;">শিক্ষা তথ্য ও সৃজনশীল অনলাইন প্লাটফর্ম</p>--}}
{{--                                <h2 class="inner-box wow fadeInRight animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInRight;">টেকসই <span>বাংলা</span></h2>--}}
{{--                                <p class="fadeInLeft animated p-2" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms;">সবকিছু একসাথে এখানেই</p>--}}
{{--                                <a href="javascript:void(0)"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">জমা দিন</button></a>--}}
{{--                                <a href="javascript:void(0)"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">রেজিস্ট্রেশন</button></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="banner-3">--}}
{{--            <div class="overlay">--}}
{{--                <div class="container main_banner">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12 col-md-12 col-sm-12">--}}
{{--                            <div class="banner-text-1">--}}
{{--                                <p class="fadeInLeft animated" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms;">শিক্ষা তথ্য ও সৃজনশীল অনলাইন প্লাটফর্ম</p>--}}
{{--                                <h2 class="inner-box wow fadeInRight animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInRight;">টেকসই <span>বাংলা</span></h2>--}}
{{--                                <p class="fadeInLeft animated p-2" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms;">সবকিছু একসাথে এখানেই</p>--}}
{{--                                <a href="javascript:void(0)"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">জমা দিন</button></a>--}}
{{--                                <a href="javascript:void(0)"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">রেজিস্ট্রেশন</button></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}



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
                <div class="col">
                    <div class="blog-1">
                        <div class="image">
                            <a href="javascript:void(0)">
                                <img class="img-fluid" src="/front-end/images/shekhmujib.jpg" alt="shekhhasina.jpg">
                            </a>
                        </div>
                        <div class="blog-text">
                            <a href="javascript:void(0)">
                                <h4>বঙ্গবন্ধু শেখ মুজিবুর রহমান</h4>
                                <p class="txt-1">শেখ মুজিবুর রহমান, সংক্ষিপ্তাকারে শেখ মুজিব বা মুজিব, ছিলেন বাংলাদেশের প্রথম রাষ্ট্রপতি ও দক্ষিণ এশিয়ার একজন অন্যতম প্রভাবশালী রাজনীতিবিদ।</p>
                                <a href="javascript:void(0)" class="share-btn">
                                    <i class="fas fa-share"></i> Share
                                </a>
                                <span>1/January/2019</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="blog-1">
                        <div class="image">
                            <a href="javascript:void(0)">
                                <img class="img-fluid" src="/front-end/images/shekhhasina.jpg" alt="/abdul%20hamid.jpg">
                            </a>
                        </div>
                        <div class="blog-text">
                            <a href="javascript:void(0)">
                                <h4>মাননীয় প্রধানমন্ত্রী শেখ হাসিনা</h4>
                                <p class="txt-1">শেখ হাসিনা ওয়াজেদ বাংলাদেশের বর্তমান প্রধানমন্ত্রী। তিনি বাংলাদেশের একাদশ জাতীয় সংসদের সরকারদলীয় প্রধান এবং বাংলাদেশ আওয়ামী লীগের সভানেত্রী।</p>
                                <a href="javascript:void(0)" class="share-btn">
                                    <i class="fas fa-share"></i> Share
                                </a>
                                <span>1/January/2019</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="blog-1">
                        <div class="image">
                            <a href="javascript:void(0)">
                                <img class="img-fluid" src="/front-end/images/mirjafokrul.jpg" alt="mirjafokrul.jpg">
                            </a>
                        </div>
                        <div class="blog-text">
                            <a href="javascript:void(0)">
                                <h4>মির্জা ফখরুল ইসলাম আলমগীর</h4>
                                <p class="txt-1">মির্জা ফখরুল ইসলাম একজন বাংলাদেশি রাজনীতিবিদ ও সাবেক প্রতিমন্ত্রী। তিনি বর্তমানে বাংলাদেশ জাতীয়তাবাদী দলের মহাসচিবের দায়িত্ব পালন করছেন।</p>
                                <a href="javascript:void(0)" class="share-btn">
                                    <i class="fas fa-share"></i> Share
                                </a>
                                <span>1/January/2019</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="blog-1">
                        <div class="image">
                            <a href="javascript:void(0)">
                                <img class="img-fluid" src="/front-end/images/roksan.jpg" alt="roksan.jpg">
                            </a>
                        </div>
                        <div class="blog-text">
                            <a href="javascript:void(0)">
                                <h4>মো: নুরুদ্দিন রক্সার</h4>
                                <p class="txt-1">সাবেক তথ্য ও গবেষণা বিষয়ক সম্পাদক ঢাকা মহানগর ছাত্রলীগ - উত্তর এবং সাবেক ১ম যুগ্ম আহ্বায়ক, আ স ম আবদুর রব সরকারি কলেজ, বাংলাদেশ ছাত্রলীগ।</p>
                                <a href="javascript:void(0)" class="share-btn">
                                    <i class="fas fa-share"></i> Share
                                </a>
                                <span>1/January/2019</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="blog-1">
                        <div class="image">
                            <a href="javascript:void(0)">
                                <img class="img-fluid" src="/front-end/images/shahriar.jpg" alt="shahriar.jpg">
                            </a>
                        </div>
                        <div class="blog-text">
                            <a href="javascript:void(0)">
                                <h4>শাহরিয়ার আলম</h4>
                                <p class="txt-1">মো: শাহরিয়ার আলম বাংলাদেশের একজন রাজনীতিবিদ। তিনি ২০১৪ সালের ১৪ জানুয়ারি থেকে বাংলাদেশের পররাষ্ট্র প্রতিমন্ত্রীর দায়িত্ব পালন করছেন।</p>
                                <a href="javascript:void(0)" class="share-btn">
                                    <i class="fas fa-share"></i> Share
                                </a>
                                <span>1/January/2019</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="blog-1">
                        <div class="image">
                            <a href="javascript:void(0)">
                                <img class="img-fluid" src="/front-end/images/roksan.jpg" alt="roksan.jpg">
                            </a>
                        </div>
                        <div class="blog-text">
                            <a href="javascript:void(0)">
                                <h4>মো: নুরুদ্দিন রক্সার</h4>
                                <p class="txt-1">সাবেক তথ্য ও গবেষণা বিষয়ক সম্পাদক ঢাকা মহানগর ছাত্রলীগ - উত্তর এবং সাবেক ১ম যুগ্ম আহ্বায়ক, আ স ম আবদুর রব সরকারি কলেজ, বাংলাদেশ ছাত্রলীগ।</p>
                                <a href="javascript:void(0)" class="share-btn">
                                    <i class="fas fa-share"></i> Share
                                </a>
                                <span>1/January/2019</span>
                            </a>
                        </div>
                    </div>
                </div>
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
-->







    <!-- js Scripts -->


@stop
