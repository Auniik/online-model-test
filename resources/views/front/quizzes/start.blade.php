@extends('front.layout.master')
@section('content')
    <section class="section-two mt-100 pt-0 pb-0 mb-5" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-justify">
                    <img src="{{asset($quiz->image)}}" class="align-items-center rounded-0" style="height: 250px"
                         width="100%px" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="section-two mt-0 pt-0 pb-0 mb-2" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-justify text-center">
                    <h5> আপনাকে স্বাগতম {{$quiz->name}} কুইজে,  উক্ত কুইজে  মোট {{$quiz->questions->count()}}  টি
                        প্রশ্ন  রয়েছে।</h5>
                    <p>{!! $quiz->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section-two bg-light pt-4" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <br>
                    <form action="{{route('quiz-assessment.start')}}" method="post">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                        <input type="hidden" name="participant_id" value="{{$participant->id}}">
                        <input type="hidden" name="is_attended" value="1">
                        <input type="hidden" name="score" value="0">
                        <input type="hidden" name="participant_type" value="{{$type}}">
                        <input type="hidden" name="consumed_time" value="0">
                        <div class="text-center">
                            <button class="btn btn-lg btn-outline-success">Start Quiz Now</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <hr>
    <hr>
@endsection
