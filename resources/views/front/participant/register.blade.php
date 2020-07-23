@extends('front.layout.master')
@section('content')
    <section class="section-two mt-0 pt-0 pb-0 mb-2" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 mt-4 text-justify text-center">
                    <h5> আপনাকে স্বাগতম  টেকসই বিডি তে</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="section-two bg-light pt-4" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <form action="{{route('participants.register.store')}}" method="post">
                        @csrf
                        @include('front.partials.notifications')
                        <div class="row shadow bg-white">
                            <div class="col-12 p-4">
                                <div class="row">

                                    <div class="col-12 my-3">
                                        <div class="row">
                                            <div class="col-2 offset-lg-2 text-right">
                                                <label for=""> নামঃ</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="text"
                                                       name="name"
                                                       value="{{old('name')}}"
                                                       class="form-control"
                                                       placeholder="  নাম লিখুন"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12  my-3">
                                        <div class="row">
                                            <div class="col-2 offset-lg-2 text-right">
                                                <label for="">   মোবাইল নংঃ</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="tel"
                                                       name="mobile_number"
                                                       class="form-control"
                                                       value="{{old('mobile_number')}}"
                                                       placeholder="  মোবাইল  নং লিখুন"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12  my-3">
                                        <div class="row">
                                            <div class="col-2 offset-lg-2 text-right">
                                                <label for="">  ইমেইলঃ</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="email"
                                                       name="email"
                                                       class="form-control"
                                                       value="{{old('email')}}"
                                                       placeholder=" ইমেইল লিখুন"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12  my-3">
                                        <div class="row">
                                            <div class="col-2 offset-lg-2 text-right">
                                                <label for="">   নতুন পাসওয়ার্ডঃ </label>
                                            </div>
                                            <div class="col-6">
                                                <input type="password"
                                                       name="password"
                                                       class="form-control"
                                                       placeholder="  নতুন পাসওয়ার্ড লিখুন"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="to" value="{{request('to')}}">
                                    <div class="col-sm-4 offset-md-4 mt-4 text-center">
                                        <button class="btn btn-lg btn-block btn-outline-primary"> রেজিস্টার করুন</button>
                                    </div>
                                </div>


                            </div>


                        </div>
{{--                        <input type="text" name="consumed_time" value="0">--}}

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
