@extends('front.layout.master')
@section('content')

    <section class="section privacy mt-0 pt-0">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-10 offset-md-1 col-md-12 mt-sm-0 pt-5"
                     style="font-size: 18px"
                >
                    @foreach($bangabandhus as $bangabandhu)
                        <img src="{{asset($bangabandhu->image)}}" class="shadow-lg" alt=""  height="400" width="100%">
                    @endforeach
                    <div class="card shadow-lg p-5">
                        <div class="card-body">

                    @foreach($bangabandhus as $bangabandhu)
                        <h3>{{$bangabandhu->title}}</h3>
                        <p class="text-justify">
                                <div class="text-right mb-5">
                                    @include('front._partials.share', ['url' => url('/bangabandhu')])
                                </div>
                            {!! $bangabandhu->description !!}
                        </p>
                    @endforeach
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
@endsection
