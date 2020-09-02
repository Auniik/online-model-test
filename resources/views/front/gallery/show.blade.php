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
    <style>

    </style>
@endpush
@section('content')

    <section id="about_bg">
        <div class="overlay">
            <div class="container-fulied">
                <div class="text_center animated zoomIn">
                    <h1> {{$gallery->title}} </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="section pt-0 pb-5">
        <div class="container-fluid">

            <div class="row align-items-center my-4">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative ">
                        <div class="row m-0 justify-content-center">
                            @foreach($gallery->photos as $photo)
                                <div class="col-lg-3 col-md-4 col-sm-6 my-4">
                                    <div class="card shadow-sm ">
                                        <a data-magnify="gallery" data-caption="{{$photo->name}}"
                                           href="{{asset($photo->path)}}">
                                            <img src="{{asset($photo->path)}}"   class="img-fluid shadow" alt="">
                                        </a>

                                        <div class="card-footer ">
                                            <div class="d-flex justify-content-between">
                                                @include('front._partials.share', [
                                                    'url' =>''
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

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
