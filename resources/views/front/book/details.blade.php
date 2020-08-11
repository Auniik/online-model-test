@extends('front.layout.master')
@push('style')
    <link href="/front-end/magnify/jquery.magnify.css" rel="stylesheet">
    <style>
        .magnify-modal {
            box-shadow: 0 0 6px 2px rgba(0, 0, 0, 0.3);
        }

        .magnify-header .magnify-toolbar {
            background-color: rgba(0, 0, 0, .5);
        }

        .magnify-stage {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            border-width: 0;
        }

        .magnify-footer {
            bottom: 10px;
        }

        .magnify-footer .magnify-toolbar {
            background-color: rgba(0, 0, 0, .5);
            border-radius: 5px;
        }

        .magnify-loader {
            background-color: transparent;
        }

        .magnify-header,
        .magnify-footer {
            pointer-events: none;
        }

        .magnify-button {
            pointer-events: auto;
        }
    </style>
@endpush
@section('content')

    <!-- Blog STart -->
    <section class="section pt-0" style="margin-top:20px !important">
        <div class="container">
            <div class="row shadow-lg">
                <!-- BLog Start -->
                <div class="col-lg-8 col-md-6">
                    <h2 class="my-4">{{$book->title}}</h2>
                    <div class="mr-lg-2">
                        <div class="row">
                            @foreach($book->images as $image)
                                <div class="col-lg-4 mb-4 pb-2">
                                    <a data-magnify="gallery" data-caption="Rémi Bizouard triple champion du monde by malainxx24"
                                       href="{{asset($image->image)}}">
                                        <img src="{{asset($image->image)}}" class="img-fluid shadow" alt="">
                                    </a>
                                </div><!--end col-->
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <p>{!! $book->description !!}</p>
                    <div class="sidebar p-4 rounded">
                        @if(auth('participant')->check())
                            <h4 class="widget-title">তথ্য</h4>
                            {!! $question->question ?? '' !!}
                            <hr>
                            <p><a class="btn btn-info" href="{{url('submit-work?ref=creativity')}}">জমা দিন</a></p>
                        @else
                            @if(!auth('participant')->check())
                            <p class="text-center">তথ্য জমা দিতে <a class="btn btn-sm btn-primary"
                                        href="{{route('participants.login')}}?next={{request()->path()}}"> লগিন করুন
                                </a></p>
                            @endif
                        @endif
                    </div>
                </div>
                <!-- BLog End -->

                <!-- START SIDEBAR -->
                <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0 pr-0">
                    <div class="sidebar p-4 rounded shadow">
                        <!-- SEARCH -->
                        <div class="widget mb-4 pb-2">
                            <h4 class="widget-title">অফার</h4>
                            <div class="widget-search mt-4 mb-0">

                                <p>{{$book->reward}}</p>

                                <img class="w-100 shadow" src="/{{$book->reward_image}}" alt="{{$book->title}}">
                            </div>
                        </div>
                        <!-- SEARCH -->

                        <!-- SOCIAL -->

                    <!-- SOCIAL -->
                         <div class="widget mt-2">
                            @include('front._partials.share', [
                                'url' => url("/book/details/{$book->id}?ref=book&id={$book->id}")
                            ])
                        </div>
                    </div>
                </div><!--end col-->
                <!-- END SIDEBAR -->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Blog End -->

@endsection

@push('script')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/front-end/magnify/jquery.magnify.js"></script>
    <script>
        $('[data-magnify]').magnify({
            headToolbar: [
                'close'
            ],
            initMaximized: true
        });

    </script>
    <script>

    </script>
@endpush
