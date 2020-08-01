<form action="{{route('answers-remark.store', $answer_id)}}" method="post">
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
                        <h5 class="text-left"> বর্ণনাঃ </h5>
                        <b>{{$question->description}}</b>
                    </div>
                </div>
            @endif
            @if ($question->file)
                <div class="form-group row">
                    <div class="col-10  mx-5 file-block">
                        <img src="{{url($question->file)}}" alt="img">
                    </div>
                </div>
            @endif

            <div class="row">

                <div class="col-10 mb-4 mx-5">
                    <h5 class="text-left"> অপশন সমূহঃ </h5>
                    <div class="options-block">
                        <ol>
                            @foreach($options as $option)
                                <li @if ($option->is_correct) style="color: green;" @endif >{{$option->value}}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="col-10 mb-4 mx-5">
                    <h5 class="text-left">  উত্তরঃ </h5>
                    <div class="answer-bl">
                        <span class="answer">
                            @if ($answer->is_correct)
                                <p style="color: green">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    <b>{{$answer->value}}</b>
                                </p>
                            @else
                                <p style="color: red">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                    <b>{{$answer->value}}</b>
                                </p>
                            @endif
                        </span>
                        <div class="mt-5">
                            <label for="">Remarks</label>
                            <input type="number" name="remark" class="form-control" readonly
                                   value="{{$answer->is_correct ?: 0 }}"
                                   @if(!$answer->is_correct) readonly @endif>
                        </div>
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
