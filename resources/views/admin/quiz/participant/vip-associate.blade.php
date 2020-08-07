<style>

    .select2-container{
        width: 80%!important;
    }
    .select2-search--dropdown .select2-search__field {
        width: 80%;
    }


</style>
<div class="modal fade" id="VIPParticipantAssignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form action="{{route('quiz-participants.store', $quiz)}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> অতিথী পরীক্ষার্থী যোগ করুন</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="written-question-details">
                        <div class="form-group row">
                            <input type="hidden" name="participant_type" value="vip">
                            <label class="col-2">Type</label>
                            <input type="text" class="form-control col-8" disabled placeholder="অতিথী">
                        </div>
                        <div class="form-group row">
                            <label class="col-2">Select Existing</label>
                            <select class="select2 form-control" name="ids[]" multiple>
                                @foreach($participants ?? [] as $id => $name)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>

                        <div class="participants d-none">
                            <table class="table table-bordered  table-hover">
                                <thead>
                                <tr>
                                    <th>Participant Name</th>
                                    <th width="18%">Mobile Number</th>
                                    <th width="18%">Email</th>
                                    <th width="18%">Password</th>
                                    <th width="1%">#</th>
                                </tr>
                                </thead>
                                <tbody class="participant-group">

                                </tbody>

                            </table>

                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-success add-new-participants mb-4">Add More</button>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
