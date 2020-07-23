@extends('front.layout.master')
@section('content')
    <section id="home_part">
        <div class="container">
            @include('front.online-exam.header' , ['assessment' => $assessment])


            @php
                $sl = $questions->firstItem();
            @endphp
            <div class="questions_part">
                @foreach ($questions as $question)
                    <h6>প্রশ্ন {{$sl++}}: {{$question->title}}</h6>

                    @if ($question->isMCQ())
                        <form action="" class="margin_left">
                            @foreach($question->MCQs as $mcq)
                                <input type="radio" id="{{$mcq->id}}" name="answer[{{$question->id}}]"
                                       value="{{$mcq->id}}">
                                <label for="{{$mcq->id}}">{{$mcq->value}}</label><br>
                            @endforeach
                        </form>
                    @endif
                    @if ($question->isWritten())
                        <form action="/" class="margin_left">
                            <textarea maxlength="10000"  data-msg-required="Please enter your message." rows="8"
                                      class="form-control" name="answer[{{$question->id}}]"
                                      placeholder="উত্তর  লিখুন"></textarea>
                            <br>
                            <label for="file"> ফাইল  যুক্ত  করুন</label>

                            <input class="form-control" type="file" id="file" multiple name="filename">
                            <p class="mb-4"> আপনার উত্তর টি  খাতায় অথবা  কোন ডকুমেন্টে লিখে এখানে  আপলোড  করতে পারেন</p>
                        </form>
                    @endif
                    @if ($question->isCQ())

                        <form action="/" class="margin_left">
                            @if ($question->description)
                                <p class="cq-description"><b>উদ্দীপকঃ</b> {{$question->description}}</p>
                            @endif

                            <ul class="list-group">
                                @foreach($question->CQs as $k => $cq)
                                    <li class="list-group-item d-flex justify-content-between align-items-center
                                    cq-meta">
                                         {{++$k}}. {{$cq->title}}
                                        <span class="badge badge-secondary badge-pill">{{$cq->translatedLevel}}
                                            - {{$cq->max_remarks}}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <label for="file" class="mt-4"> ফাইলসমূহ  যুক্ত  করুন</label>
                            <input class="form-control" type="file" id="file" multiple name="filename">
                            <p class="mb-4"> আপনার উত্তর টি  খাতায় অথবা  কোন ডকুমেন্টে লিখে এখানে  আপলোড  করতে পারেন</p>
                        </form>
                    @endif

                @endforeach

                {{$questions->links()}}


            </div>
        </div>
    </section>
@endsection
