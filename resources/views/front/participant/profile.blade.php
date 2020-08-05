@extends('front.layout.master')
@section('content')

    <!-- Hero Start -->
    <section class="bg-profile w-100 ">
        <div class="container">
            <div class="row ml-1 mb-5 mt-5">
                <div class="col-lg-12">
                    <div
                        class="public-profile position-relative p-4 bg-white overflow-hidden rounded shadow bg-transparent"
                        style="z-index: 1;">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-3 text-md-left text-center">
                                <img src="{{asset('/')}}front/images/client/student.png"
                                     class="img-fluid avatar avatar-medium rounded-pill" width="150"
                                     height="150" alt="Profile Picture">
                                <img src="images/client/man.svg"
                                     class="avatar avatar-medium rounded-pill shadow d-block mx-auto" alt="">
                            </div><!--end col-->

                            <div class="col-lg-10 col-md-9">
                                <div class="row justify-content-between">
                                    <div class="col-md-7 text-md-left text-center mt-4 mt-sm-0">
                                        <h3 class="title mb-0">{{$participant->name}}</h3>
                                        <p class="mb-0">Email: <span
                                                class="text-muted">{{$participant->email}}</span></p>
                                        <p class="mb-0">Mobile No.: <span
                                                class="text-muted">{{$participant->mobile_number}}</span></p>

                                    </div><!--end col-->

                                    <div class="test">
                                        @if ($participant->school_name)
                                            <h6 class="text-primary mb-0">School Name :</h6>
                                            <p>{{$participant->school_name}}</p>
                                        @endif
                                        @if ($participant->class)
                                            <h6 class="text-primary mb-0">Class : <span class="text-dark"
                                                >{{$participant->class}}</span></h6>
                                        @endif
                                        @if ($participant->roll)
                                            <h6 class="text-primary mb-0">Roll : <span class="text-dark"
                                                >{{$participant->roll}}</span></h6>

                                        @endif
                                        @if ($participant->sub_district)
                                            <h6 class="text-primary mb-0">Sub District : <span class="text-dark"
                                                >{{$participant->sub_district}}</span></h6>

                                        @endif
                                        @if ($participant->district)
                                            <h6 class="text-primary mb-0">District : <span class="text-dark"
                                                >{{$participant->district}}</span></h6>

                                        @endif
                                        @if ($participant->division)
                                            <h6 class="text-primary mb-0">Division : <span class="text-dark"
                                                >{{$participant->division}}</span>
                                            </h6>

                                        @endif
                                    </div>
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
                @if ($submitted_works->count())
                    <div class="col-lg-12 col-md-12 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="ml-lg-3">
                            <div class="card shadow-lg bg-transparent mb-5">
                                <div class="card-header">
                                    <h5 class="text-center">Submitted Works ({{$submitted_works->count()}})</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($submitted_works ?? [] as $work)
                                            <div class="col-lg-6">
                                                <ul class="list-inline mb-0 mt-4 pl-4">

                                                    <li>
                                                        <span class="text-primary mb-0">Title :</span> {{$work->title}}
                                                        <br>
                                                        <span
                                                            class="text-primary mb-0">Work Type :</span> {{$work->work_type}}
                                                        <br>
                                                        <span
                                                            class="text-primary mb-0">Description :</span> {!! $work->description !!}
                                                        <br>
                                                        <div class="text-primary mb-0">File(s) :</div>
                                                        @foreach($work->file ?? [] as $k => $file)
                                                            <div>
                                                                <a href="/{{$file}}" class="ml-5"
                                                                   target="_blank">{{++$k}}
                                                                    . {{$work->fileName($file)}}</a>
                                                            </div>

                                                        @endforeach
                                                        <br>
                                                        <span class="text-primary mb-0">Link :</span> <a
                                                            href="{{$work->link}}" target="_blank">View Link</a>
                                                        <br>
                                                        <span class="text-primary mb-0">Sent at: </span>
                                                        {{$work->created_at->diffForHumans()}}
                                                        ({{$work->created_at->format('M d, Y h:i A')}})
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <div class="text-center">
                                        {{
                                            $submitted_works->appends([
                                                'exams' => $exams->currentPage(),
                                                'quizzes' => $quizzes->currentPage(),
                                            ])
                                        }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                @endif

                <div class="col-lg-12 col-md-12 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="ml-lg-3">
                        <div class="pb-4">
                            <div class="row">
                                @if ($quizzes->count())
                                    <div class="col-lg-6 pb-4">
                                        <div class="card shadow-lg bg-transparent">
                                            <div class="card-header">
                                                <h5 class="text-center">Participated Quizzes
                                                    ({{$quizzes->count()}})</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-inline mb-0 pl-4">
                                                    @foreach($quizzes ?? [] as $assessment)
                                                        <li>
                                                            {{--                                                <div class="overflow-hidden d-block">--}}
                                                            <span class="text-primary mb-0">Name :</span>
                                                            {{$assessment->quiz->name}} <br>
                                                            <span class="text-primary mb-0">Duration :</span>
                                                            {{$assessment->quiz->duration}}
                                                            <br>
                                                            <span class="text-primary mb-0">Participated ? :</span>
                                                            {{$assessment->is_attended ? 'Yes' : 'No'}}
                                                            <br>
                                                            @if ($assessment->is_attended)
                                                                <span class="text-primary mb-0"> Participated at :
                                                        {{$assessment->created_at->diffForHumans()}}
                                                    ({{$assessment->created_at->format('M d, Y h:i A')}})
                                                    </span><br>

                                                            @endif
                                                            @if ($assessment->quiz->is_published)
                                                                <span class="text-primary mb-0">Correct Answer :</span>
                                                                {{$assessment->correctCount()}}
                                                                <br>
                                                                <span class="text-primary mb-0">Wrong Answer :</span>
                                                                {{$assessment->wrongCount()}}
                                                                <br>
                                                                <span class="text-primary mb-0">Consumed Time :</span>
                                                                {{$assessment->consumedTime()}}
                                                                <br>
                                                            @else
                                                                Result: Not Published yet
                                                            @endif
                                                        </li>
                                                        @if (!$loop->last)
                                                            <hr>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-center">
                                                    {{
                                                        $quizzes->appends([
                                                            'exams' => $exams->currentPage(),
                                                            'works' => $submitted_works->currentPage(),
                                                        ])
                                                    }}
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                @endif

                                @if ($exams->count())
                                    <div class="col-lg-6">
                                        <div class="card shadow-lg bg-transparent">
                                            <div class="card-header">
                                                <h5 class="text-center ">Participated Online Exams
                                                    ({{$exams->count()}})</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-inline mb-0 pl-4">
                                                    @foreach($exams ?? [] as $assessment)
                                                        <li>
                                                            {{--                                                <div class="overflow-hidden d-block">--}}
                                                            <span class="text-primary mb-0">Name :</span>
                                                            {{$assessment->exam->name}} <br>
                                                            <span class="text-primary mb-0">Duration :</span>
                                                            {{$assessment->exam->duration}}
                                                            <br>
                                                            <span class="text-primary mb-0">Participated ? :</span>
                                                            {{$assessment->start_at ? 'Yes' : 'No'}}
                                                            <br>
                                                            <span class="text-primary mb-0">Exam Date (within):</span>
                                                            @if($assessment->exam->start_at == $assessment->exam->end_at)
                                                                {{$assessment->exam->start_at->format('M d, Y')}} (All
                                                                Day)
                                                            @else
                                                                from {{$assessment->exam->start_at->format('M d, Y')}}
                                                                to
                                                                {{$assessment->exam->end_at->format('M d, Y')}}

                                                            @endif

                                                            <br>
                                                            @if ($assessment->start_at)
                                                                <span class="text-primary mb-0"> Exam Started at :
                                                        ({{$assessment->created_at->format('M d, Y h:i A')}})
                                                    </span><br>
                                                            @endif
                                                            @if ($assessment->end_at)
                                                                <span class="text-primary mb-0"> Exam End at :
                                                    ({{$assessment->created_at->format('M d, Y h:i A')}})
                                                    </span><br>
                                                            @endif
                                                            @if ($assessment->exam->is_published)
                                                                <span class="text-primary mb-0">Result :</span>
                                                                {{$assessment->totalRemarks()}} out of
                                                                {{$assessment->exam->totalRemarks()}}
                                                                ({!! $assessment->totalRemarks()
                                                                >= $assessment->exam->competency_score ?

                                                                 '<strong class="text-success">উত্তীর্ণ</strong>'
                                                                 : '<strong class="text-success">অনুত্তীর্ণ</strong>'

                                                                !!})
                                                            @else
                                                                Result: Not Published yet
                                                            @endif
                                                        </li>
                                                        @if (!$loop->last)
                                                            <hr>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-center">
                                                    {{
                                                        $exams->appends([
                                                            'quizzes' => $quizzes->currentPage(),
                                                            'works' => $submitted_works->currentPage(),
                                                        ])
                                                    }}
                                                </div>
                                            </div>
                                        </div>

                                    </div><!--end col-->
                                @endif

                            </div><!--end row-->
                        </div>
                    </div>
                </div><!--end col-->

            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Profile End -->

@endsection
