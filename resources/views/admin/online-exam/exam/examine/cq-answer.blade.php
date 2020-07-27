<form action="{{route('answers-remark.store', $answer->id)}}" method="post">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View answer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="question-details">
            <div class="row">
                <div class="col-10  mx-5 text-bold">
                    <h6>{{$question->title}}</h6>
                </div>
            </div>
            @if ($question->description)
                <div class="row">
                    <div class="col-10 mb-4 mx-5">
                        <h5 class="text-left"> উদ্দীপকঃ </h5>
                        <b>{{$question->description}}</b>
                    </div>
                </div>
            @endif
            @if ($question->file)
                <div class="form-group row">
                    <label class="col-2">File</label>
                    <div class="col-9 file-block">
                        <img src="{{$question->file}}" alt="img">
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-10 mb-5 mx-5">
                    <div class="options-block">
                        <ol class="list-group">
                            @foreach($cqs as $k => $q)
                                <li class="list-group-item d-flex justify-content-between align-items-center
                                    ml-5 p-1">
                                    {{++$k}}. {{$q->title}}
                                    <span class="badge badge-info badge-pill">{{__('default')[$q->level]}}
                                        ({{$q->max_remarks}})</span>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="col-10 mb-4 mx-5">
                    @if (filled($answer->attachments))
                        <h6 class="text-left"> উত্তর সমূহঃ</h6>
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
                <div class="col-10 mb-4 mx-5">
                    <div class="mt-5">
                        <label for="">Remarks</label>
                        <input type="number"
                               class="form-control"
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
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
