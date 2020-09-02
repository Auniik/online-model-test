<div class="modal fade" id="WrittenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('exam-questions.store', $exam)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> বর্ণনামূলক প্রশ্ন তৈরী করুন</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="written-question-details">
                        <div class="form-group row">
                            <input type="hidden" name="type" value="written">
                            <label class="col-2"> প্রশ্নের টাইটেল *</label>
                            <input
                                type="text"
                                class="form-control col-9"
                                placeholder="প্রশ্নের টাইটেল"
                                name="title"
                                autocomplete="off"
                                required
                            />
                        </div>
                        <div class="form-group row">
                            <label class="col-2"> বিবরণ</label>
                            <textarea name="description"
                                      style="height: 250px"
                                      placeholder="বিবরণ"
                                      id="editor"
                                      class="form-control col-9"></textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-2"> ফাইল (যদি  থাকে)</label>
                            <input type="file"
                                   class="form-control col-9"
                                   name="file"
                            />
                        </div>
                        <div class="form-group row remarks">
                            <label class="col-2"> মার্ক *</label>
                            <input
                                type="number"
                                min="0"
                                class="form-control col-9 integer"
                                name="remarks"
                                required
                            />
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
