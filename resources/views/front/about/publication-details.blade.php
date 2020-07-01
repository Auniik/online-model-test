@extends('front.master')
@section('body')
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
    <!-- About Start -->
    <section class="section pt-0 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        <div class="amaderkotha-heading bg-light text-center">
                            <h4 class="" style="padding-left:10px">বিস্তারিত</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-1">

                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-12 pl-5 pr-5 text-justify pt-5">
                                            <h5>{{ $publications->title	}}</h5>
                                            <p class="text-justify p-1">{{ $publications->description	}} </p>
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
        <section class="section pt-0 pb-0 mt-4">
        <div class="container mt-100 mt-60 mb-20">
            <div class="amaderkotha-heading bg-light text-center">
                        <h4 class="" style="padding-left:10px">যোগাযোগ</h4>
                    </div>
            <div class="row align-items-center">
        
                <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0 order-2 order-md-1">
                    <div class="custom-form p-4 rounded shadow">
                        <div id="message"></div>
                        <form method="post" action="{{route('send-email')}}" name="contact-form" id="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group position-relative">
                                        <label>Your Name <span class="text-danger">*</span></label>
                                        <i class="mdi mdi-account ml-3 icons"></i>
                                        <input name="name" id="name" type="text" class="form-control pl-5" placeholder="First Name :">
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-6">
                                    <div class="form-group position-relative">
                                        <label>Your Email <span class="text-danger">*</span></label>
                                        <i class="mdi mdi-email ml-3 icons"></i>
                                        <input name="email" id="email" type="email" class="form-control pl-5" placeholder="Your email :">
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <label>Comments</label>
                                        <i class="mdi mdi-comment-text-outline ml-3 icons"></i>
                                        <textarea name="message" id="comments" rows="4" class="form-control pl-5" placeholder="Your Message :"></textarea>
                                    </div>
                                </div>
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <input type="submit" name="submit" class="submitBnt btn btn-primary btn-block" value="Send Message">
                                    <div id="simple-msg"></div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->
                    </div><!--end custom-form-->
                </div><!--end col-->


                <div class="col-lg-7 col-md-6 order-1 order-md-2">
                    @foreach($contract as $contact)
                        <div class="title-heading ml-lg-4">
                            <h4 class="mb-4">Contact Details</h4>
                            <p class="text-muted">{{$contact->title}}</p>
                            <div class="contact-detail mt-3">
                                <div class="icon mt-3 float-left">
                                    <i class="mdi mdi-email-variant text-muted mdi-36px mr-3"></i>
                                </div>
                                <div class="content mt-3 overflow-hidden d-block">
                                    <h6 class="mb-0">Email</h6>
                                    <a href="mailto:contact@example.com" class="text-primary">{{$contact->email}}</a>
                                </div>
                            </div>

                            <div class="contact-detail mt-3">
                                <div class="icon mt-3 float-left">
                                    <i class="mdi mdi-phone text-muted mdi-36px mr-3"></i>
                                </div>
                                <div class="content mt-3 overflow-hidden d-block">
                                    <h6 class="mb-0">Phone</h6>
                                    <a href="tel:+152534-468-854" class="text-primary">{{$contact->phone}}</a>
                                </div>
                            </div>

                            <div class="contact-detail mt-3">
                                <div class="icon mt-3 float-left">
                                    <i class="mdi mdi-map-marker-outline text-muted mdi-36px mr-3"></i>
                                </div>
                                <div class="content mt-3 overflow-hidden d-block">
                                    <h6 class="mb-0">Location</h6>
                                    <p>{{$contact->address}}</p>
                                </div>
                            </div>

                            <div class="contact-detail mt-3">

                                <a class="from-control btn-info btn-sm" href="https://www.facebook.com/Tekasaibd/">Facebook</a>
                                <a class="from-control btn-danger btn-sm" href="https://www.youtube.com/channel/UC9uaPHkm62ydNejCAcpnm9A?fbclid=IwAR0NE_acheRoIQcwzGBiaiaAdDsVnBmmjgPxQxTHipPa56ongyg3PQcvuq0">Youtube</a>

                            </div>
                        </div>
                    @endforeach
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Rooms End -->
    <section class="section pt-0 pb-0 mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0 mt-50">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3651.5755617506265!2d90.38725201498158!3d23.762510384583454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z4Ken4Kem4KeuIOCmhuCmk-CmsuCmvuCmpiDgprngp4vgprjgp4fgpqgg4Kau4Ka-4Kaw4KeN4KaV4KeH4KafLeCnqOCnnyDgpqTgprLgpr4sIOCmj-Cnn-CmvuCmsOCmquCni-CmsOCnjeCmn-CnhyDgprDgp4vgpqEsIOCmpOCnh-CmnOCml-CmvuCmgeCmkyDgpqLgpr7gppXgpr4t4Ken4Keo4Ken4Ker!5e0!3m2!1sen!2sbd!4v1584217522801!5m2!1sen!2sbd" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->

    @endsection