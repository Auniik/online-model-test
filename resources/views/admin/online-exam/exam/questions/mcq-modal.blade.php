<div class="modal fade" id="MCQQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form action="{{route('exam-questions.store', $exam)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> বহুনির্বাচনী প্রশ্ন তৈরী করুন</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mcq-question-details">
                        <input type="hidden" name="type" value="mcq">
                        <div class="form-group row">
                            <label class="col-2"> প্রশ্নের টাইটেল</label>
                            <input
                                type="text"
                                class="form-control col-9"
                                placeholder="টাইটেল"
                                name="title"
                                required
                                autocomplete="off"
                            />
                        </div>
                        <div class="form-group row">
                            <label class="col-2"> বিবরন (যদি থাকে)</label>
                            <textarea
                                name="description"
                                placeholder="বিবরন"
                                class="form-control col-9"></textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-2"> ছবি (যদি থাকে)</label>
                            <input type="file" class="form-control col-9" name="file">
                        </div>
                        <div class="row">
                            <div class="col-6 text-center">
                                <h4 > অপশনসমূহ</h4>
                                <div class="row text-right my-3">
                                    <div class="col-8 offset-lg-1">
                                        <textarea
                                            class="form-control"
                                            style="height:35px"
                                            placeholder="অপশন ১" required
                                            name="value[]"></textarea>
                                    </div>
                                    <div class="col-3 text-left">
                                        <label class="control-label">
                                            <input type="radio" value="0" required name="is_correct">
                                            সঠিক উত্তর
                                        </label>
                                    </div>
                                </div>
                                <div class="row text-right my-3">
                                    <div class="col-8 offset-lg-1">
                                        <textarea class="form-control" required style="height:35px" placeholder="অপশন ২"
                                          name="value[]"></textarea>
                                    </div>
                                    <div class="col-3 text-left">
                                        <label class="control-label">
                                            <input type="radio" value="1" required name="is_correct">
                                            সঠিক উত্তর
                                        </label>
                                    </div>
                                </div>
                                <div class="row text-right my-3">
                                    <div class="col-8 offset-lg-1">
                                        <textarea class="form-control" required style="height:35px" placeholder="অপশন ৩"
                                          name="value[]"></textarea>
                                    </div>
                                    <div class="col-3 text-left">
                                        <label class="control-label">
                                            <input type="radio" value="2" required name="is_correct">
                                            সঠিক উত্তর
                                        </label>
                                    </div>
                                </div>
                                <div class="row text-right my-3">
                                    <div class="col-8 offset-lg-1">
                                        <textarea class="form-control" required style="height:35px" placeholder=" অপশন ৪"
                                          name="value[]"></textarea>
                                    </div>
                                    <div class="col-3 text-left">
                                        <label class="control-label">
                                            <input type="radio" value="3" required name="is_correct">
                                             সঠিক উত্তর
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> বাদ দিন</button>
                    <button type="submit" class="btn btn-primary"> সেভ করুন</button>
                </div>
            </form>
        </div>
    </div>
</div>
