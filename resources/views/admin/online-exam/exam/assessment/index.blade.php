@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-horizontal">
                        <div class="row">
                            <h4 class="header-title col-7"><span id="header-title">Assessments </span></h4>
                                <select name="exam_id" class="form-control col-2 exam_id">
                                    @foreach($exams as $id => $name)
                                        <option value="{{$id}}">{{$name}}</option>
                                    @endforeach
                                </select>
                                <select name="participant_id" class="form-control col-2 participant_id">
                                    <option value="">Select One</option>
                                    @foreach($participants as $id => $name)
                                        <option value="{{$id}}">{{$name}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-secondary " style="height: 35px; "><i
                                        class="fa fa-search-plus"></i></button>
                                <a class="btn btn-secondary" href="{{route('assessments.index')}}" style="height: 35px; "><i
                                        class="fa fa-refresh"></i></a>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @include('admin._partials.success-alert')
                    <div class="question-block">
                        <div class="table-responsive-sm">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th> পরীক্ষার্থী</th>
                                    <th> পরীক্ষা</th>
                                    <th class="text-center"> মোট উত্তর/প্রশ্নসংখ্যা</th>
                                    <th> শুরু করেছে</th>
                                    <th> অতিবাহিত সময়</th>
                                    <th> স্কোর</th>
                                    <th width="1%">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($assessments as $assessment)

                                    <tr>
                                        <td>{{$assessment->participant->name}}</td>
                                        <td class="text-info view-exam "
                                            data-exam="{{$assessment->exam}}">
                                            {{$assessment->exam->name}}
                                        </td>
                                        <td class="text-center">
                                            {{$assessment->answers_count}} / {{$assessment->exam->questions_count}}
                                        </td>
                                        <td>
                                            @if ($assessment->start_at)
                                                <strong>{{$assessment->start_at->format('M d, h:i A') }}</strong>
                                            @else
                                                এখনও পরীক্ষা দেয়নি
                                            @endif
                                        </td>
                                        <td>
                                            {{$assessment->consumedTime()}}
                                        </td>
                                        <td>
                                            @if ($assessment->start_at)
                                                {{$assessment->totalRemarks()}}
                                            @endif
                                        </td>
                                        <td align="center">
                                            <a title="Examine"
                                               href="{{route('assessments-examine.index',  $assessment->id)}}">
                                                <i class="fa fa fa-eye" aria-hidden="true"></i>
                                            </a>
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
