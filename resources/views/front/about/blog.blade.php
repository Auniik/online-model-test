@extends('front.layout.master')
@section('content')
    <!-- About Start -->
    <section class="news-scroll">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="onoffswitch3">
                        <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="myonoffswitch3"
                               checked>
                        <label class="onoffswitch3-label" for="myonoffswitch3">
        <span class="onoffswitch3-inner">
            <span class="onoffswitch3-active">
                @if($news)
                    <marquee class="scroll-text">{!! $news !!}</marquee>
                @endif
                <span class="onoffswitch3-switch">আপডেট </span>
            </span>
            <span class="onoffswitch3-inactive"><span class="onoffswitch3-switch">SHOW BREAKING NEWS</span></span>
        </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section pt-0 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">
                    <div class="amaderkotha-heading bg-light text-center">
                        <h4 class="" style="padding-left:10px">বার্তা সমূহ</h4>
                    </div>
                    <div class="position-relative">
                        <div class="row m-0">
                            @foreach($blogs as $blog)
                                <div class="col-md-4 mb-1">
                                    <div class="card">
                                        <img class="card-img-top" src="{{asset($blog->image)}}" alt="Card image"
                                             height="200">
                                        <div class="card-body">
                                            <p class="card-text">{{ Str::limit($blog->short_description, 50) }}</p>
                                            <a href="{{route('blog-details',['id'=>$blog->id])}}"
                                               class="btn btn-primary">বিস্তারিত</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="float-right">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>


@endsection
