@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 > সৃজনশীলতা প্রশ্নসমূহ</h4>
                    @php($book = request('book'))
                    <a href="/book/question/create?id={{$book?$book->id:''}}" style="height: 35px; " class="btn
                    btn-primary col-1">Add new</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th> #</th>
                            <th>Book ID</th>
                            <th> বই</th>
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

                    <div class="pull-right">
                        {{$questions->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
