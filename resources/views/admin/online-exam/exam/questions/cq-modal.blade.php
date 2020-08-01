<div class="modal fade" id="CQQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form action="{{route('exam-questions.store', $exam)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> সৃজনশীল প্রশ্ন তৈরী করুন</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-2"> টাইটেল</label>
                        <input
                            type="text"
                            class="form-control col-9"
                            placeholder="নিচের উদ্দীপকটি পড়ে প্রশ্নগুলোর উত্তর দিন"
                            value="নিচের উদ্দীপকটি পড়ে প্রশ্নগুলোর উত্তর দিন"
                            name="title"
                            required
                        />
                    </div>
                    <div class="form-group row">
                        <label class="col-2"> উদ্দীপক</label>
                        <textarea
                            name="description"
                            placeholder="..."
                            class="form-control col-9"></textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-2"> উদ্দীপকে ছবি (যদি থাকে)</label>
                        <input type="file"
                               class="form-control col-9"
                               name="file"
                        />
                    </div>
                    <input type="hidden" name="type" value="cq">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h4 > প্রশ্নসমূহ</h4>
                            <div class="cq-question-details">
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
