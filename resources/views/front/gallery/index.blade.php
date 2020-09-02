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

<section id="about_bg">
    <div class="overlay">
        <div class="container-fulied">
            <div class="text_center animated zoomIn">
                <h1>  গ্যালারী </h1>
            </div>
        </div>
    </div>
</section>
<section class="section pt-0 pb-5">
    <div class="container-fluid">

        <div class="row align-items-center my-4">
            <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">
                <div class="position-relative ">
                    <div class="row m-0 justify-content-center">
                        @foreach($galleries as $gallery)
                        <div class="col-lg-3 col-md-4 col-sm-6 my-4">
                            <div class="card shadow-sm ">
                                <a href="{{route('galleries.show', $gallery)}}">
                                    <img class="card-img-top" style="min-height: 250px" src="{{asset
                                        ($gallery->image)}}"
                                         alt="image" >
                                    <div class="card-body p-2">
                                        <h6 class="card-text d-flex justify-content-between">
                                            <h5 class="text-center">{{$gallery->title}}</h5>
                                        </h6>
                                    </div>
                                </a>

                                <div class="card-footer ">
                                    <div class="d-flex justify-content-between">
                                            {!! $gallery->date ? $gallery->date->format('M d, Y h:i A') : '&nbsp;'!!}
                                        @include('front._partials.share', [
                                            'url' =>''
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $galleries->links() }}
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>

@endsection
