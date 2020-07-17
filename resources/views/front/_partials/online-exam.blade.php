<!---------------------------- অনলাইন পরীক্ষা ও কুইজ অংশ শুরু --------------->

<section id="online-exam">
    <div class="container-fulied">
        <div class="row online-left">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="text_center">
                    <h1> অনলাইন পরীক্ষা</h1>
                </div>
                <div class="row">

                    @foreach($exams ?? [] as $exam)

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="row book-img">
                                <img src="/front-end/images/book1.png" alt="hero2.jpg">
                                <div class="img-overlay text-center">
                                    <a href="javascript:void(0)">
                                        <div class="text-part">
                                            <h5>বিষয়</h5>
                                            <h6>{{$exam->subject->name}}</h6>
                                            <p>{{$exam->class}}</p>
                                            <a href="javascript:void(0)" class="share-btn">
                                                <i class="fas fa-share"></i> Share
                                            </a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
                <ul class="pagination pagination-md justify-content-center mt-3">
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                </ul>
            </div>

            <!---------------------------- অনলাইন পরীক্ষা part end --------------->


            <!---------------------------- অনলাইন কুইজ part start --------------->
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="text_center">
                    <h1>অনলাইন কুইজ</h1>
                </div>
                <div class="secound_section">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item left-side">
                            <a class="nav-link active" data-toggle="tab" href="#home"><span>সাধারণ</span></a>
                        </li>
                        <li class="nav-item right-side">
                            <a class="nav-link" data-toggle="tab" href="#menu1"><span>অতিথি</span></a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
{{--                        <form id="home"  class="form-inline tab-pane active" action="{{route('new-player')}}"--}}
                        <form id="home" class="form-inline tab-pane active"
                              action="{{route('participants.register')}}"
                              method="POST">
{{--                        <div  class="">--}}
                            @csrf
                            @include('front.partials.notifications')
                            <div class="row">
                                <div class="col-12">
                                    <div class="row form-group">
                                        <div class="col-2">
                                            <label for="name">নাম:</label>
                                        </div>
                                        <div class="col-10">
                                            <input class="form-control" type="text" name="name" id="name"
                                                   placeholder="সম্পূর্ণ নাম দিন" autocomplete="off" required/>
                                            <input type="hidden" value="general" name="player_type"/>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-2">
                                            <label for="number">মোবাইল:</label>
                                        </div>
                                        <div class="col-10">
                                            <input class="form-control integer"
                                                   type="text" id="number" minlength="11" autocomplete="off"
                                                   placeholder="মোবাইল নাম্বার দিন"
                                                   maxlength="11" name="phone" required/>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-2">
                                            <label for="email"> ইমেইল:</label>
                                        </div>
                                        <div class="col-10">
                                            <input class="form-control"
                                                   type="email" id="email"  autocomplete="off"
                                                   placeholder="ইমেইল দিন (যদি থাকে)" name="email"
                                            />
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-10 offset-md-2 text-right ">
                                            <div class="row justify-content-between">
                                                <a href="javascript:void(0)" class="share-btn btn w-25 p-3
                                            ml-4">
                                                    <i class="fas fa-share"></i> Share
                                                </a>
                                                <button type="submit" class="btn btn-success p-3 shadow-lg w-25
                                                mr-0">কুইজ
                                                    শুরু</button>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--                        </div>--}}
                        </form>

{{--                        <form id="menu1" class="form-inline tab-pane" action="{{route('new-player')}}" method="post">--}}
                        <form id="menu1" class="form-inline tab-pane"
                              action="{{route('participants.register')}}" method="post">
                            {{--                        <div id="menu1" class="tab-pane">--}}
                            @csrf
                            @if(session()->has('warn'))
                                <div class="alert alert-warning">
                                    {{session('warn')}}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12">
                                    <div class="row form-group">
                                        <div class="col-2">
                                            <label for="email"> ইমেইল:</label>
                                        </div>
                                        <div class="col-10">
                                            <input class="form-control" type="text" name="email" id="email"
                                                   placeholder="ইমেইল দিন" autocomplete="off" required/>
                                            <input type="hidden" value="vip" name="player_type"/>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-2">
                                            <label for="number"> পাসওার্ড:</label>
                                        </div>
                                        <div class="col-10">
                                            <input class="form-control integer" autocomplete="off" type="password"
                                                   name="password"
                                                   minlength="6"
                                                   required/>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-10 offset-md-2 text-right ">
                                            <div class="row justify-content-between">
                                                <a href="javascript:void(0)" class="share-btn btn w-25 p-3
                                            ml-4">
                                                    <i class="fas fa-share"></i> Share
                                                </a>
                                                <button type="submit" class="btn btn-success p-3 shadow-lg w-25
                                                mr-0">কুইজ
                                                    শুরু</button>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!---------------------------- অনলাইন পরীক্ষা ও কুইজ অংশ শেষ --------------->
