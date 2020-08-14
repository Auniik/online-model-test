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
                    <h4 class="mt-0">{{$gallery->title}}  এর  ছবি সমূহ</h4>
                </div>
                <div class="card-body">


                    <div class="d-inline-block">
                        @if(filled($photos))
                            @foreach($photos as $photo)
                                <div  class="img-wraps" title="{{$photo->name}}">
                                            <span onclick="deleteImage('{{$photo->id}}', this)"
                                                  class="closes" title="Delete">&times;
                                            </span>
                                    <div class="card shadow">
                                        <div class="card-header py-0 my-0" style="padding-left: 2px">
                                            <h6 class="mx-0" style="font-size: 10px;">{{$photo->name}}  &nbsp; &nbsp;
                                                &nbsp;</h6>

                                        </div>
                                        <div class="card-body p-0 m-0">
                                            <img src="{{asset($photo->path)}}" height="150px" class="m-0 " >
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                                <hr>
                        @endif
                    </div>

                    <form action="{{route('gallery-photos.store', $gallery)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">  শিরোনাম</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="" autocomplete="off" name="name">
                            </div>
                        </div>
                        <div class="form-group row d-none">
                            <label for="example-text-input" class="col-sm-2 col-form-label">বিবরণ</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control"
                                          ></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">ছবি </label>
                            <div class="col-sm-10 ">
                                <input type="file" class="form-control" name="photo" accept="image/*"/><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 offset-10">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
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

@push('script')
    <script>
        function deleteImage(id, element) {
            const flag = confirm('Are you sure want to delete this image ?');
            if(flag) {
                $.ajax({
                    url: `/galleries-photos/${id}`,
                    type: 'POST',
                    data: {
                        _token: "{{csrf_token()}}",
                        _method: 'DELETE'
                    }
                }).done(function (data) {
                    toastr.success(data.message)
                    $(element).parents('.img-wraps').remove()
                });

            }


        }
    </script>
@endpush
