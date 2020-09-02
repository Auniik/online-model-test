@extends('admin.master')
@push('style')
    <style>
        .img-wraps {
            position: relative;
            display: inline-block;

            font-size: 0;
        }
        .img-wraps .closes {
            position: absolute;
            top: 5px;
            right: 8px;
            z-index: 100;
            background-color: #ff5a5a;
            padding: 5px 3px;
            color: #fff;
            cursor: pointer;
            text-align: center;
            font-size: 22px;
            line-height: 10px;
            border-radius: 50%;
            box-shadow: -1px 1px 2px 0px #000000ad;
            border: 1px solid #ff2b2b;
        }
        .img-wraps:hover .closes {
            opacity: 1;
        }
    </style>
@endpush
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0"> বই হালনাগাদ করুন</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('books.update', $book)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">শিরোনাম</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$book->title}}" name="title">
                                <input class="form-control" type="hidden" value="{{$book->id}}" name="id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">বিবরণ</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control"
                                          id="editor">{{$book->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Reward</label>
                            <div class="col-sm-10">
                                <textarea name="reward" class="form-control">{{$book->reward}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-sm-2">  কভার ছবি</label>
                            <div class="col-md-4 col-sm-4">
                                <input type="file" class="form-control" name="cover_image" accept="image/*" required/>
                                <small>Upload image for cover. 360x445px</small><br>
                                <img src="{{asset($book->cover_image)}}" class="shadow"
                                     style="display: inline-block;height: 150px;margin: 0 10px" alt="">
                            </div>

                            <label for="example-text-input" class="col-md-2 col-sm-2 text-right">  পুরস্কারের ছবি</label>
                            <div class="col-md-4 col-sm-4">
                                <input type="file" class="form-control" name="reward_image" accept="image/*" required/>
                                <img src="{{asset($book->reward_image)}}" class="shadow"
                                     style="display: inline-block;height: 150px;margin: 0 10px" alt="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">ছবিসমূহ</label>
                            <div class="col-sm-10 ">
                                <input type="file" class="form-control" name="book_image[]" multiple accept="image/*"/><br>

                                <div class="d-inline-block">
                                    @if(filled($book->images))
                                        @foreach($book->images as $img)
                                        <div  class="img-wraps">
                                            <span onclick="deleteImage('{{$img->id}}', this)"
                                                  class="closes" title="Delete">&times;
                                            </span>
                                            <img src="{{asset($img->image)}}" height="150px" class="m-2 shadow" >
                                        </div>
                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio"
                                               {{$book->status=='1'?'checked':''}} value="1"/>
                                        <span> পাবলিশ</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio"
                                               {{$book->status=='0'?'checked':''}} value="0"/>
                                        <span> আনপাবলিশ</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 offset-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"> সেভ করুন
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5"> বাদ দিন</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection

@push('script')
    <script>
        function deleteImage(id, element) {
            const flag = confirm('Are you sure want to delete this image ?');
            if(flag) {
                $.ajax({
                    url: `/delete-book-image/${id}`,
                    type: 'POST',
                    data: {
                        _token: "{{csrf_token()}}"
                    }
                }).done(function (data) {
                    toastr.success(data.message)
                    $(element).parents('.img-wraps').remove()
                });

            }


        }
    </script>
@endpush
