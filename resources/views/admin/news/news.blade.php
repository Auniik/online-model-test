@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0">Manage News Updates</h4>
                </div>
                <div class="card-body">
                    @include('front.partials.notifications')
                    <p class="text-muted mb-4 font-14"></p>
                    <table class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th class="1%">#</th>
                            <th>Title</th>
                            <th class="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($news as $new)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$new->title}}</td>
                                <td>
                                    <a href="{{route('edit-news',['id'=>$new->id])}}" class=""><i class="fa fa-edit"></i></a>
                                    <a href="{{route('delete-news',['id'=>$new->id])}}" class=""><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="float: right">
                        {{$news->render()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0">Add News Update</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('new-news')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-1 col-form-label text-right">Title</label>
                            <div class="col-sm-11">
                                <input class="form-control" autocomplete="off" type="text" value="" name="title">
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
