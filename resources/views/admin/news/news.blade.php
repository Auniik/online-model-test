@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0"> নিউজ আপডেট সমূহ দেখুন</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th class="1%">#</th>
                            <th> শিরোনাম</th>
                            <th> লিঙ্ক</th>
                            <th class="1%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($newses as $news)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$news->title}}</td>
                                <td>
                                    <a class="text-primary" target="_blank" href="{{$news->link}}">{{$news->link}}</a>
                                </td>
                                <td>
                                    <a href="{{route('newses.edit', $news)}}" class=""><i class="fa fa-edit"></i></a>
                                    <a href="{{route('newses.destroy', $news)}}" class="deletable"><i class="fa
                                    fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="float: right">
                        {{$newses->render()}}
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
                    <h4 class="mt-0"> নতুন নিউজ আপডেট যুক্ত করুন</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('newses.store')}}" method="POST" >
                    @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-1 col-form-label text-right">Title</label>
                            <div class="col-sm-11">
                                <input class="form-control" autocomplete="off" type="text" value="" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-1 col-form-label text-right">Redirect
                                URL</label>
                            <div class="col-sm-11">
                                <input class="form-control" autocomplete="off" type="text"
                                       placeholder="https://your-url.com"
                                       name="link">
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
