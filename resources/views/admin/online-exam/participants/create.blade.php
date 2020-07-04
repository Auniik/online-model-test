<div class="modal fade" id="ParticipantModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('participants.store')}}" method="post">
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
                            <label class="col-2">Name *</label>
                            <input
                                type="text"
                                class="form-control col-9"
                                placeholder="Participant Name"
                                name="name"
                                autocomplete="off"
                            />
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="type" value="written">
                            <label class="col-2">Mobile Number *</label>
                            <input
                                type="text"
                                class="form-control col-9"
                                placeholder="Mobile Number"
                                name="mobile_number"
                                autocomplete="off"
                            />
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
