@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
{{--                    <button type="button" id="add-new" class="btn float-right btn-primary"> অতিথি যোগ করুন</button>--}}
                            <h4 class="header-title"><span id="header-title"> {{$quiz->name}} - এর সকল পরীক্ষার্থী সমূহ
                                </span></h4>
                            <p class="mb-0">সময়সীমা: {{$quiz->duration}}</p>
                        </div>
                        <div class="col-3 offset-2">
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
                    @include('front.partials.notifications')
                    <div class="question-block">
                        <div class="table-responsive-sm">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th> নাম</th>
                                    <th> ইমেইল</th>
                                    <th>  মোবাইল</th>
                                    <th> টাইপ</th>
                                    <th> অংশগ্রহন করেছেন ?</th>
                                    <th>  অতিবাহিত সময়</th>
                                    <th>  ফলাফল</th>
                                    <th width="6%">#</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($assignedParticipants as $assignedParticipant)
                                    <tr>
                                        <td>{{$assignedParticipant->participant->name}}</td>
                                        <td>{{$assignedParticipant->participant->email}}</td>
                                        <td>{{$assignedParticipant->participant->mobile_number}}</td>
                                        <td>{{$assignedParticipant->participant_type}}</td>
                                        <td>{{$assignedParticipant->is_attended ? ' হ্যাঁ' : ' এখনও নয়'}}</td>
                                        <td>
                                            {{$assignedParticipant->consumedTime() }}

                                        </td>
                                        <td>
                                            {{$assignedParticipant->score}}
                                        </td>
                                        <td>
                                            @if ($assignedParticipant->end_at)
                                                <a title="Examine"
                                                   href="{{route('quiz-assessment.show',  $assignedParticipant->id)}}">
                                                    <i class="fa fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                                @if (!$assignedParticipant->start_at)
                                                    <a class="deletable"
                                                       title="Delete"
                                                       href="{{route('quiz-participants.destroy',  $assignedParticipant->id)}}">
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

        @include('admin.quiz.participant.vip-associate', ['participants' => $participants, 'quiz'=> $quiz])
        @include('admin.quiz.participant.general-associate', ['participants' => $participants, 'quiz'=> $quiz])


    </div>
@endsection

@push('script')
    <script>

        $(document).ready(function () {
            $('.vip-create').click(function () {
                $('#VIPParticipantAssignModal').modal('show')
                $('.add-new-participants').click(function (e) {
                    newParticipantRow()
                    $('.participants').removeClass('d-none')
                })
            })
            $('.general-create').click(function () {
                $('#GeneralParticipantAssignModal').modal('show')
                $('.add-new-participants').click(function (e) {
                    newParticipantRow()
                    $('.participants').removeClass('d-none')
                })
            })
            $(".select2-tags").select2({
                tags: true,
                tokenSeparators: [',']
            })
            @if($type = request('participant_type'))
                $('.participant_type').val("{{$type}}")
            @endif



        })

        $(document).on('click', '.add-row', () => {
            newParticipantRow()
        })

        $(document).on('click', '.delete-row', (e) => {
            $(e.target).parents('.participant-row').remove();
        })

        $(document).on('hidden.bs.modal', '#VIPParticipantAssignModal, #GeneralParticipantAssignModal', function (e) {
            $('.participant-group').html('')
        })

        function newParticipantRow() {
            $('.participant-group').append(participantRow)
        }

        const participantRow = `
        <tr class="participant-row">
            <th>
                <input name="name[]" style="height: 36px; margin-bottom: 8px" required autocomplete="off"
                          placeholder=" পরীক্ষার্থীর নাম লিখুন"
                          class="form-control" />
            </th>
            <th>
                <input type="tel" name="mobile_number[]" pattern="(^(\\+88|0088)?(01){1}[3456789]{1}(\\d){8})$" autocomplete="off"
                   class="form-control" placeholder="মোবাইল নং লিখুন"
                          required />
            </th>
            <th>
                <input type="email" name="email[]" autocomplete="off"
                   class="form-control" placeholder=" ইমেইল লিখুন"
                          required>
            </th>
            <th>
                <input type="text" name="password[]" autocomplete="off"
                       class="form-control"

                >
            </th>
            <th>
                <a href="#" tabindex="-1" class="add-row"> <i class="fa fa-plus text-success"
                                                aria-hidden="true"></i></a>
                <a href="#" tabindex="-1" class="delete-row"><i class="fa fa-trash text-danger"
                                                  aria-hidden="true"></i> </a>
            </th>
        </tr>
        `





    </script>

@endpush
