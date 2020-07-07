<form action="" method="post">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View answer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="question-details">
            <div class="form-group row">
                <label class="col-2">Title</label>
                <div class="col-9 title-block">{{$question->title}}</div>
            </div>
            <div class="form-group row">
                <label class="col-2">Description</label>
                <div class="col-9 description-block">{{$question->description}}</div>
            </div>
            @if ($question->file)
                <div class="form-group row">
                    <label class="col-2">File</label>
                    <div class="col-9 file-block">
                        <img src="{{$question->file}}" alt="img">
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <h4 class="text-left">Answer</h4>
                    <div class="answer-bl">
                        {!! $answer->answer !!}
                    </div>
                </div>
                <div class="col-12">
                    @if ($answer->attachments)
                        <h4 class="text-left">Images</h4>
                        <div class="answer-bl">
                            $answer->attachments
                        </div>
                    @endif
                </div>
                <hr>
                <div class="col-12">
                    <div class="mt-5">
                        <label for="">Remarks</label>
                        <input type="number" class="form-control" min="0" max="{{$max_remarks}}"
                               value="{{$answer->remarks
                        }}" >
                        <small>Out of {{$max_remarks}}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
