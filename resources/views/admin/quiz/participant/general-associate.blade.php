<style>

    .select2-container{
        width: 80%!important;
    }
    .select2-search--dropdown .select2-search__field {
        width: 80%;
    }
</style>

<div class="modal fade" id="GeneralParticipantAssignModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form action="{{route('quiz-participants.store', $quiz)}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> সাধারণ পরীক্ষার্থী যোগ করুন</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="written-question-details">
                        <div class="form-group row">
                            <label class="col-2">পুরোনো পরীক্ষার্থী  বাছাই করুন</label>
                            <select class="select2 form-control" name="ids[]" multiple>
                                @foreach($participants ?? [] as $id => $name)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="participant_type" value="general">
                            <label class="col-2"> ধরণ</label>
                            <input type="text" class="form-control col-8" disabled placeholder=" সাধারণ">
                        </div>
                        <div class="participants d-none">
                            <table class="table  table-bordered  table-hover">
                                <thead>
                                <tr>
                                    <th> নাম</th>
                                    <th width="18%"> মোবাইল নং</th>
                                    <th width="18%"> ইমেইল</th>
                                    <th width="18%"> পাসওয়ার্ড</th>
                                    <th width="1%">#</th>
                                </tr>
                                </thead>
                                <tbody class="participant-group">

                                </tbody>

                            </table>
                        </div>

                        <div class="text-center">
                            <button type="button" class="btn btn-success add-new-participants mb-4">নতুন  সাধারন
                                পরীক্ষার্থী  যুক্ত করুন</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> বাদ দিন</button>
                    <button type="submit" class="btn btn-primary"> সেভ করুন</button>
                </div>
            </form>
        </div>
    </div>
</div>
