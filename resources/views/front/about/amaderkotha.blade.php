@extends('front.layout.master')
@section('content')

    <section id="about_bg">
        <div class="overlay">
            <div class="container-fulied">
                <div class="text_center animated zoomIn">
                    <h1> আমাদের সম্পর্কে</h1>
                </div>
            </div>
        </div>
    </section>

    @if($director)
    <section id="about_part">
        <div class="container-fulied">
            <div class="row online-left">
                <div class="col-lg-9 col-md-12 col-sm-12 right_side" style="margin: -8px">
                    <div class="about_content animated bounceInRight slow p-lg-5  p-sm-0 p-md-4 m-sm-0 m-md-2
                    text-white">
                          <div>
                               {!! $director->short_message !!}
                          </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center mt-5">
                            <a class="btn  text-white w-100"
                               style="background: #333333; box-shadow: 1px 1px 5px 0 #121212;"
                               href="{{route('team-members.show', $director->id)}}">বিস্তারিত</a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3 col-md-12 col-sm-12 left_side">
                    <div class="imag_side">
                        <a href="{{route('team-members.show', $director->id)}}">
                            <div class="round animated zoomIn slow">
                                <img src="{{url($director->image)}}" alt="testi_3">
                            </div>
                            <div class="text">
                                <h6>{{$director->name}}</h6>
                                <p>{{$director->designation}}</p>
                                <p>টেকসই বাংলা লি.</p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <a href="{{$director->facebook_link}}" class="social-icon mt-0" target="blank">
                                    <i class="fab fa-facebook  icon-alias" style="color: #3b5998"></i>
                                </a>

                                <a href="{{$director->twitter_link}}" class="social-icon mt-0" target="blank">
                                    <i class="fab fa-twitter icon-alias" style="color: #1DA1F2"></i>
                                </a>
                                <a href="{{$director->instagram_link}}" class="social-icon mt-0"
                                   target="blank">
                                    <i class="fab fa-instagram icon-alias" style="color: #8a2387;"></i>
                                </a>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section id="team_member">
        <div class="overlay">
            <div class="container-fulied">
                <div class="text_center">
                    <h1> টিম মেম্বার </h1>
                </div>
                <div class="row online-left">
                    @foreach ($team_members as $team_member)
                        <div class="col-lg-3 col-md-6 col-sm-6 left_side">
                            <div class="imag_side shadow">
                                <a href="{{route('team-members.show', $team_member->id)}}">
                                    <div class="round">
                                        <img src="{{url($team_member->image)}}" alt="testi_3">
                                    </div>
                                    <div class="text">
                                        <h6>{{$team_member->name}}</h6>
                                        <p>{!! $team_member->designation !!}</p>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{$team_member->facebook_link}}" class="social-icon mt-0" target="blank">
                                            <i class="fab fa-facebook  icon-alias" style="color: #3b5998"></i>
                                        </a>

                                        <a href="{{$team_member->twitter_link}}" class="social-icon mt-0" target="blank">
                                            <i class="fab fa-twitter icon-alias" style="color: #1DA1F2"></i>
                                        </a>
                                        <a href="{{$team_member->instagram_link}}" class="social-icon mt-0"
                                           target="blank">
                                            <i class="fab fa-instagram icon-alias" style="color: #8a2387;"></i>
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>


    <section id="preferred-category" class="choice_category">
        <div class="overlay">
            <div class="container-fulied">
                <div class="text_center">
                    <h1>আমাদের পরিসেবা</h1>
                </div>
                <div class="row online-left">

                    <div class="padding_none col-lg col-md-12 col-sm-6">
                        <a href="/under-construction">
                        <div class="count"> <i class="fast_icon fas fa-briefcase"></i>
                                <h1><span class="counter">চাকুরী</span></h1>

                            @include('front._partials.share', ['url' => request()->root()])
                        </div>
                        </a>
                    </div>
                    <div class="padding_none col-lg col-md-12 col-sm-6">
                        <a href="/under-construction">
                        <div class="count"> <i class="fast_icon fas fa-balance-scale"></i>
                                <h1><span class="counter">টেন্ডার</span></h1>

                            @include('front._partials.share', ['url' => request()->root()])
                        </div>
                        </a>
                    </div>
                    <div class="padding_none col-lg col-md-12 col-sm-6">
                        <a href="/under-construction">
                        <div class="count"> <i class="fast_icon fas fa-desktop"></i>
                                <h1><span class="counter">আউটসোর্সিং</span></h1>

                            @include('front._partials.share', ['url' => request()->root()])
                        </div>
                        </a>
                    </div>
                    <div class="padding_none col-lg col-md-12 col-sm-6">
                        <a href="/under-construction">
                        <div class="count"> <i class="fast_icon fas fa-mail-bulk"></i>
                                <h1><span class="counter">ই-মার্কেট</span></h1>

                            @include('front._partials.share', ['url' => request()->root()])
                        </div>
                        </a>
                    </div>
                    <div class="padding_none col-lg col-md-12 col-sm-6">
                        <a href="/under-construction">
                        <div class="count"><i class="fast_icon fas fa-user-graduate"></i>
                                <h1><span class="counter">পড়াশোনা</span></h1>

                            @include('front._partials.share', ['url' => request()->root()])
                        </div>
                        </a>
                    </div>
                    <div class="padding_none col-lg col-md-12 col-sm-6">
                        <a href="/under-construction">
                        <div class="count"><i class="fast_icon fas fa-blog"></i>
                                <h1><span class="counter">ব্লগ</span></h1>

                            @include('front._partials.share', ['url' => request()->root()])
                        </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="amaderkotha-heading bg-transparent text-center">
        <div class="container-fulied mt-4">
            <div class="text_center">
                <h1> প্রকাশনা </h1>
            </div>
        </div>
    </div>
    <section class="section pt-0 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mt-4 pt-0 mt-sm-0 pt-sm-0">
                    <div class="position-relative">
                        <div class="row m-0 d-flex justify-content-center">
                            @foreach($publications as $publication)
                                <div class="col-md-3 mb-2 mt-2">
                                    <div class="card shadow-lg">
                                        <a href="{{route('publication-details',['id' => $publication->id])}}"
                                           target="_blank">
                                            <img class="card-img-top" style="height: 300px"
                                                src="{{asset($publication->image)}}"
                                                alt="{{$publication->title}}"
                                            />
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-sm-12 text-center mt-4">
                                {{ $publications->links() }}
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>




@endsection
