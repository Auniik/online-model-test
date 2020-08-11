@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0"> পাবলিকেশন যোগ করুন</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('new-publication')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> শিরোনাম</label>
                            <div class="col-sm-10">
                                <input class="form-control" placeholder="শিরোনাম লিখুন" autocomplete="off" type="text"
                                       value=""
                                       name="title"
                                       required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> বিস্তারিত বিবরণ</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" id="editor" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">  কভার ছবি</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" placeholder="Choose a image File" name="image"
                                       accept="image/*" required>
                                <small>Please make sure you entered the image file, Preferable resolution should be
                                    in 480x600 (px)
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> ফাইল</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" placeholder="Choose a PDF File" name="file"
                                       accept="application/pdf" required>
                                <small>Please make sure you entered the pdf file</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-radio">
                                    <label>
                                        <input name="status" type="radio" checked value="1" />
                                        <span> পাবলিশ</span>
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
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0"> পাবলিকেশনস ম্যানেজ করুন</h4>
                </div>
                <div class="card-body">
                    <table  class="table table-striped table-condensed table-bordered w-100">
                        <thead>
                        <tr>
                            <th width="1%">#</th>
                            <th> শিরোনাম</th>
                            <th>  কভার ইমেজ</th>
                            <th> ফাইল</th>
                            <th width="5%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($publications as $publication)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$publication->title}}</td>
                                <td>
                                    <img src="{{url($publication->image)}}" height="40px" alt="">
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success" target="_blank" href="/{{$publication->file}}"> ফাইল
                                        দেখুন</a>
                                </td>
                                <td>
                                    <a href="{{route('edit-publication',['id'=>$publication->id])}}" class=""><i class="fa fa-edit"></i></a>
                                    <a title="Delete"
                                       class="deletable"
                                       href="{{route('publications.destroy', $publication)}}">
                                        <i class="fa fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="pull-right">
                        {{$publications->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
