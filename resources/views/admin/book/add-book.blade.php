@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0">Manage About</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4 font-14"></p>
                    <table class="table table-striped table-bordered w-100">
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
                    <div class="pull-right">
                        {{$books->links()}}
                    </div>
                </div>

            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
