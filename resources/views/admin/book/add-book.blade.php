@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('new-book')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4 class="mt-0 header-title">Add Book</h4>
                        <h3>{{Session::get('message')}}</h3>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" id="editor"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Reward</label>
                            <div class="col-sm-10">
                                <textarea name="reward" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                {{--<input type="file" class="form-file" placeholder="Image" name="image" accept="image/*" required>--}}
                                <input type="file" name="book_image[]" multiple accept="image/*"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" checked value="1"/>
                                        <span>Publish</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" value="0"/>
                                        <span>Unpublish</span>
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
                    <h4 class="mt-0 header-title">Manage About</h4>
                    <p class="text-muted mb-4 font-14"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($books as $book)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$book->title}}</td>
                                <td>
                                    @foreach($book->images as $img)
                                        <img src="{{asset($img->image)}}"
                                             style="display: inline-block;width: 50px;margin: 0 10px" alt="">
                                    @endforeach
                                </td>
                                <td>
                                    {{--<a href="/edit-book/{{$book->id}}{{route('edit-book')}}" class=""><i class="fa fa-edit"></i></a>--}}
                                    <a href="{{route('edit-book',['id'=>$book->id])}}" class=""><i class="fa fa-edit"></i></a>
                                    <a href="{{route('delete-book',['id'=>$book->id])}}" class="" onclick="alert('Are You Delete This ')"><i class="fa fa-trash"></i></a>
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