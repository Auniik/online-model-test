<div class="modal fade" id="MCQQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form action="{{route('exam-questions.store', $exam)}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new MCQ Question</h5>
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
                            />
                        </div>
                        <div class="form-group row">
                            <label class="col-2">Description</label>
                            <textarea
                                name="description"
                                placeholder="Description"
                                class="form-contro col-9"></textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-2">File</label>
                            <input type="file" class="form-control col-9" name="file">
                        </div>
                        <div class="row">
                            <div class="col-6 text-center">
                                <h4 >Options</h4>
                                <div class="row text-right my-3">
                                    <div class="col-8 offset-lg-1">
                                        <textarea
                                            class="form-control"
                                            style="height:35px"
                                            placeholder="Option 1"
                                            name="value[]"></textarea>
                                    </div>
                                    <div class="col-3 text-left">
                                        <label class="control-label">
                                            <input type="radio" value="0" name="is_correct">
                                            is Correct
                                        </label>
                                    </div>
                                </div>
                                <div class="row text-right my-3">
                                    <div class="col-8 offset-lg-1">
                                        <textarea class="form-control" style="height:35px" placeholder="Option 2"
                                          name="value[]"></textarea>
                                    </div>
                                    <div class="col-3 text-left">
                                        <label class="control-label">
                                            <input type="radio" value="1" name="is_correct">
                                            is Correct
                                        </label>
                                    </div>
                                </div>
                                <div class="row text-right my-3">
                                    <div class="col-8 offset-lg-1">
                                        <textarea class="form-control" style="height:35px" placeholder="Option 3"
                                          name="value[]"></textarea>
                                    </div>
                                    <div class="col-3 text-left">
                                        <label class="control-label">
                                            <input type="radio" value="2" name="is_correct">
                                            is Correct
                                        </label>
                                    </div>
                                </div>
                                <div class="row text-right my-3">
                                    <div class="col-8 offset-lg-1">
                                        <textarea class="form-control" style="height:35px" placeholder="Option 4"
                                          name="value[]"></textarea>
                                    </div>
                                    <div class="col-3 text-left">
                                        <label class="control-label">
                                            <input type="radio" value="3" name="is_correct">
                                            is Correct
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group row">
                                    <select name="level" class="form-control col-9 offset-1" required>
                                        @foreach(config('exam.levels') as $level)
                                            <option value="{{$level}}">{{__('default')[$level]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <textarea name="solution" style="height: 179px" placeholder="Solution"
                                              class="form-control
                                    col-9 offset-1"></textarea>
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
        </div>
    </div>
</div>
