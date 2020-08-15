@extends('front.layout.master')
@push('style')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <style>
        .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }

        .gallery-content-head {
            text-align: left;
            font-size: 21px;
            margin-bottom: 10px;
            color: yellow;
            border-left: 4px solid red;
            padding-left: 12px;
        }
        .image {
            background: black;
            padding: 6px;
            border-bottom: 1px solid #343a40;
        }


        swiper-container {
            width: 100%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
        }

        .gallery-top {
            height: 80%;
            width: 100%;
        }

        .gallery-thumbs {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0;
        }

        .gallery-thumbs .swiper-slide {
            height: 100%;
            opacity: 0.4;
        }

        .gallery-thumbs .swiper-slide-thumb-active {
            opacity: 1;
        }
    </style>
@endpush
@section('content')
    <!-- About Start -->
    <section id="about_bg">
        <div class="overlay">
            <div class="container-fulied">
                <div class="text_center animated zoomIn">
                    <h1> বার্তা সমূহ </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="section pt-0 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        <div class="row m-0">
                            @foreach($blogs as $blog)
                                <div class="col-lg-4 col-md-6 col-sm-12 my-4">
                                    <div class="card shadow ">
                                        <a class="text-secondary"
                                           href="{{url("/blog-details/{$blog->id}?ref=blog&id={$blog->id}")}}">
                                            <img class="card-img-top" style="min-height: 250px" src="{{asset
                                            ($blog->image)}}"
                                                 alt="Blog image" >
                                            <div class="card-body p-2">
                                                <h6 class="card-text d-flex justify-content-between">
                                                    <h6> <strong>{!! $blog->title !!}</strong></h6>
                                                    {{ Str::limit($blog->short_description, 110) }}
                                                </h6>
                                            </div>
                                        </a>


                                        <div class="card-footer p-2">
                                            <div class="d-flex justify-content-between">
                                                {{$blog->created_at->format('M d, Y h:i A')}}
                                                @include('front._partials.share', [
                                                    'url' => url("/blog-details/{$blog->id}?ref=blog&id={$blog->id}")
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- About Start -->

    @if ($slider)
        <section class="section pt-0 pb-5">
            <div class="container-fluid bg-dark" style="padding-bottom: 40px;">
                <div class="row  text-white">
                    <div class="col-lg-7 py-5 ml-lg-5 gallery-images">
                        <a href="{{route('gallery.list')}}">
                            <h3 class="gallery-content-head"> ছবি</h3>
                        </a>

                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                @foreach($slider->photos as $photo)
                                    <div class="swiper-slide" style="background-image:url({{$photo->path}})"></div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                @foreach($slider->photos as $photo)
                                    <div class="swiper-slide" style="background-image:url({{$photo->path}})"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-5 ml-lg-0" style="height: 502px;">
                        <h3 class="gallery-content-head"> ভিডিও</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                {{--                            <div class="image d-flex">--}}
                                {{--                                <img--}}
                                {{--                                    alt="এক নজরে করোনা পরিস্থিতি । বৃহস্পতিবার ১৩ আগস্ট ২০২০"--}}
                                {{--                                    src="//paloimages.prothom-alo.com/contents/cache/images/120x68x1/uploads/media/2020/08/13/106cb8a9c89b5791bfb15a21b0efc90c-5f357f83c15bb.jpg?jadewits_media_id=1553904"--}}
                                {{--                                    style="display: block;">--}}
                                {{--                                <h6 class="pl-2">এক নজরে করোনা পরিস্থিতি । বৃহস্পতিবার ১৩ আগস্ট ২০২০</h6>--}}
                                {{--                            </div>--}}
                                {{--                            <div class="image d-flex">--}}
                                {{--                                <img--}}
                                {{--                                    alt="এক নজরে করোনা পরিস্থিতি । বৃহস্পতিবার ১৩ আগস্ট ২০২০"--}}
                                {{--                                    src="//paloimages.prothom-alo.com/contents/cache/images/120x68x1/uploads/media/2020/08/13/106cb8a9c89b5791bfb15a21b0efc90c-5f357f83c15bb.jpg?jadewits_media_id=1553904"--}}
                                {{--                                    style="display: block;">--}}
                                {{--                                <h6 class="pl-2">এক নজরে করোনা পরিস্থিতি । বৃহস্পতিবার ১৩ আগস্ট ২০২০</h6>--}}
                                {{--                            </div>--}}
                                {{--                            <div class="image d-flex">--}}
                                {{--                                <img--}}
                                {{--                                    alt="এক নজরে করোনা পরিস্থিতি । বৃহস্পতিবার ১৩ আগস্ট ২০২০"--}}
                                {{--                                    src="//paloimages.prothom-alo.com/contents/cache/images/120x68x1/uploads/media/2020/08/13/106cb8a9c89b5791bfb15a21b0efc90c-5f357f83c15bb.jpg?jadewits_media_id=1553904"--}}
                                {{--                                    style="display: block;">--}}
                                {{--                                <h6 class="pl-2">এক নজরে করোনা পরিস্থিতি । বৃহস্পতিবার ১৩ আগস্ট ২০২০</h6>--}}
                                {{--                            </div>--}}
                                {{--                            <div class="image d-flex">--}}
                                {{--                                <img--}}
                                {{--                                    alt="এক নজরে করোনা পরিস্থিতি । বৃহস্পতিবার ১৩ আগস্ট ২০২০"--}}
                                {{--                                    src="//paloimages.prothom-alo.com/contents/cache/images/120x68x1/uploads/media/2020/08/13/106cb8a9c89b5791bfb15a21b0efc90c-5f357f83c15bb.jpg?jadewits_media_id=1553904"--}}
                                {{--                                    style="display: block;">--}}
                                {{--                                <h6 class="pl-2">এক নজরে করোনা পরিস্থিতি । বৃহস্পতিবার ১৩ আগস্ট ২০২০</h6>--}}
                                {{--                            </div>--}}
                                {{--                            <div class="image d-flex">--}}
                                {{--                                <img--}}
                                {{--                                    alt="এক নজরে করোনা পরিস্থিতি । বৃহস্পতিবার ১৩ আগস্ট ২০২০"--}}
                                {{--                                    src="//paloimages.prothom-alo.com/contents/cache/images/120x68x1/uploads/media/2020/08/13/106cb8a9c89b5791bfb15a21b0efc90c-5f357f83c15bb.jpg?jadewits_media_id=1553904"--}}
                                {{--                                    style="display: block;">--}}
                                {{--                                <h6 class="pl-2">এক নজরে করোনা পরিস্থিতি । বৃহস্পতিবার ১৩ আগস্ট ২০২০</h6>--}}
                                {{--                            </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    @endif

{{--sdss--}}
    {{--    <section class="section shadow-lg my-4 py-4 mx-5">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row align-items-center">--}}
    {{--                <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">--}}
    {{--                    <div class="position-relative">--}}
    {{--                        <div class="amaderkotha-heading bg-transparent text-center">--}}
    {{--                            <h4>গ্যালারি</h4>--}}
    {{--                        </div>--}}
    {{--                        <div class="row">--}}
    {{--                            @foreach($galleris as $gallery)--}}
    {{--                                <div class="col-md-3 mb-2 mt-2">--}}
    {{--                                    <div class="card">--}}
    {{--                                        <a data-magnify="gallery" data-src="" data-caption="Tekasaibd"--}}
    {{--                                           data-group="a" href="{{asset($gallery->image)}}">--}}
    {{--                                            <img class="card-img-top" src="{{asset($gallery->image)}}"--}}
    {{--                                                 alt="Card image cap" width="100%" height="300">--}}
    {{--                                        </a>--}}
    {{--                                        --}}{{--<a href="#"><img class="card-img-top" src="{{asset($gallery->image)}}" alt="Card image cap" height="250"></a>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            @endforeach--}}
    {{--                            <div class="col-sm-12 col-sm-offset-6">--}}
    {{--                                {{ $galleris->links() }}--}}
    {{--                            </div>--}}

    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div><!--end col-->--}}
    {{--            </div><!--end row-->--}}
    {{--        </div><!--end container-->--}}
    {{--    </section>--}}

    {{--    <section class="section shadow-lg my-4 py-4 mx-5">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row align-items-center">--}}
    {{--                <div class="col-lg-12 col-md-12 mt-4 pt-0 pr-0 pl-0 mt-sm-0 pt-sm-0">--}}
    {{--                    <div class="position-relative">--}}
    {{--                        --}}{{--<div class="amaderkotha-heading bg-light text-center">--}}
    {{--                        --}}{{--<h4 class="" style="padding-left:10px">গ্যালারী</h4>--}}
    {{--                        --}}{{--</div>--}}
    {{--                        <div class="row m-0">--}}
    {{--                            <div class="col-md-9">--}}
    {{--                                @foreach($eventvideos as $eventvideo)--}}
    {{--                                    <div class="embed-responsive embed-responsive-16by9">--}}
    {{--                                        <iframe class="embed-responsive-item" src="{{$eventvideo->link}}"--}}
    {{--                                                allowfullscreen></iframe>--}}
    {{--                                    </div>--}}
    {{--                                @endforeach--}}
    {{--                            </div>--}}
    {{--                            <div class="col-md-3">--}}
    {{--                                @foreach($youtubes as $youtube )--}}
    {{--                                    <div class="embed-responsive embed-responsive-21by9 mb-1">--}}
    {{--                                        <iframe width="722" height="200" src="{{$youtube->link}}" frameborder="0"--}}
    {{--                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"--}}
    {{--                                                allowfullscreen></iframe>--}}
    {{--                                    </div>--}}
    {{--                                @endforeach--}}
    {{--                                {{ $youtubes->links() }}--}}
    {{--                            </div>--}}

    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div><!--end col-->--}}
    {{--            </div><!--end row-->--}}
    {{--        </div><!--end container-->--}}
    {{--    </section>--}}


@endsection

@push('script')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // var swiper = new Swiper('.swiper-container', {
        //     speed: 600,
        //     parallax: true,
        //     pagination: {
        //         el: '.swiper-pagination',
        //         clickable: true,
        //     },
        //     navigation: {
        //         nextEl: '.swiper-button-next',
        //         prevEl: '.swiper-button-prev',
        //     },
        // });

        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 4,
            loop: true,
            freeMode: true,
            loopedSlides: 5, //looped slides should be the same
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
            loop: true,
            loopedSlides: 5, //looped slides should be the same
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs,
            },
        });
    </script>
@endpush
