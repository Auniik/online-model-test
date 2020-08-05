@extends('front.layout.master')
@section('content')
    <div  class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-xs-12">
        <div class="card mx-lg-5 mx-sm-1 mx-md-1 p-5 shadow-lg mt-5 bg-transparent">
            @include('front.online-exam.header', ['assessment' => $assessment])
                <form action="{{route('exams.start', $assessment)}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 my-3">
                            <input type="text" value="{{$assessment->participant->name}}"
                                   name="name"
                                   class="form-control"
                                   required
                                   autocomplete="off"
                                   readonly
                                   placeholder="পরীক্ষার্থীর নামঃ">
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12 my-3">
                            <input type="text" value="{{$assessment->participant->school_name}}"
                                   name="school_name"
                                   required
                                   class="form-control"
                                   placeholder="বিদ্যালয়ের নামঃ"
                                   autocomplete="off"
                            />
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 my-3">
                            <input type="text"
                                   value="{{$assessment->participant->class}}"
                                   name="class"
                                   required
                                   class="form-control"
                                   placeholder="শ্রেণীঃ"
                                   autocomplete="off">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 my-3">
                            <input type="text"
                                   value="{{$assessment->participant->roll}}"
                                   name="roll"
                                   required
                                   class="form-control"
                                   autocomplete="off"
                                   placeholder="ক্লাস রোলঃ">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 my-3">
                            <input type="text"
                                   value="{{$assessment->participant->sub_district}}"
                                   name="sub_district"
                                   class="form-control"
                                   placeholder="উপজেলাঃ"
                                   autocomplete="off"
                            />
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 my-3">
                            <input type="text" value="{{$assessment->participant->district}}"
                                   name="district"
                                   class="form-control"
                                   placeholder="জেলাঃ"
                                   required
                                   autocomplete="off"
                            >
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 my-3">
                            <input type="text"
                                   value="{{$assessment->participant->mobile_number}}"
                                   maxlength="11" required
                                   class="form-control"
                                   name="mobile_number" placeholder="মোবাইলঃ"
                                   @if ($assessment->participant->email)
                                   readonly
                                   @endif
                                   autocomplete="off"
                            >
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12 my-3">
                            <input type="email"
                                   value="{{$assessment->participant->email}}"
                                   name="email" autocomplete="off"
                                   class="form-control"
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
@endsection
