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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('quiz-participants.store', $quiz)}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new VIP Participant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="written-question-details">
                        <div class="form-group row">
                            <label class="col-2">Add New</label>
                            <select class="select2-tags form-control"
                                    name="participants[]" multiple>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-2">Password </label>
                            <input type="text" class="form-control col-9" autocomplete="off" name="password"
                                   placeholder=" পাসওয়ার্ড">
                            <p class="col-10 offset-2">Note: <small>Password will set for newly added
                                    participants</small>
                            </p>
                        </div>
                        <hr class="mt-3">
                        <div class="form-group row">
                            <label class="col-2">Select Existing</label>
                            <select class="select2 form-control" name="ids[]" multiple>
                                @foreach($participants ?? [] as $id => $name)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <input type="hidden" name="participant_type" value="vip">
                            <label class="col-2">Type</label>
                            <input type="text" class="form-control col-8" disabled placeholder="অতিথী">
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
