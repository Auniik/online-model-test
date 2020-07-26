@extends('front.layout.master')
@section('content')
    <section id="home_part">
        <div class="container sadows">

            @include('front.online-exam.header', ['assessment' => $assessment])

            <div class="medile_part">
                <form action="{{route('exams.start', $assessment)}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <input type="text" value="{{$assessment->participant->name}}"
                                   name="name"
                                   required
                                   placeholder="পরীক্ষার্থীর নামঃ">
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <input type="text" value="{{$assessment->participant->school_name}}"
                                   name="school_name"
                                   required
                                   placeholder="বিদ্যালয়ের নামঃ"
                            />
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <input type="text"
                                   value="{{$assessment->participant->class}}"
                                   name="class"
                                   required
                                   placeholder="শ্রেণীঃ">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <input type="text"
                                   value="{{$assessment->participant->roll}}"
                                   name="roll"
                                   required
                                   placeholder="ক্লাস রোলঃ">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <input type="text"
                                   value="{{$assessment->participant->sub_district}}"
                                   name="sub_district"
                                   placeholder="উপজেলাঃ"
                            />
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <input type="text" value="{{$assessment->participant->district}}"
                                   name="district"
                                   placeholder="জেলাঃ"
                                   required
                            >
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <input type="text"
                                   value="{{$assessment->participant->mobile_number}}"
                                   maxlength="11" required
                                   name="mobile_number" placeholder="মোবাইলঃ"
                                   @if ($assessment->participant->email)
                                   readonly
                                @endif
                            >
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <input type="email"
                                   value="{{$assessment->participant->email}}"
                                   name="email"
                                   data-msg-email="Please enter a valid mail address"
                                   placeholder="ইমেইলঃ (যদি থাকে)"
                                   @if ($assessment->participant->email)
                                   readonly
                                @endif
                            />
                        </div>
                    </div>

                    <div class="top_content">
                        <button type="submit" class="btn btn-primary btn-block" >পরীক্ষা শুরু করুন</button>
                    </div>

                </form>


            </div>

        </div>
    </section>
@endsection
