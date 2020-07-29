@extends('front.master')
@section('body')
    <section class="news-scroll" style="margin-top: 89px;
margin-bottom: -8px !important;">
        <div class="container-fluid newsbody">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="onoffswitch3">
                        <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="myonoffswitch3"
                               checked>
                        <label class="onoffswitch3-label" for="myonoffswitch3">
        <span class="onoffswitch3-inner">
            <span class="onoffswitch3-active">
                @if($news)
                    <marquee class="scroll-text">{!! $news !!}</marquee>
                @endif
                <span class="onoffswitch3-switch">আপডেট </span>
            </span>
            <span class="onoffswitch3-inactive"><span class="onoffswitch3-switch">SHOW BREAKING NEWS</span></span>
        </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-two bg-light section-two-custom-code" id="startQuiz">
        <div class="container-fluid pl-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6 pr-0">
                            @foreach($sliders as $slider)
                                <img src="{{asset($slider->image)}}" class="img-fluid top-slider-custom-image" alt="">
                            @endforeach
                        <div class="bg-overlay"></div>
                        </div>
                        <div class="col-md-6 top-book-slider">
                            <h3 class="text-center">মুজিববর্ষে,টেকসই লক্ষ্য । স্বনির্ভর অনলাইন প্লাটফর্ম </h3>
                            <div class="row">
                                @foreach($books as $book)
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
                                        <div class="card mb-2">

                                            <div class="card bg-dark text-white">

                                                <a href="{{route('book.details',$book->id)}}" target="_blank" class="stretched-link"><img class="card-img tech-front-book-icon" src="{{asset($book->img)}}" alt="Card image" class="card-img-top" alt="..." height="190px"></a>
                                                <div class="card-img-overlay d-flex flex-column custom-book-title" style="background-color: #00000059;">
                                                    <h5 class="card-title"></h5>
                                                    <a href="{{route('book.details',$book->id)}}" target="_blank"class="stretched-link"><p class="card-text font-weight-bold text-white custom-title-text" style="background-clip: content-box; margin-top: 50px;"><span class="mr-auto" style="padding: 5px;">{{$book->title}}</span></p></a>
                                                </div>
                                            </div>

                                            {{--<a href="{{route('book.details',$book->id)}}"> <img src="{{asset($book->img)}}" class="card-img-top" alt="..." height="146px"></a>--}}
                                            {{--<div class="card-body">--}}
                                                {{--<a href="{{route('book.details',$book->id)}}"><p class="card-title text-center book-home-title">{{$book->title}}</p></a>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{ $books->links() }}
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->

    {{--<section class="section-two bg-light" id="startQuiz">--}}
        {{--<div class="container-fluid pl-0">--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-12">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6 pr-0">--}}
                            {{--@foreach($sliders as $slider)--}}
                                {{--<img src="{{asset($slider->image)}}" class="img-fluid top-slider-custom-image" alt="">--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 top-book-slider">--}}
                            {{--<h3 class="header-title text-center">মুজিববর্ষে,টেকসই লক্ষ্য । স্বনির্ভর অনলাইন প্লাটফর্ম </h3>--}}
                            {{--<div class="row">--}}
                                {{--@foreach($books as $book)--}}
                                {{--<div class="col-sm-4">--}}
                                    {{--<div class="card mb-2">--}}
                                        {{--<img src="{{asset($book->img)}}" class="card-img-top" alt="..." height="116px">--}}
                                        {{--<div class="card-body">--}}
                                            {{--<p class="card-title">{{$book->title}}</p>--}}
                                            {{--<a href="{{route('book.details',$book->id)}}" class="btn btn-primary btn-sm">Details</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                             {{--@endforeach--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div><!--end col-->--}}
            {{--</div><!--end row-->--}}
        {{--</div><!--end container-->--}}
    {{--</section><!--end section-->--}}

    <!-- Feature End -->
    <!-- End Price -->
    <!--end section-->
    <!-- CTA END -->
    <section class="section-two section-two-custom" id="startQuiz">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="mb-4">কুইজে অংশ নিন </h3>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{route('new-player')}}" method="POST" class="p-4 bg-white rounded quiz-login-box">
                                @csrf
                                @include('front.partials.notifications')
                                <h4 class="mb-3">সাধারণ</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">নাম </label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="name" required/>
                                        <input type="hidden" value="general" name="player_type"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">মোবাইল</label>
                                    <div class="col-md-9">
                                        <input class="form-control integer" type="text" minlength="11" maxlength="11" name="phone" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-9">
                                        <input class="form-control btn btn-primary" type="submit" name="btn" value="Start Quiz">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form class="p-4 quiz-login-box bg-white rounded" action="{{route('new-player')}}" method="post">
                                @csrf
                                @if(Session::has('warn'))
                                    <div class="alert alert-warning">
                                        {{Session::get('warn')}}
                                    </div>
                                @endif
                                <h4 class="mb-3">গেস্ট</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">নাম</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="name" required/>
                                        <input type="hidden" value="vip" name="player_type"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">পাসওয়ার্ড</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="password" minlength="6" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-9">
                                        <input class="form-control btn btn-primary" type="submit" name="btn" value="Start Quiz">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Partners End -->
    <!-- Partners End -->
        <section class="section pt-0 pb-0 mt-4">
        <div class="container mt-100 mt-60 mb-20">
            <div class="amaderkotha-heading bg-light text-center">
                        <h4 class="" style="padding-left:10px">যোগাযোগ</h4>
                    </div>
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0 order-2 order-md-1">
                    <div class="custom-form p-4 rounded shadow">
                        <div id="message"></div>
                        <form method="post" action="{{route('send-email')}}" name="contact-form" id="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group position-relative">
                                        <label>Your Name <span class="text-danger">*</span></label>
                                        <i class="mdi mdi-account ml-3 icons"></i>
                                        <input name="name" id="name" type="text" class="form-control pl-5" placeholder="First Name :">
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-6">
                                    <div class="form-group position-relative">
                                        <label>Your Email <span class="text-danger">*</span></label>
                                        <i class="mdi mdi-email ml-3 icons"></i>
                                        <input name="email" id="email" type="email" class="form-control pl-5" placeholder="Your email :">
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <label>Comments</label>
                                        <i class="mdi mdi-comment-text-outline ml-3 icons"></i>
                                        <textarea name="message" id="comments" rows="4" class="form-control pl-5" placeholder="Your Message :"></textarea>
                                    </div>
                                </div>
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <input type="submit" name="submit" class="submitBnt btn btn-primary btn-block" value="Send Message">
                                    <div id="simple-msg"></div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->
                    </div><!--end custom-form-->
                </div><!--end col-->


                <div class="col-lg-7 col-md-6 order-1 order-md-2">
                    @foreach($contract as $contact)
                        <div class="title-heading ml-lg-4">
                            <h4 class="mb-4">Contact Details</h4>
                            <p class="text-muted">{{$contact->title}}</p>
                            <div class="contact-detail mt-3">
                                <div class="icon mt-3 float-left">
                                    <i class="mdi mdi-email-variant text-muted mdi-36px mr-3"></i>
                                </div>
                                <div class="content mt-3 overflow-hidden d-block">
                                    <h6 class="mb-0">Email</h6>
                                    <a href="mailto:contact@example.com" class="text-primary">{{$contact->email}}</a>
                                </div>
                            </div>

                            <div class="contact-detail mt-3">
                                <div class="icon mt-3 float-left">
                                    <i class="mdi mdi-phone text-muted mdi-36px mr-3"></i>
                                </div>
                                <div class="content mt-3 overflow-hidden d-block">
                                    <h6 class="mb-0">Phone</h6>
                                    <a href="tel:+152534-468-854" class="text-primary">{{$contact->phone}}</a>
                                </div>
                            </div>

                            <div class="contact-detail mt-3">
                                <div class="icon mt-3 float-left">
                                    <i class="mdi mdi-map-marker-outline text-muted mdi-36px mr-3"></i>
                                </div>
                                <div class="content mt-3 overflow-hidden d-block">
                                    <h6 class="mb-0">Location</h6>
                                    <p>{{$contact->address}}</p>
                                </div>
                            </div>

                            <div class="contact-detail mt-3">

                                <a class="from-control btn-info btn-sm" href="https://www.facebook.com/Tekasaibd/">Facebook</a>
                                <a class="from-control btn-danger btn-sm" href="https://www.youtube.com/channel/UC9uaPHkm62ydNejCAcpnm9A?fbclid=IwAR0NE_acheRoIQcwzGBiaiaAdDsVnBmmjgPxQxTHipPa56ongyg3PQcvuq0">Youtube</a>

                            </div>
                        </div>
                    @endforeach
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Rooms End -->
    <section class="section pt-0 pb-0 mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0 mt-50">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3651.5755617506265!2d90.38725201498158!3d23.762510384583454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z4Ken4Kem4KeuIOCmhuCmk-CmsuCmvuCmpiDgprngp4vgprjgp4fgpqgg4Kau4Ka-4Kaw4KeN4KaV4KeH4KafLeCnqOCnnyDgpqTgprLgpr4sIOCmj-Cnn-CmvuCmsOCmquCni-CmsOCnjeCmn-CnhyDgprDgp4vgpqEsIOCmpOCnh-CmnOCml-CmvuCmgeCmkyDgpqLgpr7gppXgpr4t4Ken4Keo4Ken4Ker!5e0!3m2!1sen!2sbd!4v1584217522801!5m2!1sen!2sbd" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->

    <!-- CTA Start -->
    <!-- CTA End -->
    <!-- Project Start -->
    <!-- Project End -->
    <!-- Services Start -->
    <!-- End services -->
@endsection
