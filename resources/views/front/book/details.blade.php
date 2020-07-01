@extends('front.master')
@section('body')
    <section class="news-scroll">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
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

    <!-- Blog STart -->
    <section class="section pt-0" style="margin-top:20px !important">
        <div class="container">
            <div class="row">
                <!-- BLog Start -->
                <div class="col-lg-8 col-md-6">
                    <h2>{{$book->title}}</h2>
                    <div class="mr-lg-2">
                        <div class="row">

                            @foreach($book->images as $image)

                                <div class="col-lg-4 mb-4 pb-2">

                                    <a data-magnify="gallery" data-src="" data-caption="Tekasaibd"
                                       data-group="a" href="{{asset($image->image)}}">
                                        <img src="{{asset($image->image)}}" alt="" class="img-fluid">
                                    </a>
                                    {{--<img src="{{asset($image->image)}}" class="gallery-items img-fluid" alt="" data-high-res-src="{{asset($image->image)}}" alt="">--}}
                                    <div class="overlay rounded-top bg-dark"></div>

                                </div><!--end col-->

                            @endforeach
                        </div>
                    </div>
                    <p>{!! $book->description !!}</p>

                    <div class="sidebar p-4 rounded shadow">
                        @if(auth()->check() && auth()->user()->role=='user')
                            <h4 class="widget-title">তথ্য</h4>
                            {!! $question->question ?? '' !!}
                            <hr>
                            <p><a class="btn btn-info" href="{{asset('submit-work')}}">জমা দিন</a></p>
                        @else
                            @if(!auth()->check())
                            <p class="text-center">তথ্য জমা দিতে<a
                                        href="{{route('user.login')}}?redirect={{url()->current()}}"> লগিন করুন </a></p>
                            @endif
                        @endif
                    </div>
                </div>
                <!-- BLog End -->

                <!-- START SIDEBAR -->
                <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="sidebar p-4 rounded shadow">
                        <!-- SEARCH -->
                        <div class="widget mb-4 pb-2">
                            <h4 class="widget-title">অফার</h4>
                            <div class="widget-search mt-4 mb-0">

                                <p>{{$book->reward}}</p>

                            </div>
                        </div>
                        <!-- SEARCH -->

                        <!-- CATAGORIES -->

                        <!-- CATAGORIES -->

                        <!-- RECENT POST -->

                        <!-- RECENT POST -->

                        <!-- TAG CLOUDS -->

                        <!-- TAG CLOUDS -->

                        <!-- SOCIAL -->
                        @if(!auth()->check())
                            <div class="widget">
                                <a href="{{route('user.login')}}?redirect={{url()->current()}}"
                                   class="btn btn-primary btn-block">Login</a>
                            </div>
                    @endif
                    <!-- SOCIAL -->
                     <div class="widget mt-2">
                                <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Ftekasaibd.com%2F&layout=button_count&size=large&appId=442275712930029&width=88&height=28" width="88" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                    </div>
                </div><!--end col-->
                <!-- END SIDEBAR -->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Blog End -->

@endsection
