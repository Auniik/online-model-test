<style>

    .select2-container{
        width: 80%!important;
    }
    .select2-search--dropdown .select2-search__field {
        width: 80%;
    }
</style>

<div class="modal fade" id="ParticipantAssignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('exam-participants.store', $exam)}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Participant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="written-question-details">
                        <div class="form-group row">
                            <input type="hidden" name="type" value="written">
                            <label class="col-2">Names</label>
                            <select class="select2 form-control" name="ids[]" multiple>
                                @foreach($participants ?? [] as $id => $name)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="type" value="written">
                            <label class="col-2">Add New</label>
                            <select class="select2-tags form-control"
                                    name="participants[]" multiple>
                            </select>
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
