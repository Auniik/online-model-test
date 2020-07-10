<form action="{{route('exam-questions.update', $question)}}" method="post">
    @csrf
    @method('patch')
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit CQ Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="cq-question-details">
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
                <input type="file"
                       class="form-control col-9"
                       name="file"
                />
                {{$question->file}}
            </div>
            <input type="hidden" name="type" value="cq">
            <div class="row">
                <div class="col-12 text-center">
                    <h4 >Questions</h4>
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
                                <input type="type" class="form-control" placeholder="Remarks" value="{{$cq->max_remarks}}"
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
