<form action="{{route('exam-questions.update', $question)}}" method="post">
    @csrf
    @method('patch')
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit MCQ Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="mcq-question-details">
            <input type="hidden" name="type" value="mcq">
            <div class="form-group row">
                <label class="col-2">Title</label>
                <input
                    type="text"
                    class="form-control col-9"
                    placeholder="Title"
                    name="title"
                    value="{{$question->title}}"
                />
            </div>
            <div class="form-group row">
                <label class="col-2">Description</label>
                <textarea
                    name="description"
                    placeholder="Description"
                    class="form-control col-9">{{$question->description}}</textarea>
            </div>
            <div class="form-group row">
                <label class="col-2">File</label>
                <input type="file" class="form-control col-9" name="file">
            </div>
            <div class="row">
                <div class="col-6 text-center">
                    <h4 >Options</h4>
                    @foreach($options as $key =>  $option)
                        <div class="row text-right my-3">
                        <div class="col-8 offset-lg-1">
                            <textarea
                                class="form-control"
                                style="height:35px"
                                placeholder="Option {{$key + 1}}"
                                name="value[]">{{$option->value}}</textarea>
                        </div>
                        <div class="col-3 text-left">
                            <label class="control-label">
                                <input type="radio" value="{{$key}}" @if ($option->is_correct)
                                    checked
                                @endif name="is_correct">
                                is Correct
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        <select name="level" class="form-control col-9 offset-1" required>
                            @foreach(config('exam.levels') as $level)
                                <option value="{{$level}}" {{$question->level == $level ? 'selected' : ''}}>
                                    {{__('default')[$level]}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <textarea name="solution" style="height: 179px" placeholder="Solution"
                                  class="form-control
                        col-9 offset-1">{{$question->solution}}</textarea>
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
