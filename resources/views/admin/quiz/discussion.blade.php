@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <form   action="{{route('quiz-discussion.update', $question)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a title="{{$question->title}}" class="btn btn-primary float-right" href="{{route
                        ('quiz-questions.index', $question->quiz)}}">
                             প্রশ্নসমূহ দেখুন
                        </a>
                        <h4><span id="header-title">আলাপচারিতা {{$discussion ? '  হালনাগাদ করুন ': ' যোগ করুন'}}</span></h4>
                    </div>
                    <div class="card-body">
                        <input type="hidden" id="id" class="form-control" name="id">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">  শিরোনাম
                                *</label>
                            <div class="col-sm-10">
                                <input
                                    class="form-control"
                                    type="text"
                                    value="{{optional($discussion)->title}}"
                                    placeholder="Title"
                                    name="title"
                                    autocomplete="off"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">  ছবি</label>
                            <div class="col-sm-2">
                                <img src="/{{optional($discussion)->image}}" class="img img-fluid" style="height: 70px"
                                     alt="{{optional($discussion)->name}}"
                                >
                            </div>
                            <div class="col-sm-8">
                                @if (optional($discussion)->image)
                                    <p class="text-warning"> উক্ত ছবিটি বাদ দিয়ে নতুন ছবি যুক্ত করতে চান ? তবে
                                        নিচেবাছাই বাছাই করুন </p>
                                @endif
                                <input type="file" class="form-control" placeholder="Image" name="image" accept="image/*">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">  বিস্তারিত আলোচনা</label>
                            <div class="col-sm-10">
                                <textarea name="description" id="editor"
                                          class="form-control">{{optional($discussion)->description}}</textarea>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 offset-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"> সেভ করুন
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5"
                                        onclick="location.reload()"> বাদ দিন
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
