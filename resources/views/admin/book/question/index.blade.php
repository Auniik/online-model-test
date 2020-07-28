@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 >Book Question List</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4 font-14"></p>
                    <table class="table table-striped table-bordered w-100">
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

                    <div class="pull-right">
                        {{$questions->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
