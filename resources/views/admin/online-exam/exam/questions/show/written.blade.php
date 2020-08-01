<form action="{{route('exam-questions.update', $question)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> বর্ণনামূলক প্রশ্ন  হালনাগাদ করুন</h5>
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
                    placeholder="প্রশ্নের টাইটেল"
                    name="title"
                    autocomplete="off"
                    value="{{$question->title}}"
                />
            </div>
            <div class="form-group row">
                <label class="col-2">প্রশ্নের  বিরবণ</label>
                <div class="col-9">
                    {!! $question->description !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2"> ছবি ( যদি থাকে)</label>
                <input type="file"
                       class="form-control col-9"
                       name="file"
                />
                @if ($question->file)
                    <img src="{{url($question->file)}}" class="col-9 offset-2 mt-4" alt="ছবি">
                @endif
            </div>
            <div class="form-group row remarks">
                <label class="col-2"> মার্ক  *</label>
                <input
                    type="text"
                    class="form-control col-9"
                    name="remarks"
                    value="{{$question->remarks}}"
                />
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>
