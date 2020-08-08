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
        <h4 class="my-2 display-4" >বার্তা সমূহ</h4>
    </div>
    <section class="section pt-0 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        <div class="row m-0">
                            @foreach($blogs as $blog)
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow-lg">
                                        <img class="card-img-top" src="{{asset($blog->image)}}" alt="Card image"
                                             height="300">
                                        <div class="card-body justify-content-between">
                                            <h5 class="card-text d-flex justify-content-between">
                                                {{ Str::limit($blog->short_description, 50) }}
                                                <a href="{{url("/blog-details/{$blog->id}?ref=blog&id={$blog->id}")}}"
                                                   class="btn btn-link pull-right">বিস্তারিত</a>
                                            </h5>
                                            <div class="text-center">
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


@endsection
