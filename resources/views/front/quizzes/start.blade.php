@extends('front.layout.master')
@section('content')
    <section class="section-two mt-100 pt-0 pb-0 mb-3" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-justify">
                    <img src="{{asset($quiz->image)}}" class="align-items-center rounded-0"
                         width="100%" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="section-two mt-0 pt-0 pb-0 mb-2 " id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-justify text-center">
                    <h5> আপনাকে স্বাগতম {{$quiz->name}} কুইজে, উক্ত কুইজে মোট {{$quiz->questions->count()}} টি
                        প্রশ্ন রয়েছে।</h5>
                    <p>{!! $quiz->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section-two bg-transparent pt-4" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <form action="{{route('quiz-assessment.start')}}" method="post">
                        @csrf
                        @include('front.partials.notifications')
                        <div class="row shadow bg-transparent">
                            <div class="col-lg-12 p-4">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 my-3">
                                        নাম: <input type="text"
                                                    name="participant[name]"
                                                    class="form-control"
                                                    value="{{$participant->name}}"
                                                    placeholder="নাম লিখুন"
                                                    autocomplete="off">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 my-3">
                                        ইমেইল: <input type="email"
                                                      name="participant[email]"
                                                      class="form-control"
                                                      value="{{$participant->email}}"
                                                      placeholder=" ইমেইল লিখুন (যদি থাকে)"
                                                      {{$participant->email ? 'readonly'
                                                        : ''}}
                                                      autocomplete="off">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 my-3">
                                        মোবাইল নং: <input type="tel"
                                                          name="participant[mobile_number]"
                                                          placeholder="মোবাইল নং লিখুন"
                                                          value="{{$participant->mobile_number}}"
                                                          class="form-control"
                                                          {{$participant->mobile_number ? 'readonly' : ''}}
                                                          autocomplete="off">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 my-3">
                                         পেশা: <select class="form-control" name="participant[occupation]">
                                            <option value="student"> স্টুডেন্ট</option>
                                            <option value="job_holder"> চাকুরিজীবী</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 my-3">
                                        জেলা: <input type="text" name="participant[district]"
                                                     class="form-control"
                                                     placeholder=" জেলার নাম লিখুন"
                                                     value="{{$participant->district}}"
                                                     autocomplete="off">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 my-3">
                                        উপজেলা: <input type="text"
                                                       name="participant[sub_district]"
                                                       placeholder=" উপজেলার নাম লিখুন"
                                                       value="{{$participant->sub_district}}"
                                                       autocomplete="off"
                                                       class="form-control">
                                    </div>
                                    <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                                    <input type="hidden" name="participant_id" value="{{$participant->id}}">
                                    <input type="hidden" name="is_attended" value="1">
                                    <input type="hidden" name="score" value="0">
                                    <input type="hidden" name="participant_type" value="{{$type}}">

                                    <div class="col-12 mt-4 text-center">
                                        <button class="btn btn-md btn-outline-info px-4"> শুরু করুন</button>
                                    </div>
                                </div>


                            </div>


                        </div>
            {{--                        <input type="texxxxxxxc12xt" name="consumed_time" value="0">--}}

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
