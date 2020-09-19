@extends('front.layout.master')
@section('content')
    <section class="section-two mt-0 pt-0 pb-0 mb-2" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 mt-4 text-justify text-center">
                    <h5>  টেকসইবিডি অনলাইন প্ল্যাটফর্মে আপনাকে স্বাগতম !</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="section-two bg-light pt-4" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <form action="{{route('participants.attempt')}}" method="post">
                        @csrf
                        @include('front.partials.notifications')
                        <input type="hidden" value="{{request('next')}}" name="next">
                        <div class="row shadow bg-white">
                            <div class="col-lg-12 p-4">
                                <div class="col-lg-12 col-md-12 my-3">
                                    <div class="row">
                                        <div class="col-lg-2 offset-lg-2 text-lg-right text-md-left text-sm-left">
                                            <label for=""> ইমেইল অথবা মোবাইল নং</label>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <input type="text"
                                                   name="id"
                                                   required
                                                   class="form-control"
                                                   value="{{old('id')}}"
                                                   placeholder=" ইমেইল  অথবা  মোবাইল নং লিখুন"
                                                   autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 my-3">
                                    <div class="row">
                                        <div class="col-lg-2 offset-lg-2 text-lg-right text-md-left text-sm-left">
                                            <label for="">  পাসওয়ার্ড </label>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <input type="password"
                                                   name="password"
                                                   required
                                                   class="form-control"
                                                   placeholder="পাসওয়ার্ড লিখুন"
                                                   autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 offset-sm-4 mt-4 text-right">
                                    <button type="submit" class="btn btn-md btn-block btn-success">  লগিন করুন </button>
                                </div>
                                <div class="col-sm-4 offset-sm-4 mt-4 text-right">
                                    @php
                                        $to = request('next') ? "?to=".request('next') : '';
                                    @endphp
                                      আপনার একাউন্ট খোলা হয়নি ? <a href="/participants/register{{$to}}"
                                    class="btn btn-md btn-outline-primary">  রেজিস্ট্রেশন করুন</a>
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
