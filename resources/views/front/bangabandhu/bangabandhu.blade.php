@extends('front.layout.master')
@section('content')
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
    <section class="section pt-0 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        @foreach($bangabandhus as $bangabandhu)
                            <img src="{{asset($bangabandhu->image)}}" class="" alt="" height="400px" width="100%">
                        @endforeach
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <section class="section privacy mt-0 pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-sm-0 pt-sm-0">
                    @foreach($bangabandhus as $bangabandhu)
                        <h3>{{$bangabandhu->title}}</h3><br/>
                        <p class="text-justify">
                            {!! $bangabandhu->description !!}
                        </p>
                    @endforeach
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
@endsection
