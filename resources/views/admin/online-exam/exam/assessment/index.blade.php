@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-horizontal">
                        <div class="row">
                            <h4 class="col-lg-2"><span id="header-title"> নীরিক্ষণ </span></h4>
                                <select name="exam_id" class="form-control col-2 exam_id select2 mx-1">
                                    <option value="">All Exam Wise</option>
                                    @foreach($exams as $id => $name)
                                        <option value="{{$id}}">{{$name}}</option>
                                    @endforeach
                                </select>
                                <select name="participant_id" class="form-control col-2 participant_id select2 mx-1">
                                    <option value="">All Participants Wise</option>
                                    @foreach($participants as $id => $name)
                                        <option value="{{$id}}">{{$name}}</option>
                                    @endforeach
                                </select>
                                <select name="participated" class="participated mx-1" style="height: 36px">
                                    <option value="" disabled>Participation wise</option>
                                    <option value="1">অংশগ্রহন করেছে</option>
                                    <option value="0">এখনও পরীক্ষা দেয়নি</option>
                                </select>
                                <select name="competent" class="competent mx-1" style="height: 36px">
                                    <option value="" disabled>Result wise</option>
                                    <option value="1">পাশ করেছে</option>
                                    <option value="0">পাশ করেনি</option>
                                </select>
                                <select title="Per page data" name="per_page" class="per_page mx-1" style="height:
                                36px">
                                    <option value="15"> ১৫</option>
                                    <option value="25"> ২৫</option>
                                    <option value="50"> ৫০</option>
                                    <option value="100"> ১০০</option>
                                    <option value="200"> ২০০</option>
                                    <option value="500"> ৫০০</option>
                                </select>
                                <button type="submit" class="btn btn-secondary  mx-1" style="height: 35px; "><i
                                        class="fa fa-search-plus"></i></button>
                                <a class="btn btn-secondary mx-1" href="{{route('assessments.index')}}" style="height:
                                35px; "><i
                                        class="fa fa-refresh"></i></a>
                                <button type="button" class="btn btn-secondary mx-1"  onclick="printDiv('print-this')"
                                        style="height: 35px; "><i
                                        class="fa fa-print"></i></button>
                        </div>
                    </form>
                </div>
                <div class="card-body" id="print-this">
                    @include('admin._partials.success-alert')
                    <div class="question-block">

                        <div class="text-center my-5 no-screen">
                            <h2>সকল পরীক্ষার ফলাফল</h2>
                        </div>

                        <div class="table-responsive-sm">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th> পরীক্ষার্থী</th>
                                    <th> পরীক্ষা</th>
                                    <th class="text-center"> মোট উত্তর/প্রশ্নসংখ্যা</th>
                                    <th> শুরু করেছে</th>
                                    <th> অতিবাহিত সময়</th>
                                    <th class="text-center"> স্কোর</th>
                                    <th class="text-center"> ফলাফল</th>
                                    <th class="no-print" width="1%">Action</th>
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
                                        <td class="text-info view-exam "
                                            data-exam="{{$assessment->exam}}">
                                            {{$assessment->exam->name}}
                                        </td>
                                        <td class="text-center">
                                            @if ($assessment->start_at)
                                            {{$assessment->answers_count}} / {{$assessment->exam->questions_count}}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($assessment->start_at)
                                                <strong>{{$assessment->start_at->format('M d, h:i A') }}</strong>
                                            @else
                                                এখনও পরীক্ষা দেয়নি
                                            @endif
                                        </td>
                                        <td >
                                            @if ($assessment->consumedTime())
                                                {{$assessment->consumedTime()}}
                                            @else
                                                @if ($assessment->start_at)
                                                 পরীক্ষা শেষ করেনি
                                                @endif
                                            @endif

                                        </td>
                                        <td>
                                            @if ($assessment->start_at)
                                                {{$assessment->totalRemarks()}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($assessment->totalRemarks()  >= $assessment->exam->competency_score)
                                                <strong class="text-success">উত্তীর্ণ</strong>
                                            @else
                                                @if ($assessment->start_at)
                                                <strong class="text-danger">অনুর্ত্তীর্ণ</strong>
                                                @endif
                                            @endif
                                        </td>
                                        <td align="center" class="no-print">
                                            @if ($assessment->start_at)
                                                <a title="Examine"
                                                   href="{{route('assessments-examine.index',  $assessment->id)}}">
                                                    <i class="fa fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$assessments->appends(request()->query())}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="exam-block"> </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@push('script')
    <script>

        @if($value = request('exam_id'))
            $('.exam_id').val("{{$value}}")
        @endif
        @if($value = request('participant_id'))
            $('.participant_id').val("{{$value}}")
        @endif
        @if(request()->filled('participated'))
            $('.participated').val("{{request('participated')}}")
        @endif
        @if(request()->filled('competent'))
            $('.competent').val("{{request('competent')}}")
        @endif

        @if(request()->filled('per_page'))
            $('.per_page').val("{{request('per_page')}}")
        @endif


    </script>

    <script>

        $(document).ready(function () {
            $('.view-exam').click(function () {
                const exam = $(this).data('exam');
                $.ajax({
                    url: `/exams/${exam.id}`,
                    type:'GET',
                    dataType:'HTML',
                }).done(function (data) {
                    $('.exam-block').html(data)
                    $('#ExamModal').modal('show')
                });
            })
        })

    </script>

@endpush
