<form action="{{route('exam-questions.update', $question)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> সৃজনশীল প্রশ্ন হালনাগাদ করুন</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="cq-question-details">
            <div class="form-group row">
                <label class="col-2">টাইটেল</label>
                <input
                    type="text"
                    class="form-control col-9"
                    placeholder="টাইটেল"
                    name="title"
                    value="{{$question->title}}"
                    required
                />
            </div>
            <div class="form-group row">
                <label class="col-2">উদ্দীপক</label>
                <textarea
                    name="description"
                    placeholder="Description"
                    class="form-control col-9">{{$question->description}}</textarea>
            </div>
            <div class="form-group row">
                <label class="col-2">উদ্দীপকে ছবি</label>
                <input type="file"
                       class="form-control col-9"
                       name="file"
                />
                @if ($question->file)
                    <img src="{{url($question->file)}}" class="col-9 offset-2 mt-4" alt=" উদ্দীপকের ছবি">
                @endif

            </div>
            <input type="hidden" name="type" value="cq">
            <div class="row">
                <div class="col-12 text-center">
                    <h4 >প্রশ্নসমূহ</h4>
                </div>
                <div class="col-12">
                    @foreach($cqs as $k => $cq)
                        <div class="row question-meta text-right my-3 ">
                            <div class="col-1 text-center">
                                <h4>{{++$k}}</h4>
                            </div>
                            <div class="col-2">
                                <input type="hidden" class="form-control" value="{{$cq->level}}"
                                       readonly/>
                                <input type="text" class="form-control"
                                       value="{{trans('default')[$cq->level]}}"
                                       readonly/>
                            </div>
                            <div class="col-6">
                        <textarea class="form-control" style="height:35px" required placeholder="Question Title"
                                  name="name[]">{{$cq->title}}</textarea>
                            </div>
                            <div class="col-2">
                                <input type="number" class="form-control" placeholder="Remarks" value="{{$cq->max_remarks}}"
                                       required
                                       name="max_remarks[]">
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
