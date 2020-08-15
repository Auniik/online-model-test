@extends('front.layout.master')
@section('content')
    @if ($participant->password)
        <div  class="col-lg-10 offset-lg-1 offset-md-1 col-md-8 col-sm-12 col-xs-12">
            <div class="card mx-lg-5 mx-sm-1 mx-md-1 p-5 shadow mt-5 bg-transparent">
                <form action="{{route('participant-profile.update', $participant)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-12 text-center">
                            <h4> প্রোফাইল এডিট করুন</h4>
                            <hr>
                        </div>
                        <div class="col-lg-6 offset-lg-3 col-md-5 col-sm-12 my-3 text-center">
                            @if ($participant->thumbnail)
                                <img src="/{{$participant->thumbnail}}" class="rounded" height="200px"
                                     alt="{{$participant->name}}">
                            @else
                                ছবি এখনও যোগ করা হয়নি
                            @endif
                            <input type="file"
                                   name="thumbnail"
                                   class="form-control"
                            >
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 my-3">
                            <label for=""> নাম</label>
                            <input type="text" value="{{$participant->name}}"
                                   name="name"
                                   class="form-control"
                                   required
                                   autocomplete="off"
                                   placeholder="পরীক্ষার্থীর নামঃ">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 my-3">
                            <label for="">   মোবাইল নং</label>
                            <input type="tel"
                                   value="{{$participant->mobile_number}}"
                                   minlength="11" required
                                   pattern="(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$"
                                   class="form-control"
                                   name="mobile_number" placeholder="মোবাইলঃ"
                                   autocomplete="off"
                            >
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 my-3">
                            <label for="">   ইমেইল</label>
                            <input type="email"
                                   value="{{$participant->email}}"
                                   name="email" autocomplete="off"
                                   class="form-control"
                                   data-msg-email="Please enter a valid mail address"
                                   placeholder="ইমেইলঃ (যদি থাকে)"
                            />
                        </div>

                        <div class="col-lg-6 col-md-6  offset-md-3  col-sm-12 my-3">
                            <label for="">  পেশা</label>
                            <select class="form-control" name="occupation">
                                <option value="student"> ছাত্র</option>
                                <option value="job_holder"> চাকুরিজীবী</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 my-3 student-fields">
                            <label for="">  বিদ্যালয়ের নাম</label>
                            <input type="text" value="{{$participant->school_name}}"
                                   name="school_name"
                                   required
                                   class="form-control"
                                   placeholder="বিদ্যালয়ের নামঃ"
                                   autocomplete="off"
                            />
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 my-3 student-fields">
                            <label for="">  শ্রেণী</label>
                            <input type="number"
                                   value="{{$participant->class}}"
                                   name="class"
                                   required
                                   min="1"
                                   max="12"
                                   class="form-control integer"
                                   placeholder="শ্রেণীঃ"
                                   autocomplete="off">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 my-3 student-fields">
                            <label for="">   রোল নং</label>
                            <input type="number"
                                   min="1"
                                   value="{{$participant->roll}}"
                                   name="roll"
                                   required
                                   class="form-control integer"
                                   autocomplete="off"
                                   placeholder="ক্লাস রোলঃ">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 my-3">
                            <label for="">   বিভাগ</label>
                            <input type="text" value="{{$participant->division}}"
                                   name="division"
                                   class="form-control"
                                   placeholder=" বিভাগ"
                                   required
                                   autocomplete="off"
                            >
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 my-3">
                            <label for="">  জেলা</label>
                            <input type="text" value="{{$participant->district}}"
                                   name="district"
                                   class="form-control"
                                   placeholder="জেলাঃ"
                                   required
                                   autocomplete="off"
                            >
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 my-3">
                            <label for="">   উপজেলা</label>
                            <input type="text"
                                   value="{{$participant->sub_district}}"
                                   name="sub_district"
                                   class="form-control"
                                   placeholder="উপজেলাঃ"
                                   autocomplete="off"
                            />
                        </div>
                    </div>
                    <div class="top_content my-3">
                        <button type="submit" class="btn btn-primary btn-block" > সেভ করুন</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <div  class="col-lg-10 offset-lg-1 offset-md-1 col-md-8 col-sm-12 col-xs-12">
        <div class="card mx-lg-5 mx-sm-1 mx-md-1 p-5 shadow mt-5 bg-transparent">
            <form action="{{route('participant-password.update', $participant)}}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 text-center">
                        <h4>  পাসওয়ার্ড পরিবর্তন করুন</h4>
                        <hr>
                    </div>

                    @if ($participant->password)
                        <div class="col-lg-12 my-3">
                            <label for=""> পুরাতন পাসওয়ার্ড</label>
                            <input type="password"
                                   name="old_password"
                                   required
                                   class="form-control"
                                   placeholder="পুরাতন পাসওয়ার্ড"
                                   autocomplete="off"
                            />
                        </div>
                    @endif

                    <div class="col-lg-12  my-3">
                        <label for=""> নতুন পাসওয়ার্ড</label>
                        <input type="password"
                               name="password"
                               required
                               class="form-control"
                               placeholder="নতুন পাসওয়ার্ড"
                               autocomplete="off">
                    </div>
                    <div class="col-lg-12  my-3">
                        <label for=""> পুনরায় নতুন পাসওয়ার্ড</label>
                        <input type="password"
                               name="password_confirmation"
                               required
                               class="form-control"
                               placeholder="নতুন পাসওয়ার্ড"
                               autocomplete="off">
                    </div>

                </div>

                <div class="top_content my-3">
                    <button type="submit" class="btn btn-primary btn-block"> পাসওয়ার্ড পরিবর্তন করুন</button>
                </div>

            </form>

        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('select[name=occupation]').change(function () {
                const type = $(this).val()
                if(type === 'student') {
                    $('.student-fields').removeClass('d-none')
                }
                if(type === 'job_holder') {
                    $('.student-fields').addClass('d-none')
                }
            })

            @if($value = $participant->occupation)
                $('select[name=occupation]').val("{{$value}}").change()
            @endif

        })



    </script>

@endpush
