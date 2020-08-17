@extends('front.master')
@section('body')

    <!-- Hero Start -->
    <section class="bg-profile d-table w-100" style="background: url('/images/account/bg.jpg') center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="public-profile position-relative p-4 bg-white overflow-hidden rounded shadow"
                         style="z-index: 1;">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-3 text-md-left text-center">
                                @if(empty(auth()->user()->image))
                                    <img src="{{asset('/')}}front/images/client/01.jpg" class="img-fluid" width="150" height="150" alt="Profile Picture">
                                @else
                                    <img src="{{asset(auth()->user()->image)}}" class="img-fluid" width="150" height="150" alt="Profile Picture">
                                @endif
                                {{--<img src="images/client/man.svg"--}}
                                     {{--class="avatar avatar-medium rounded-pill shadow d-block mx-auto" alt="">--}}
                            </div><!--end col-->

                            <div class="col-lg-10 col-md-9">
                                <div class="row align-items-center">
                                    <div class="col-md-7 text-md-left text-center mt-4 mt-sm-0">
                                        <h3 class="title mb-0">{{auth()->user()->name}}</h3>
                                    </div><!--end col-->
                                    <div class="col-md-5 text-md-right text-center">
                                        <ul class="list-unstyled profile-icons mb-0 mt-4">
                                            <li class="list-inline-item"><a href="{{route('user.profile.edit')}}"
                                                                            class="rounded-pill bg-dark"><i
                                                            class="mdi mdi-tools text-light"
                                                            title="Edit Profile"></i></a></li>
                                        </ul><!--end icon-->
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--ed container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- Profile Start -->
    <section class="section mt-60">
        <div class="container mt-lg-3">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="ml-lg-3">
                        <div class="border-bottom pb-4">
                            <h5>{{auth()->user()->name}}</h5>
                        </div>
                        @include('front.partials.notifications')
                        <div class="border-bottom pb-4">
                            <div class="row">
                                <div class="col-lg-5 mt-4">
                                    <h5>Personal Details :</h5>
                                    <ul class="list-inline mb-0 mt-4">
                                        <li>
                                            <i class="mdi mdi-email float-left text-muted mr-2"></i>
                                            <div class="overflow-hidden d-block">
                                                <h6 class="text-primary mb-0">Email :</h6>
                                                <a href="javascript:void(0)"
                                                   class="text-muted">{{auth()->user()->email}}</a>
                                            </div>
                                        </li>

                                        <li class="mt-3">
                                            <i class="mdi mdi-cake-variant float-left text-muted mr-2"></i>
                                            <div class="overflow-hidden d-block">
                                                <h6 class="text-primary mb-0">Birthday :</h6>
                                                <p class="text-muted mb-0">{{auth()->user()->birthday}}</p>
                                            </div>
                                        </li>

                                        <li class="mt-3">
                                            <i class="mdi mdi-map-marker float-left text-muted mr-2"></i>
                                            <div class="overflow-hidden d-block">
                                                <h6 class="text-primary mb-0">Location :</h6>
                                                <a href="javascript:void(0)"
                                                   class="text-muted">{{auth()->user()->location}}</a>
                                            </div>
                                        </li>
                                        <li class="mt-3">
                                            <i class="mdi mdi-map-marker float-left text-muted mr-2"></i>
                                            <div class="overflow-hidden d-block">
                                                <h6 class="text-primary mb-0">Occupation :</h6>
                                                <a href="javascript:void(0)"
                                                   class="text-muted">{{auth()->user()->occupation}}</a>
                                            </div>
                                        </li>

                                        <li class="mt-3">
                                            <i class="mdi mdi-phone float-left text-muted mr-2"></i>
                                            <div class="overflow-hidden d-block">
                                                <h6 class="text-primary mb-0">Cell No :</h6>
                                                <a href="javascript:void(0)"
                                                   class="text-muted">{{auth()->user()->contact}}</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!--end col-->
                                <div class="col-lg-7 mt-4">
                                    <h5>Submitted Work :</h5>
                                    <ul class="list-inline mb-0 mt-4">
                                        @foreach($works as $work)
                                            <li>
                                                <div class="overflow-hidden d-block" style="border: 2px solid #efefef;
border-radius: 4px;
padding: 10px;">
                                                    <span class="text-primary mb-0">Title :</span> {{$work->title}} <br>
                                                    <span class="text-primary mb-0">Work Type :</span> {{$work->work_type}}
                                                    <br>
                                                    <span class="text-primary mb-0"> বর্ণনা  :</span> {!! $work->description !!}
                                                    <br>
                                                    <span class="text-primary mb-0">File :</span> <a
                                                            href="/{{$work->file}}" target="_blank">View File</a>
                                                    <br>
                                                    <span class="text-primary mb-0">Link :</span> <a
                                                            href="{{$work->link}}" target="_blank">View Link</a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Profile End -->

@endsection
