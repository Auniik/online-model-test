<!---------------------------- সৃজনশীলতা অংশ শুরু --------------->

<section id="creativity-part">
    <div class="container-fulied">
        <div class="text_center">
            <h1>সৃজনশীলতা</h1>
        </div>

        <div class="row online-left">
            @foreach($books as $book)
                <div class="col-lg col-md-6 col-sm-6">
                    <div class="row book-img">
                        @if ($book->img)
                            <img src="{{asset($book->img->image)}}" alt="raiting1.jpg">
                        @else
                            <img src="/front-end/images/raiting1.jpg" alt="raiting1.jpg">
                        @endif
                        <div class="img-overlay text-center">
                            <a href="{{route('book.details',$book->id)}}" target="_blank">
                                <div class="text-part">
                                    <p>{{$book->title}}</p>
                                    @include('front._partials.share', ['url' => route('book.details',$book->id)])
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

<!---------------------------- সৃজনশীলতা অংশ শেষ --------------->
