@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0"> যোগাযোগ </h4>
                </div>
                <div class="card-body">
                    <form action="{{route('contacts.update', $contract)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> শিরোনাম</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$contract->title}}" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> ইমেইল</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" value="{{$contract->email}}" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> মোবাইল</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$contract->phone}}"
                                       name="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> বর্ণণা</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description">{{$contract->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> ঠিকানা</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="address">{{$contract->address}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row d-none">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> ছবি</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-file" placeholder="Image" name="image" accept="image/*" >
                                <img src="{{asset($contract->image)}}" class="img-fluid my-3">
                            </div>
                        </div>
                        <div class="form-group row d-none">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" checked value="1" />
                                        <span>  পাবলিশ</span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio"   value="0"/>
                                        <span> আনপাবলিশ</span>
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
@endsection
