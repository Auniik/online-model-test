@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" id="add-new" class="btn float-right btn-primary"> নতুন পরীক্ষার্থী যোগ করুন
                    </button>
                    <h4><span id="header-title">{{$exam->name}} -এর পরীক্ষার্থীসমূহ</span></h4>
                    <p class="mb-0"> বিষয়: {{$exam->subject->name}}, শ্রেণী: {{$exam->class}},  পাশ মার্ক:
                        {{$exam->competency_score}}</p>
                </div>
                <div class="card-body">
                    @include('admin._partials.success-alert')
                    <div class="question-block">
                        <div class="table-responsive-sm">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th> পরীক্ষার্থী</th>
                                    <th> শুরু করেছে ? </th>
                                    <th> অতিবাহিত সময়</th>
                                    <th> স্কোর</th>
                                    <th width="10%">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($exam->assignedParticipants as $assignedParticipant)
                                    <tr>
                                        <td>
                                            <a class="text-info"
                                               href="{{route('participants.show', $assignedParticipant->participant_id)}}">
                                                {{$assignedParticipant->participant->name}}
                                            </a>
                                        </td>
                                        <td>
                                            @if ($assignedParticipant->start_at)
                                                <strong>{{$assignedParticipant->start_at->format('M d, h:i A') }}</strong>
                                            @else
                                                এখনও পরীক্ষা দেয়নি
                                            @endif
                                        </td>
                                        <td>
                                            {{$assignedParticipant->consumedTime()}}
                                        </td>
                                        <td>
                                            @if ($assignedParticipant->start_at)
                                                {{$assignedParticipant->totalRemarks()}}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($assignedParticipant->start_at)
                                            <a title="Examine"
                                               href="{{route('assessments-examine.index',  $assignedParticipant->id)}}">
                                                <i class="fa fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            @endif
                                            <a class="deletable"
                                               title="Delete"
                                               href="{{route('exam-participants.destroy',  $assignedParticipant->id)}}">
                                                <i class="fa fa fa-trash" aria-hidden="true"></i>
                                            </a>
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

        @include('admin.online-exam.exam.participants.associate', ['participants' => $participants, 'exam'=> $exam])


    </div>
@endsection

@push('script')
    <script>


        $(document).ready(function () {
            $('#add-new').click(function () {
                $('#ParticipantAssignModal').modal('show')
            })
            $(".select2-tags").select2({
                tags: true,
                tokenSeparators: [',']
            })
        })


    </script>

@endpush
