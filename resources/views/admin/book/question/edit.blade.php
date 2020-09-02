@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0"> প্রশ্ন হালনাগাদ করুন</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.book.question.update',$question->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h3>{{Session::get('message')}}</h3>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> বই</label>
                            <div class="col-sm-10">
                                <select name="book_id" class="form-control" id="" required>
                                    <option value=""> বই</option>
                                    @foreach($books as $id => $title)

                                        <option value="{{$id}}" {{$question->book_id== $id ?
                                        'selected' : ''}}>{{$title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> প্রশ্ন</label>
                            <div class="col-sm-10">
                                <textarea name="question" class="form-control" id="editor">{!! $question->question !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" {{$question->status==1?'checked':''}} value="1"/>
                                        <span> পাবলিশ</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" {{$question->status==0?'checked':''}} value="0"/>
                                        <span> আনপাবলিশ</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 offset-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
