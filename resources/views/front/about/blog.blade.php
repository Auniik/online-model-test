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


@endsection
