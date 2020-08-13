<!---------------------------- যোগাযোগ অংশ শুরু --------------->

<section id="communication-part">
    <div class="container-fulied contact-form">
        @if (request()->path() != 'contact')
            <div class="text_center">
                <h1>যোগাযোগ</h1>
            </div>
        @endif

        <div class="row shadow-lg m-lg-5 m-md-4">
            <div class="col-lg-4 col-md-12 col-sm-12 animated bounceInLeft slow">

                <div class="contact-form title-heading p-4 p-lg-4 p-md-5 p-sm-5 ">
                    <p class="text-muted">{{$contacts->title}}</p>
                    <div class="contact-detail mt-3">
                        <div class="icon mt-3 float-left">
                            <i class="fas fa-envelope mr-3"></i>
                        </div>
                        <div class="content mt-3 overflow-hidden d-block">
                            <h6 class="mb-0">ইমেইল :</h6>
                            <a href="mailto:tekasai100@gmail.com" style="font-family: 'Changa', sans-serif;"
                               class="text-primary">{{$contacts->email}}</a>
                        </div>
                    </div>

                    <div class="contact-detail mt-3">
                        <div class="icon mt-3 float-left">
                            <i class="fas fa-phone-square-alt mr-3"></i>
                        </div>
                        <div class="content mt-3 overflow-hidden d-block">
                            <h6 class="mb-0">মোবাইল :</h6>
                            <a href="#" class="text-primary">{{$contacts->phone}}</a>
                        </div>
                    </div>

                    <div class="contact-detail mt-3">
                        <div class="icon mt-3 float-left">
                            <i class="fas fa-map-marker-alt mr-3"></i>
                            <!--                                    <i class="fas fa-map-marker-alt"></i>-->
                        </div>
                        <div class="content mt-3 overflow-hidden d-block">
                            <h6 class="mb-0">লোকেশন :</h6>
                            <p>{{$contacts->address}}</p>
                        </div>
                    </div>

                    <div class="contact-detail">
                        <div class="d-flex">
                            <a href="https://www.facebook.com/Tekasaibd/" class="social-icon mt-0" target="blank">
                                <i class="fab fa-facebook  icon-alias" style="color: #3b5998"></i>
                            </a>

                            <a href="https://www.youtube.com/channel/UC9uaPHkm62ydNejCAcpnm9A?fbclid=IwAR0NE_acheRoIQcwzGBiaiaAdDsVnBmmjgPxQxTHipPa56ongyg3PQcvuq0"
                               class="social-icon mt-0"
                               target="blank">
                                <i class="fab fa-youtube icon-alias" style="color: #f21d1d"></i>
                            </a>
                            <a href="https://twitter.com/" class="social-icon mt-0" target="blank">
                                <i class="fab fa-twitter icon-alias" style="color: #1DA1F2"></i>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 contact_right animated bounceInRight slow">

                <form class="contact-form p-4 p-lg-4 p-md-5 p-sm-5" action="{{route('send-email')}}" method="post">
                    @if(Session::has('sent'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{session('sent')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-lg-12 col-md-12 mb-2">
                            <label>নাম:</label>
                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100"
                                   class="form-control" name="name" placeholder="সম্পূর্ণ নাম দিন" id="name" required=""
                                   autocomplete="off">
                        </div>
                        <div class="form-group col-lg-12 col-md-12">
                            <label>ইমেইল:</label>
                            <input type="email" value="" data-msg-email="Please enter a valid email address"
                                   maxlength="100" placeholder="ইমেইল দিন" class="form-control" name="email" id="email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group last-form col">
                            <label style="margin-top: 18px;">মতামত:</label>
                            <textarea maxlength="1000" data-msg-required="Please enter your message." rows="7"
                                      class="form-control" name="comment" placeholder="মতামত দিন"
                                      required=""></textarea>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" id="text" value="Send Message">
                        <label class="submit_btn" for="text">সাবমিট</label>
                    </div>
                </form>
            </div>


            <div class="col-lg-4 col-md-12 col-sm-12 animated bounceInLeft slow">

                <div class="amaderkotha-heading bg-primary text-center">
                    <h4 class="p-2" style="padding-left:10px; color:#fff;">ফেসবুকে আমাদের সাথে থাকুন</h4>

                </div>
                <div class="text-center">
                    <div class="fb-page" data-href="https://www.facebook.com/Tekasaibd/" data-tabs="timeline"
                         data-width="390" data-height="390" data-small-header="false" data-adapt-container-width="true"
                         data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/Tekasaibd/" class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/Tekasaibd/">টেকসই বিডি</a></blockquote>
                    </div>

                </div>
            </div>
        </div>

</section>

<!---------------------------- যোগাযোগ অংশ শেষ --------------->


<!---------------------------- লোকেশন অংশ শুরু --------------->

<section id="location-part">
    <div class="container-fulied">
        <div class="location">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3651.5755617506265!2d90.38725201498158!3d23.762510384583454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z4Ken4Kem4KeuIOCmhuCmk-CmsuCmvuCmpiDgprngp4vgprjgp4fgpqgg4Kau4Ka-4Kaw4KeN4KaV4KeH4KafLeCnqOCnnyDgpqTgprLgpr4sIOCmj-Cnn-CmvuCmsOCmquCni-CmsOCnjeCmn-CnhyDgprDgp4vgpqEsIOCmpOCnh-CmnOCml-CmvuCmgeCmkyDgpqLgpr7gppXgpr4t4Ken4Keo4Ken4Ker!5e0!3m2!1sen!2sbd!4v1584217522801!5m2!1sen!2sbd"
                style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" width="100%" height="400"
                frameborder="0"></iframe>
        </div>
    </div>
</section>

<!---------------------------- লোকেশন অংশ শেষ --------------->


<!---------------------------- শেষ অংশ শুরু --------------->


<div class="footer_part">
    <div class="container-fulied">
        <div class=" row online-left">
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="logo_section">
                    <a href="/"><img src="/front-end/images/logo-1.png" alt="logo-1.png"></a>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="f_text text-center mt-2">
                    <ul class="list-unstyled text-sm-center mb-0">
                        <li class="list-inline-item"><a href="{{route('contact')}}" target="_blank">Contact</a></li>
                        <li class="list-inline-item"><a href="{{url('/about')}}" target="_blank">Mission
                                Vision</a></li>
                        <li class="list-inline-item"><a href="/terms-and-conditions" target="_blank">Terms & Conditions</a>
                        </li>
                        <li class="list-inline-item"><a href="{{url('/privacy')}}" target="_blank">Privacy
                                Policy</a></li>
                    </ul>
                    <p>{{$contacts->address}}</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">

                <div class="contact-detail last-icon">

                    <a class="from-control btn-sm" href="https://www.facebook.com/Tekasaibd/" target="_blank"><i
                            class="fab fa-facebook"></i></a>

                    <a class="from-control btn-sm"
                       href="https://www.youtube.com/channel/UC9uaPHkm62ydNejCAcpnm9A?fbclid=IwAR0NE_acheRoIQcwzGBiaiaAdDsVnBmmjgPxQxTHipPa56ongyg3PQcvuq0"
                       target="_blank"><i class="fab fa-youtube" style="background: red;"></i></a>

                    <a class="from-control btn-sm" href="javascript:void(0)" target="_blank"><i
                            class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!---------------------------- শেষ অংশ শেষ --------------->


<!---------------------------- কপিরাইট অংশ শুরু --------------->

<section class="copyright">
    <span class="woww">
        <p class="footer-company-name">Copyright © 2020 {{env('APP_NAME')}} All Right Reserved. Designed by <a
                href="javascript:void(0)" target="_blank"> Md Hafizul Islam</a>
            Developed by <a
                href="https://auniik.github.io" target="_blank"> Anik Datta</a>
        </p>
    </span>
</section>

<!---------------------------- কপিরাইট অংশ শেষ --------------->

