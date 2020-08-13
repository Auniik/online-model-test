@extends('front.layout.master')
@section('content')
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
                                            <div class="col-md-12 px-lg-5 px-sm-1 px-md-5 text-justify pt-2">
                                                <h4 class="text-center">{{ $publication->title	}}</h4>
                                                <p class="text-justify p-1">{!! $publication->description	 !!}  </p>
                                                @if ($publication->file)
                                                    <iframe
                                                        class="my-4 my-sm-1 "
                                                        src="/{{$publication->file}}"
                                                        frameBorder="0"
                                                        scrolling="auto"
                                                        height="700px"
                                                        width="100%"
                                                    ></iframe>
                                                @endif
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
