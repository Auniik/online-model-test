<form action="{{route('answers-remark.store', $answer->id)}}" method="post">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> উত্তর দেখুন</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="question-details">
            <div class="row">
                <div class="col-10 mb-4 mx-5">
                    <h5 class="text-left">প্রশ্নঃ </h5>
                    <b>{{$question->title}}</b>
                </div>
            </div>

            @if ($question->description)
                <div class="row">
                    <div class="col-10 mb-4 mx-5">
                        <h5 class="text-left"> বিবরণ: </h5>
                        <b>{!! $question->description !!}</b>
                    </div>
                </div>
            @endif

            @if ($question->file)
                <div class="form-group row">
                    <div class="col-10  mx-5 file-block">
                        <img src="{{url($question->file)}}" class="w-100" alt="img">
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-10 mb-4 mx-5">
                    <h5 class="text-left"> উত্তরঃ </h5>
                    <b class="text-wrap">{{$answer->answer}}</b>
                </div>
                <div class="col-6 mt-5 offset-md-3">
                    @if (filled($answer->attachments))
                        <h6 class="text-left">ফাইল সমূহঃ</h6>
                        <div class="answer-bl">
                            <ul class="list-group margin_left">
                                @foreach($answer->attachments as $attachment)
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-1">
                                        <a href="/{{$attachment->path}}" class="text-info"
                                           target="_blank">{{$attachment->name}}</a>

                                        <a href="/{{$attachment->path}}" download class="btn btn-sm btn-default"
                                           style="padding: 0"><i
                                                class="fa fa-download"></i></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <hr>
                <div class="col-10 mx-5 mx-5">
                    <label for="">Remarks</label>
                    <input type="number"
                           class="form-control integer"
                           name="remark"
                           min="0"
                           max="{{$max_remarks}}"
                           value="{{$answer->remarks}}"
                    >
                    <small>Out of {{$max_remarks}}</small>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
