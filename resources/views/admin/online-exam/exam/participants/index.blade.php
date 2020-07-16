@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" id="add-new" class="btn float-right btn-primary">Add new</button>
                    <h4 class="header-title"><span id="header-title">Participants of {{$exam->name}}</span></h4>
                    <p class="mb-0">Subject: {{$exam->subject->name}}, Class: {{$exam->class}}, Pass Mark:
                        {{$exam->competency_score}}</p>
                </div>
                <div class="card-body">
                    @include('admin._partials.success-alert')
                    <div class="question-block">
                        <div class="table-responsive-sm">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Score</th>
                                    <th width="10%">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($exam->assignedParticipants as $assignedParticipant)
                                    <tr>
                                        <td>{{$assignedParticipant->participant->name}}</td>
                                        <td>
                                            {{$assignedParticipant->score}}
                                        </td>
                                        <td>
                                            <a title="Examine"
                                               href="{{route('assessments-examine.index',  $assignedParticipant->id)}}">
                                                <i class="fa fa fa-eye" aria-hidden="true"></i>
                                            </a>
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
