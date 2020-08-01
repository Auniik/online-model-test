@extends('admin.master')

@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" id="add-new" class="btn float-right btn-primary"> নতুন পরীক্ষার্থী যোগ করুন
                    </button>
                    <h4 class="col-3"><span id="header-title"> সকল পরীক্ষার্থী সমূহ</span></h4>
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
                                    <th> মোবাইল নং</th>
                                    <th> কুইজ খেলেছেন মোট</th>
                                    <th>  পরীক্ষা দিয়েছেন মোট</th>
                                    <th> বিদ্যালয়</th>
                                    <th> জেলা</th>
                                    <th> বিভাগ</th>
                                    <th> র‍্যাংক</th>
                                    <th width="1">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($participants as $participant)
                                    <tr>
                                        <td>{{$participant->name}}</td>
{{--                                        <td>{{$participant->username}}</td>--}}
                                        <td>{{$participant->email}}</td>
                                        <td>{{$participant->mobile_number}}</td>
                                        <td>{{$participant->participatedQuizzes->count()}}</td>
                                        <td>{{$participant->participatedExams->count()}}</td>
                                        <td>{{$participant->school_name}}</td>
                                        <td>{{$participant->district}}</td>
                                        <td>{{$participant->division}}</td>
                                        <td>
                                            {{$participant->score}}
                                        </td>
                                        <td>
                                            <a class="deletable"
                                               title="Delete"
                                               href="{{route('participants.destroy',  $participant->id)}}">
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

        @include('admin.participant.create-modal')


    </div>
@endsection

@push('script')
    <script>

        const url = "{{route('participants.store')}}"

        $(document).ready(function () {
            $('#add-new').click(function () {
                $('#NewParticipantModal').modal('show')
                $('#refForm').attr('action', url)
                newParticipantRow()
            })
        })
        $(document).on('click', '.add-row', () => {
            newParticipantRow()

        })

        $(document).on('click', '.delete-row', (e) => {
            $(e.target).parents('.participant-row').remove();
        })

        $(document).on('hidden.bs.modal', '#NewParticipantModal', function (e) {
            $('.participant-group').html('')
        })

        function newParticipantRow() {
            $('.participant-group').append(participantRow)
        }

        const participantRow = `
        <tr class="participant-row">
            <th>
                <input name="name[]" style="height: 36px; margin-bottom: 8px" required autocomplete="off"
                          placeholder="Please enter name for the participant"
                          class="form-control" />
            </th>
            <th>
                <input type="tel" name="mobile_number[]" pattern="(^(\\+88|0088)?(01){1}[3456789]{1}(\\d){8})$" autocomplete="off"
                   class="form-control"
                          required />
            </th>
            <th>
                <input type="email" name="email[]" autocomplete="off"
                   class="form-control"
                          required>
            </th>
            <th>
                <input type="text" name="password[]" autocomplete="off"
                       class="form-control"
                       required>
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
