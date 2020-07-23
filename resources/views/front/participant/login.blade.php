@extends('front.layout.master')
@section('content')
    <section class="section-two mt-0 pt-0 pb-0 mb-2" id="question-one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 mt-4 text-justify text-center">
                    <h5> আপনাকে স্বাগতম টেকসই বিডি তে</h5>
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
                        <input type="hidden" value="{{request('to')}}" name="to">
                        <div class="row shadow bg-white">
                            <div class="col-12 p-4">
                                <div class="col-12  my-3">
                                    <div class="row">
                                        <div class="col-2 offset-lg-2 text-right">
                                            <label for=""> Email or Mobile</label>
                                        </div>
                                        <div class="col-6">
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
                                <div class="col-12  my-3">
                                    <div class="row">
                                        <div class="col-2 offset-lg-2 text-right">
                                            <label for=""> Password </label>
                                        </div>
                                        <div class="col-6">
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
                                    <button type="submit" class="btn btn-md btn-block btn-success"> Login </button>
                                </div>
                                <div class="col-sm-4 offset-sm-4 mt-4 text-right">
                                    @php
                                        $to = request('to') ? "?to=".request('to') : '';
                                    @endphp
                                    You don't have any account yet ? <a href="/participants/register{{$to}}"
                                    class="btn btn-md btn-outline-primary"> Register Now</a>
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
