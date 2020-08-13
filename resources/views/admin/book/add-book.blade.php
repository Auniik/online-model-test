@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0"> সকল বইসমূহ দেখুন</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered w-100">
                        <thead>
                        <tr>
                            <th width="1%">#</th>
                            <th> শিরোনাম</th>
                            <th> প্রশ্নশমূহ</th>
                            <th> কভার ছবি</th>
                            <th>Reward  ছবি</th>
                            <th width="1%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($books as $book)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$book->title}}</td>
                                <td align="center">
                                    <a class="btn btn-info" href="{{route('book-questions.index', $book)}}">
                                        {{$book->questions_count}}
                                    </a>
                                </td>
                                <td>
                                    <img src="{{asset($book->cover_image)}}"
                                         style="display: inline-block;width: 50px;margin: 0 10px" alt="">
                                </td>
                                <td>
                                    <img src="{{asset($book->reward_image)}}"
                                         style="display: inline-block;width: 50px;margin: 0 10px" alt="">
                                </td>
                                <td>
                                    {{--<a href="/edit-book/{{$book->id}}{{route('edit-book')}}" class=""><i class="fa fa-edit"></i></a>--}}
                                    <a href="{{route('edit-book',['id'=>$book->id])}}" class=""><i class="fa fa-edit"></i></a>
                                    <a href="{{route('delete-book',$book)}}" class="deletable"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{$books->links()}}
                    </div>
                </div>

            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
