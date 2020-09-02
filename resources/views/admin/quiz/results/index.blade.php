@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-lg-3">
                            <h4 class="header-title"><span id="header-title">  কুইজের সকল ফলাফল সমূহ
                                </span></h4>
                        </div>
                        <div class="col-lg-4 offset-md-3 text-right">
                            <form action="">
                                <select name="participant_type" onchange="this.form.submit()" style="height: 36px"
                                        class="participant_type" >
                                    <option value=""> সব দেখুন</option>
                                    <option value="vip">  অতিথী</option>
                                    <option value="general">   সাধারণ</option>
                                </select>
                                <select name="participated" onchange="this.form.submit()" class="participated mx-1" style="height: 36px">
                                    <option value="" disabled>Participation wise</option>
                                    <option value="1">অংশগ্রহন করেছে</option>
                                    <option value="0">এখনও পরীক্ষা দেয়নি</option>
                                </select>
                                <select title="Per page data" onchange="this.form.submit()" name="per_page" class="per_page mx-1" style="height:
                                36px">
                                    <option value="15"> ১৫</option>
                                    <option value="25"> ২৫</option>
                                    <option value="50"> ৫০</option>
                                    <option value="100"> ১০০</option>
                                    <option value="200"> ২০০</option>
                                    <option value="500"> ৫০০</option>
                                </select>
                            </form>
                        </div>
                        <div class="col-lg-1">
                            <div class="btn-group">
                                <a class="btn btn-secondary mx-1" href="{{route('quizzes.results.index')}}" style="height:
                                35px; "><i class="fa fa-refresh"></i></a>
                                <button type="button" class="btn btn-secondary mx-1"  onclick="printDiv('print-this')"
                                        style="height: 35px; "><i
                                        class="fa fa-print"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    @include('front.partials.notifications')
                    <div class="question-block" id="print-this">
                        <div class="text-center my-5 no-screen">
                            <h2>সকল কুইজের ফলাফল</h2>
                        </div>
                        <div class="table-responsive-sm" >
                            <table class="table table-sm" >
                                <thead>
                                <tr>
                                    <th> নাম</th>
                                    <th> মোবাইল নং</th>
                                    <th> ইমেইল</th>
                                    <th> টাইপ</th>
                                    <th> অংশগ্রহন করেছেন ?</th>
                                    <th>  অতিবাহিত সময়</th>
                                    <th>  ফলাফল</th>
                                    <th class="no-print" width="6%">#</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($assessments as $assessment)
                                    <tr>
                                        <td>
                                            <a class="text-info"
                                               href="{{route('participants.show', $assessment->participant_id)}}">
                                                {{$assessment->participant->name}}
                                            </a>
                                        </td>
                                        <td>{{$assessment->participant->mobile_number}}</td>
                                        <td>{{$assessment->participant->email}}</td>
                                        <td>{{$assessment->translatedParticipantType}}</td>
                                        <td>{{$assessment->is_attended ? ' হ্যাঁ' : ' এখনও নয়'}}</td>
                                        <td>
                                            {{$assessment->consumedTime() }}

                                        </td>
                                        <td>
                                            {{$assessment->score}}
                                        </td>
                                        <td class="no-print">
                                            @if ($assessment->end_at)
                                                <a title="Examine"
                                                   href="{{route('quiz-assessment.show',  $assessment->id)}}">
                                                    <i class="fa fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                            @if (!$assessment->start_at)
                                                <a class="deletable"
                                                   title="Delete"
                                                   href="{{route('quiz-participants.destroy',  $assessment->id)}}">
                                                    <i class="fa fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            @if($type = request('participant_type'))
            $('.participant_type').val("{{$type}}")
            @endif
            @if(request()->filled('participated'))
            $('.participated').val("{{request('participated')}}")
            @endif
            @if(request()->filled('per_page'))
            $('.per_page').val("{{request('per_page')}}")
            @endif

        })

    </script>

@endpush
