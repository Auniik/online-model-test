@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-3">
                            {{--                    <button type="button" id="add-new" class="btn float-right btn-primary"> অতিথি যোগ করুন</button>--}}
                            <h4 class="header-title"><span id="header-title">Participants of {{$quiz->name}}</span></h4>
                            <p class="mb-0">Duration: {{$quiz->duration}}</p>
                        </div>
                        <div class="col-3 offset-3">
                            <form action="">
                                <select name="participant_type" onchange="this.form.submit()" class="form-control participant_type" >
                                    <option value=""> সব দেখুন</option>
                                    <option value="vip">  অতিথী</option>
                                    <option value="general">   সাধারণ</option>
                                </select>
                            </form>
                        </div>
                        <div class="col-3">
                            <div class="btn-group pull-right">
                                <button class="btn btn-secondary btn-xs dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    +  নতুন  পার্টিসিপেন্ট যোগ করুন
                                </button>
                                <div class="dropdown-menu">
                                    <a title=" অতিথি"
                                       class="dropdown-item vip-create"
                                       href="#">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>  অতিথি
                                    </a>
                                    <a title=" সাধারণ"
                                       class="dropdown-item general-create"
                                       href="#">
                                        <i class="fa fa-quora" aria-hidden="true"></i>  সাধারণ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="card-body">
                    @include('admin._partials.success-alert')
                    <div class="question-block">
                        <div class="table-responsive-sm">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Is Attended</th>
                                    <th>Score</th>
                                    <th width="10%">Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($assignedParticipants as $assignedParticipant)
                                    <tr>
                                        <td>{{$assignedParticipant->participant->name}}</td>
                                        <td>{{ucwords($assignedParticipant->participant_type)}}</td>
                                        <td>{{$assignedParticipant->is_attended ? 'Yes' : 'No'}}</td>
                                        <td>
                                            {{$assignedParticipant->score}}
                                        </td>
                                        <td>
                                            <a title="Examine"
                                               href="{{route('quiz-assessment.show',  $assignedParticipant->id)}}">
                                                <i class="fa fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a class="deletable"
                                               title="Delete"
                                               href="{{route('quiz-participants.destroy',  $assignedParticipant->id)}}">
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

        @include('admin.quiz.participant.vip-associate', ['participants' => $participants, 'quiz'=> $quiz])
        @include('admin.quiz.participant.general-associate', ['participants' => $participants, 'quiz'=> $quiz])


    </div>
@endsection

@push('script')
    <script>


        $(document).ready(function () {
            $('.vip-create').click(function () {
                $('#VIPParticipantAssignModal').modal('show')
            })
            $('.general-create').click(function () {
                $('#GeneralParticipantAssignModal').modal('show')
            })
            $(".select2-tags").select2({
                tags: true,
                tokenSeparators: [',']
            })
            @if($type = request('participant_type'))
                $('.participant_type').val("{{$type}}")
            @endif
        })


    </script>

@endpush
