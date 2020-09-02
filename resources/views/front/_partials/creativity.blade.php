<!---------------------------- সৃজনশীলতা অংশ শুরু --------------->

<section id="creativity-part">
    <div class="container-fulied">
        <div class="text_center">
            <h1>সৃজনশীলতা</h1>
        </div>

        <div class="row online-left">
            @foreach($books ?? [] as $book)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="row book-img shadow">
                        @if ($book->img)
                            <img src="{{asset($book->cover_image)}}" alt="{{$book->title}}">
                        @else
                            <img src="/front-end/images/raiting1.jpg" alt="raiting1.jpg">
                        @endif
                        <div class="img-overlay text-center">
                            <a href="{{url("/book/details/{$book->id}?ref=book&id={$book->id}")}}" target="_blank">
                                <div class="text-part">
                                    <p>{{$book->title}}</p>
                                </div>
                            </a>
                        </div>
                        <div class="py-2 w-100 text-center d-flex" style="z-index: 2; justify-content: space-around">
                           <span class="text-white">{{$book->created_at->format('M d, Y h:i A')}}</span>
                            @include('front._partials.share', [
                                'url' => url("/book/details/{$book->id}?ref=book&id={$book->id}")
                            ])
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!---------------------------- সৃজনশীলতা অংশ শেষ --------------->
