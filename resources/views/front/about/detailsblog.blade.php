@extends('front.layout.master')
@push('style')
    <style>
        .card {
            background-color: #ffffff5c !important;
        }
        @media  print
        {
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
        @media  screen
        {
            .no-screen, .no-screen *
            {
                display: none !important;
            }
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

                                <div class="card shadow-lg "  id="print-this">
                                    <div class="row m-0">
                                        <div class="col-md-12 text-justify mt-2">
                                            <h3 class=" text-center text-justify mt-2">{{$blogs->title }} </h3>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <img class="rounded" style="padding: 20px; object-fit: contain;"
                                                 src="{{asset($blogs->image)}}"
                                                 alt="image" width="100%">
                                            <div class="ml-4 d-flex justify-content-between">
                                                <div class="">
                                                    {{$blogs->created_at->format('M d, Y h:i A')}}
                                                </div>
                                                <div class="mb-5 no-print mr-4">
                                                    @include('front._partials.share', [
                                                         'url' => url("/blog-details/{$blogs->id}?ref=blog&id={$blogs->id}")
                                                    ])
                                                    <button type="button"
                                                            class="btn btn-sm btn-secondary"
                                                            onclick="printDiv('print-this')"
                                                            style=""><i
                                                            class="fa fa-print text-white"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 offset-md-1 text-justify">

                                            <strong>
                                                <p style="font-size:20px" class="text-justify px-lg-5 px-sm-0">{{
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
@section('script')
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
