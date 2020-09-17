<!---------------------------- অনলাইন পরীক্ষা ও কুইজ অংশ শুরু --------------->

<section id="online-exam">
    <div class="container-fulied">
        <div class="row online-left">
            <div class="col-lg-6 @if (!$switch['online_quiz']) offset-lg-3 @endif col-md-12 col-sm-12">
                @if ($switch['online_exam'])
                    <div class="text_center">
                        <h1> অনলাইন পরীক্ষা</h1>
                    </div>
                    <div class="row">
                        @if ($assessment)
                            <div class="card shadow-lg w-100 exam-preview-card justify-content-around">
                                <div class="card-body">
                                    <div class="offset-lg-2 col-8 mt-5">
                                        @if ($assessment->exam->image)
                                            <img src="{{url($assessment->exam->image)}}" class="img img-fluid mt-4" alt="{{$assessment->exam->name}}">
                                        @endif

                                        <h5 class="my-4"> পরীক্ষার নামঃ <b>{{$assessment->exam->name}}</b></h5>
                                        <h5 class="my-4"> সময়ঃ <b>{{$assessment->exam->duration}} মিনিট</b></h5>
                                        <h5 class="my-4"> শুরু হয়েছে: <b>{{$assessment->exam->start_at->format('h:m A')}}
                                            </b></h5>
                                        <a href="{{url('/exam-hall')}}" class="btn btn-success p-3 shadow-lg w-100"> পরীক্ষা
                                            বজায় রাখুন
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @elseif ($exams->isEmpty())
                            <div class="card shadow-lg w-100 exam-preview-card">
                                <div class="card-body d-flex justify-content-center align-items-center">
                                    <h2> আজ আপনার জন্য আর কোন পরীক্ষা নেই!</h2>
                                </div>
                            </div>
                        @else
                            @foreach($exams ?? [] as $exam)
                                <div class="col-lg-4 col-md-4 col-sm-6 mb-4 mt-4">
                                    <div class="card shadow-lg bg-transparent">
                                        @if (\Illuminate\Support\Facades\Storage::exists($exam->image))
                                            <img src="{{url($exam->image)}}" class="card-img-top exam-cover"
                                                 alt="{{$exam->name}}">
                                        @else
                                            <img src="/front-end/images/book1.png" class="card-img-top exam-cover"
                                                 alt="{{$exam->name}}">
                                        @endif
                                        <div class="card-img-overlay text-center">
                                            <a class="text-part" href="/exams/{{$exam->id}}/start">
                                                <h5>বিষয়</h5>
                                                <h6>{{$exam->subject->name}}</h6>
                                                <h4>{{$exam->class}}</h4>
                                                <p class="text-center text-white">Available to: <br>
                                                    {{$exam->end_at->format('d-m-Y')}}</p>
                                            </a>
                                        </div>
                                        <div class="card-footer text-center p-2" style="z-index: 1111">

                                            @include('front._partials.share',
                                               ['url' => url("/exams/{$exam->id}/start?ref=exam&id={$exam->id}")
                                           ])
                                        </div>


                                    </div>
                                </div>
                            @endforeach

                            <div class="col-lg-12 col-md-12 text-center">
                                {{$exams->links()}}
                            </div>
                        @endif
                    </div>
                @endif

            </div>

            <!---------------------------- অনলাইন পরীক্ষা part end --------------->


            <!---------------------------- অনলাইন কুইজ part start --------------->
            <div class="col-lg-6 @if (!$switch['online_exam']) offset-lg-3 @endif col-md-12 col-sm-12">
                @if ($switch['online_quiz'])
                <div class="text_center">
                    <h1>অনলাইন কুইজ</h1>
                </div>
                <div class="card mt-4 bg-transparent shadow-lg">
                    <div class="card-body">
                    @if (!auth('participant')->check())
                        <!-- IF NOT LOGGED IN -->
                        <ul class="nav nav-tabs quiz-tabs" role="tablist">
                            <li class="nav-item w-50 text-center h3">
                                <a class="nav-link active" data-toggle="tab" href="#home"><span>সাধারণ</span></a>
                            </li>
                            <li class="nav-item w-50 text-center h3">
                                <a class="nav-link" data-toggle="tab" href="#menu1"><span>অতিথি</span></a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <form id="home" class="form-inline tab-pane active"
                                  action="{{route('participants.quiz-register')}}"
                                  method="POST">
                                <div class="">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row form-group mt-3">
                                                <div class="col-lg-2 col-sm-2 col-md-2">
                                                    <label for="name">নাম:</label>
                                                </div>
                                                <div class="col-lg-10 col-md-12 col-sm-12">
                                                    <input class="form-control my-2 w-100" type="text" name="name"
                                                           id="name"
                                                           placeholder="সম্পূর্ণ নাম দিন" autocomplete="off" required/>
                                                    <input type="hidden" value="general" name="player_type"/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-lg-2 col-sm-2 col-md-2">
                                                    <label for="number">মোবাইল:</label>
                                                </div>
                                                <div class="col-lg-10 col-md-12 col-sm-12">
                                                    <input class="form-control my-2 w-100 integer"
                                                           type="text" id="number" minlength="11" autocomplete="off"
                                                           placeholder="মোবাইল নাম্বার দিন"
                                                           maxlength="11" name="phone" required/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-lg-2 col-sm-2 col-md-2">
                                                    <label for="email"> ইমেইল:</label>
                                                </div>
                                                <div class="col-lg-10 col-md-12 col-sm-12">
                                                    <input class="form-control my-2 w-100"
                                                           type="email" id="email" autocomplete="off"
                                                           placeholder="ইমেইল দিন (যদি থাকে)" name="email"
                                                    />
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-lg-10 offset-lg-2 my-2 w-100 text-right">
                                                    <div class="row justify-content-between">
                                                        <button type="submit" class="btn btn-success p-3 ml-3
                                                        shadow-lg">কুইজ শুরু
                                                        </button>
                                                        <button
                                                            type="button"
                                                            class="btn btn-primary shadow-sm p-3 mr-3 ml-auto
                                                            share-button"
                                                            data-url="{{request()->url()}}?ref=quiz"
                                                        >
                                                            <i class="fas fa-share text-white"></i> Share
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form id="menu1" class="form-inline tab-pane"
                                  action="{{route('participants.quiz-register')}}" method="post">
                                <div id="menu1" class="tab-pane">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row form-group mt-3">
                                                <div class="col-lg-2 col-sm-2 col-md-2">
                                                    <label for="email"> ইমেইল:</label>
                                                </div>
                                                <div class="col-lg-10 col-sm-12">
                                                    <input class="form-control my-2 w-100" type="text" name="id"
                                                           id="email"
                                                           placeholder="ইমেইল অথবা মোবাইল নং. দিন" autocomplete="off"
                                                           required/>
                                                    <input type="hidden" value="vip" name="player_type"/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-lg-2 col-sm-2 col-md-2">
                                                    <label for="number"> পাসওয়ার্ড:</label>
                                                </div>
                                                <div class="col-lg-10 col-sm-12">
                                                    <input class="form-control my-2 w-100" autocomplete="off"
                                                           type="password"
                                                           placeholder="পাসওয়ার্ড লিখুন"
                                                           name="password"
                                                           minlength="6"
                                                           required/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-lg-10 offset-lg-2 my-2 w-100 text-right">
                                                    <div class="row justify-content-between">
                                                        <button type="submit" class="btn btn-success p-3 ml-3
                                                        shadow-lg">কুইজ শুরু
                                                        </button>
                                                        <button
                                                            type="button"
                                                            class="btn btn-primary shadow-sm p-3 mr-3 ml-auto
                                                            share-button"
                                                            data-url="{{request()->url()}}?ref=quiz"
                                                        >
                                                            <i class="fas fa-share  text-white"></i> Share
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
                        @if ($current_quiz)
                            <form action="{{route('participants.quiz-register')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2 col-sm-12">
                                        @if ($current_quiz->image)
                                            <img src="/{{$current_quiz->image}}" class="img img-fluid" alt="">
                                        @endif
                                        <h5 class="my-4"> কুইজের নামঃ <b>{{$current_quiz->name}}</b></h5>
                                        <h5 class="my-4"> সময়ঃ <b>{{$current_quiz->duration}} মিনিট</b></h5>
                                        <h5 class="my-4"> মোট প্রশ্নসংখ্যাঃ <b>{{$current_quiz->questions->count()}} টি</b>
                                        </h5>
                                        <button type="submit" class="btn btn-success p-3 shadow-lg w-100"> এখনই শুরু করুন
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <h2> আজ আপনার জন্য আর কোন কুইজ নেই!</h2>
                        @endif
                    @else
                        @php
                            $assessment =  auth('participant')->user()->currentAssessment();
                        @endphp
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2 col-sm-12">
                                    @if ($assessment->image)
                                        <img src="/{{$assessment->image}}" class="img img-fluid" alt="">
                                    @endif
                                    <h5 class="my-4"> কুইজের নাম: <b>{{$assessment->quiz->name}}</b></h5>
                                    <h5 class="my-4"> সময়:
                                        <b> {{$assessment->quiz->duration}} মিনিট {{$assessment->participant_type ==
                                            'vip' ? '/ প্রশ্ন' : ''}}</b></h5>
                                    @if ($assessment->quiz->questions)
                                        <h5 class="my-4"> মোট প্রশ্নসংখ্যা: <b>{{$assessment->quiz->questions->count
                                        ()}} টি</b></h5>
                                    @endif

                                    @if($assessment->quiz->is_published)
                                        <h5 class="my-4"> সঠিক হয়েছে: <b
                                                class="text-success">{{$assessment->correctCount()}} টি </b></h5>
                                        <h5 class="my-4"> ভুল হয়েছে: <b class="text-danger">{{$assessment->wrongCount()}} টি</b></h5>
                                        <h5 class="my-4"> সময় লেগেছে: <b
                                                class="text-success">{{$assessment->consumedTime()}}</b></h5>
                                    @else
                                        <h2>  উত্তর এখনও পাবলিশ করা হয়নি!</h2>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!---------------------------- অনলাইন পরীক্ষা ও কুইজ অংশ শেষ --------------->

