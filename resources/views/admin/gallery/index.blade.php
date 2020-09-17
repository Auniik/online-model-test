@extends('admin.master')
@section('body')
    <div class="row m-t-15">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mt-0"> ছবির গ্যালারী</h4>
                    <a class="btn btn-primary" href="{{route('galleries.create')}}"> নতুন গ্যালারী যোগ করুন</a>
                </div>
                <div class="card-body">

                    @foreach($galleries as $gallery)
                        <div class="card" style="width: 18rem;">
                            <a href="{{route('gallery-photos.index', $gallery) }}">
                                <img class="card-img-top" src="{{asset($gallery->image)}}" alt="{{$gallery->title}}">
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">{{$gallery->title}}</h5>
                                <p class="card-text">
                                    {{\Illuminate\Support\Str::limit($gallery->short_descriptions, 100)}}
                                </p>
                            </div>
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        <a class="btn btn-sm btn-success" href="{{route('gallery-photos.index', $gallery) }}"> ছবিসমূহ ({{$gallery->photos_count}})</a>
                                    </div>
                                    <div>
                                        <a href="{{route('galleries.edit', $gallery)}}" class=""><i class="fa
                                fa-edit"></i></a>
                                        <a href="{{route('galleries.destroy', $gallery)}}" class="deletable"><i class="fa
                                fa-trash"></i></a>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    @if ($gallery->is_slider)
                                        <a class="btn btn-success btn-circle" href="#">
                                            স্লাইডার অন হয়েছে
                                        </a>
                                    @else
                                        <form action="{{route('galleries.slider', $gallery)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary btn-circle">
                                                স্লাইডার হিসেবে চিহ্নিত করুন
                                            </button>
                                        </form>

                                     @endif
                                </li>
                            </ul>
                        @endforeach

                            {{$galleries->links()}}

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
