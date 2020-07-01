@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('front.partials.notifications')
                    <form action="{{route('admin.book.question.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4 class="mt-0 header-title">Add Book Question</h4>
                        <h3>{{Session::get('message')}}</h3>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Book</label>
                            <div class="col-sm-10">
                                <select name="book_id" class="form-control" id="" required>
                                    <option value="">Select Book</option>
                                    @foreach($books as $book)
                                        <option value="{{$book->id}}">{{$book->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Question</label>
                            <div class="col-sm-10">
                                <textarea name="question" class="form-control" id="editor"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" checked value="1"/>
                                        <span>Active</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" value="0"/>
                                        <span>Inactive</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 offset-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Question List</h4>
                    <p class="text-muted mb-4 font-14"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Book ID</th>
                            <th>Book</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->book->id}}</td>
                                <td>{{$item->book->title}}</td>
                                <td>{{$item->status==1?'Active':'Inactive'}}</td>
                                <td>
                                    <a href="{{route('admin.book.question.edit',$item->id)}}" class=""><i
                                                class="fa fa-edit"></i></a>
                                    <a href="{{route('admin.book.question.delete',$item->id)}}" class=""><i
                                                class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection