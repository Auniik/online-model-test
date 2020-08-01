@extends('front.layout.master')
@push('style')
    <style>
        .card {
            background-color: #ffffff5c !important;
        }
    </style>
@endpush
@section('content')

    <section class="section pt-5 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pl-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        <div class="row m-0">
                            <div class="col-md-12 mb-1">

                                <div class="card shadow-lg">
                                    <div class="row m-0">
                                        <div class="col-md-12 text-justify mt-2">
                                            <h3 class=" text-center text-justify mt-2">{{$blogs->title }} </h3>
                                        </div>
                                        <div class="col-md-12 ">
                                            <img class="rounded" style="padding: 20px" src="{{asset($blogs->image)}}"
                                                 alt="image"
                                                 height="500" width="100%">
                                        </div>
                                        <div class="col-md-9 offset-md-1 text-justify">
                                           <div class="text-right mb-5">
                                               @include('front._partials.share', ['url' => route('blog-details', $blogs)])
                                           </div>
                                            <strong>
                                                <p style="font-size:20px" class="text-justify pl-5 pr-5">{{
                                            $blogs->short_description }} </p>
                                            </strong>
                                        </div>
                                        <div class="col-md-9 offset-md-1">
                                            <p style="font-size:18px" class="pl-5 pr-5">{!!
                                            $blogs->long_description !!}  </p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

    @endsection
