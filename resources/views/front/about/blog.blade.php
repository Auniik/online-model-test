@extends('front.layout.master')
@push('style')
    <style>
        .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }
    </style>
@endpush
@section('content')
    <!-- About Start -->
    <div class="amaderkotha-heading bg-transparent text-center">
        <h4 class="my-3 display-4" >বার্তা সমূহ</h4>
    </div>
    <section class="section pt-0 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        <div class="row m-0">
                            @foreach($blogs as $blog)
                                <div class="col-lg-4 col-md-6 col-sm-12 my-4">
                                    <div class="card shadow-lg ">
                                        <a class="text-secondary" href="{{url("/blog-details/{$blog->id}?ref=blog&id={$blog->id}")}}">
                                            <img class="card-img-top h-auto" src="{{asset($blog->image)}}" alt="Card
                                            image"
                                            >
                                            <div class="card-body p-2" style="height: 99px;">
                                                <h6 class="card-text d-flex justify-content-between">
                                                    {{ Str::limit($blog->short_description, 50) }}
                                                </h6>
                                                <span>
                                    {{$blog->created_at->format('M d, Y h:i A')}}
                                </span>
                                            </div>
                                        </a>


                                        <div class="card-footer ">
                                            <div class="d-flex justify-content-center">
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
    <div class="shadow-lg my-4 py-4 mx-5">
        <div class="amaderkotha-heading bg-transparent text-center">
            <h4 class="my-3 display-4" > প্রকাশনা </h4>
        </div>
        <section class="section pt-0 pb-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">
                        <div class="position-relative">
                            <div class="row m-0">
                                <div class="row d-flex justify-content-between">
                                    @foreach($publications as $publication)
                                        <div class="col-md-3 mb-2 mt-2">
                                            <div class="card shadow-lg">
                                                <a href="{{route('publication-details',['id'=>$publication->id])}}"
                                                   target="_blank"><img class="card-img-top"
                                                                        src="{{asset($publication->image)}}"
                                                                        alt="Card image cap" width="100%" height="300"></a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-sm-12 col-sm-offset-6">
                                        {{ $publications->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
    </div>

    <section class="section shadow-lg my-4 py-4 mx-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        <div class="amaderkotha-heading bg-transparent text-center">
                            <h4>গ্যালারি</h4>
                        </div>
                        <div class="row">
                            @foreach($galleris as $gallery)
                                <div class="col-md-3 mb-2 mt-2">
                                    <div class="card">
                                        <a data-magnify="gallery" data-src="" data-caption="Tekasaibd"
                                           data-group="a" href="{{asset($gallery->image)}}">
                                            <img class="card-img-top" src="{{asset($gallery->image)}}"
                                                 alt="Card image cap" width="100%" height="300">
                                        </a>
                                        {{--<a href="#"><img class="card-img-top" src="{{asset($gallery->image)}}" alt="Card image cap" height="250"></a>--}}
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-sm-12 col-sm-offset-6">
                                {{ $galleris->links() }}
                            </div>

                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

    <section class="section shadow-lg my-4 py-4 mx-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 pr-0 pl-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        {{--<div class="amaderkotha-heading bg-light text-center">--}}
                        {{--<h4 class="" style="padding-left:10px">গ্যালারী</h4>--}}
                        {{--</div>--}}
                        <div class="row m-0">
                            <div class="col-md-9">
                                @foreach($eventvideos as $eventvideo)
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="{{$eventvideo->link}}"
                                                allowfullscreen></iframe>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-3">
                                @foreach($youtubes as $youtube )
                                    <div class="embed-responsive embed-responsive-21by9 mb-1">
                                        <iframe width="722" height="200" src="{{$youtube->link}}" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                    </div>
                                @endforeach
                                {{ $youtubes->links() }}
                            </div>

                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>


@endsection
