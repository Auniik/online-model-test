<!---------------------------- অনলাইন পরীক্ষা ও কুইজ অংশ শুরু --------------->

<section id="online-exam">
    <div class="container-fulied">
        <div class="row online-left">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="text_center">
                    <h1> অনলাইন পরীক্ষা</h1>
                </div>
                <div class="row">
                    @php
                        $id = auth('participant')->id();
                        $session = session("participant-$id");
                        $assessment = $session ? $session['assessment'] : null;
                    @endphp
                    @if ($assessment)
                        <div class="card shadow-lg w-100  exam-preview-card">
                            <div class="card-body">
                                <div class="offset-lg-2 col-8">
                                    <img src="/{{$assessment->exam->image}}" class="img img-fluid" alt="">
                                    <h5 class="my-4"> পরীক্ষার নামঃ <b>{{$assessment->exam->name}}</b></h5>
                                    <h5 class="my-4"> সময়ঃ <b>{{$assessment->exam->duration}}  মিনিট</b> </h5>
                                    <h5 class="my-4">  শুরু হয়েছে: <b>{{$assessment->exam->start_at->format('h:m A')}}
                                        </b> </h5>
                                    <a href="/exam-hall" class="btn btn-success p-3 shadow-lg w-100">  পরীক্ষা
                                   বজায় রাখুন
                                    </a>
                                </div>
                            </div>
                        </div>
                        @else
                        @foreach($exams ?? [] as $exam)

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="row book-img">
                                    @if ($exam->image)
                                        <img src="{{url($exam->image)}}" alt="hero2.jpg">
                                    @else
                                        <img src="/front-end/images/book1.png" alt="hero2.jpg">
                                    @endif

                                    <div class="img-overlay text-center">
                                        <a href="/exams/{{$exam->id}}/start">
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
                    @endif
                </div>
            </div>

            <!---------------------------- অনলাইন পরীক্ষা part end --------------->


            <!---------------------------- অনলাইন কুইজ part start --------------->
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="text_center">
                    <h1>অনলাইন কুইজ</h1>
                </div>
                <div class="secound_section">
                @if (!auth('participant')->check())
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
                            {{--                                <form id="home"  class="form-inline tab-pane active" action="{{route('new-player')}}"--}}
                            <form id="home" class="form-inline tab-pane active"
                                  action="{{route('participants.quiz-register')}}"
                                  method="POST">
                                <div class="">
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
                                                           type="email" id="email" autocomplete="off"
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
                                                            শুরু
                                                        </button>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>

                            {{--                                <form id="menu1" class="form-inline tab-pane" action="{{route('new-player')}}" method="post">--}}
                            <form id="menu1" class="form-inline tab-pane"
                                  action="{{route('participants.quiz-register')}}" method="post">
                                <div id="menu1" class="tab-pane">
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
                                                    <input class="form-control" type="text" name="id" id="email"
                                                           placeholder="ইমেইল অথবা মোবাইল নং. দিন" autocomplete="off"
                                                           required/>
                                                    <input type="hidden" value="vip" name="player_type"/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-2">
                                                    <label for="number"> পাসওার্ড:</label>
                                                </div>
                                                <div class="col-10">
                                                    <input class="form-control integer" autocomplete="off"
                                                           type="password"
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
                                                            শুরু
                                                        </button>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @elseif (!auth('participant')->user()->performedCurrentQuiz())
                        <form class="mt-5 "
                              action="{{route('participants.quiz-register')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-8 offset-lg-2 mt-5">
                                    <img src="/{{$current_quiz->image}}" class="img img-fluid" alt="">
                                    <h5 class="my-4"> কুইজের নামঃ <b>{{$current_quiz->name}}</b></h5>
                                    <h5 class="my-4"> সময়ঃ <b>{{$current_quiz->duration}}  মিনিট</b></h5>
                                    <h5 class="my-4"> মোট প্রশ্নসংখ্যাঃ <b>{{$current_quiz->questions->count()}}  টি</b></h5>
                                    <button type="submit" class="btn btn-success p-3 shadow-lg w-100"> এখনই শুরু করুন
                                    </button>
                                </div>
                            </div>
                        </form>

                @else
                    @php
                       $assessment =  auth('participant')->user()->currentAssessment();
                    @endphp
                    <div class="row">
                        <div class="col-8 offset-lg-2 mt-5">
                            <img src="/{{$current_quiz->image}}" class="img img-fluid" alt="">
                            <h5 class="my-4"> কুইজের নামঃ <b>{{$current_quiz->name}}</b></h5>
                            <h5 class="my-4"> সময়ঃ <b>{{$current_quiz->duration}}  মিনিট</b> </h5>
                            <h5 class="my-4"> মোট প্রশ্নসংখ্যাঃ <b>{{$current_quiz->questions->count()}}  টি</b></h5>
                            <h5 class="my-4">  সঠিক হয়েছেঃ <b>{{$assessment->correctCount()}}  টি</b></h5>
                            <h5 class="my-4">   ভুল হয়েছেঃ <b>{{$assessment->wrongCount()}}  টি</b></h5>
                            <h5 class="my-4">    সময় লেগেছে <b>{{$assessment->consumedTime()}}</b></h5>

                        </div>
                    </div>
            </form>
            @endif

        </div>
    </div>
    </div>
    </div>
</section>

<!---------------------------- অনলাইন পরীক্ষা ও কুইজ অংশ শেষ --------------->
