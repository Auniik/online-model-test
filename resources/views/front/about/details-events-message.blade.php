@extends('front.layout.master')
@section('content')
    <!-- About Start -->
    <section class="section pt-0 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        <div class="row">
                            <div class="col-md-12 mb-1">
                                <div class="card bg-transparent shadow-lg px-5 mt-2">
                                    <div class="card-header text-center">
                                        <h4 class="mt-4">বিস্তারিত</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 pl-5 pr-5 text-justify"><p
                                                    class="text-justify p-1">{!! $eventmessages->message !!} </p></div>
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
