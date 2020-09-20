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
                        <div class="col-lg-7 text-right">
                            <form action="">
                                <select name="quiz_id" onchange="this.form.submit()" style="height: 36px"
                                        class="quiz_id" >
                                    <option value=""> সব দেখুন</option>
                                    @foreach($quizzes as $id => $name)
                                        <option value="{{$id}}">{{$name}}</option>
                                    @endforeach
                                </select>
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
                                </select>
                                <input type="hidden" name="isRanked" id="is-ranked" value="{{request('isRanked', 0)}}">
                                <button type="button"
                                        class="btn btn-secondary rank-btn mx-1 {{request('isRanked') ? 'active' : ''}}"
                                        onclick="seeRank(event)"
                                        style="height: 35px; display: none"> র‍্যাংক দেখুন</button>
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
                    <div class="pull-right">
                        {{$assessments->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function seeRank(e) {
            const elem = $(e.target)
                .siblings('#is-ranked');

            let val =  elem.val()
                if(val == 1) {
                    elem.val(0)
                } else {
                    elem.val(1)
                }

            elem.parent('form')
                .submit()
        }

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
            @if(request()->filled('quiz_id'))
            $('.quiz_id').val("{{request('quiz_id')}}")
            @endif


            @if(!!request('participant_type') && !!request('participated') && request()->filled('quiz_id'))
                $(".rank-btn").show()
            @else
                $(".rank-btn").hide()
                $('#is-ranked').val(0)

            @endif

        })

    </script>

@endpush
