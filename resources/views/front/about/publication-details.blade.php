@extends('front.layout.master')
@section('content')
    <!-- About Start -->
    <section class="section mt-4 pt-0 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-2 pt-0 mt-sm-0 pt-sm-0">
                    <div class="card shadow-lg bg-transparent">
                        <div class="card-body">
                            <div class="position-relative ">
                                <div class="row">
                                    <div class="col-md-12 mb-1">

                                        <div class="row">
                                            <div class="col-md-12 pl-5 pr-5 text-justify pt-5">
                                                <h5 class="text-center">{{ $publications->title	}}</h5>
                                                <p class="text-justify p-1">{!! $publications->description	 !!}  </p>
                                            </div>
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
