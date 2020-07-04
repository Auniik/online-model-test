<div class="modal fade" id="WrittenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('exam-questions.store', $exam)}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Written Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="written-question-details">
                        <div class="form-group row">
                            <input type="hidden" name="type" value="written">
                            <label class="col-2">Title *</label>
                            <input
                                type="text"
                                class="form-control col-9"
                                placeholder="Title"
                                name="title"
                            />
                        </div>
                        <div class="form-group row">
                            <label class="col-2">Description</label>
                            <textarea name="description"
                                      style="height: 250px"
                                      placeholder="Description"
                                      class="form-control col-9"></textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-2">File</label>
                            <input type="file"
                                   class="form-control col-9"
                                   name="file"
                            />
                        </div>
                        <div class="form-group row remarks">
                            <label class="col-2">Remarks *</label>
                            <input
                                type="text"
                                class="form-control col-9"
                                name="remarks"
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
