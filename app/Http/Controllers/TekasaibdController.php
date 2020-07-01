<?php

namespace App\Http\Controllers;

use App\About;
use App\Bangabandhu;
use App\Blog;
use App\Book;
use App\BookQuestion;
use App\Contract;
use App\EventMessage;
use App\EventVideo;
use App\Gallery;
use App\Mail\ContactUsMail;
use App\News;
use App\Publication;
use App\Slider;
use App\Youtube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TekasaibdController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $contract = Contract::all();
        $news = News::orderBy('id', 'desc')->take(10)->get();
        $joint = '';
        foreach ($news as $key => $item){
            $joint .= ($key+1).'. '.$item->title.' &nbsp;&nbsp;&nbsp;&nbsp;';
        }
        //dd(Book::with('images')->orderBy('id', 'desc')->paginate(6));
        $books = Book::orderBy('id', 'desc')->paginate(6);
        foreach ($books as $book) {
            //dd($book->images);
            if (isset($book->images[0])) {
                $book->img = $book->images[0]->image;
            } else {
                $book->img = 'https://placeimg.com/184/134/nature';
            }
        }
//        dd($books);
        return view('front.home.home', [
            'news'          => $joint,
            // 'news'          => $news,
            'books'         => $books,
            'contract'      => $contract,
            'sliders'       => $sliders,
            'eventmessages' => EventMessage::orderBy('id', 'desc')->paginate(2),
            'youtubes'      => Youtube::orderBy('id', 'desc')->paginate(8),
            'eventvideos'   => EventVideo::orderBy('id', 'desc')->take(1)->get(),
        ]);
    }

    public function about()
    {
        $news = News::orderBy('id', 'desc')->take(10)->get();
        $joint = '';
        foreach ($news as $key => $item){
            $joint .= ($key+1).'. '.$item->title.' &nbsp;&nbsp;&nbsp;&nbsp;';
        }
        $abouts = About::all();
        return view('front.about.about', [
            'abouts' => $abouts,
            'news'   => $joint,
        ]);
    }

    public function contact()
    {
        $news = News::orderBy('id', 'desc')->take(10)->get();
         $joint = '';
        foreach ($news as $key => $item){
            $joint .= ($key+1).'. '.$item->title.' &nbsp;&nbsp;&nbsp;&nbsp;';
        }
        $contract = Contract::all();
        return view('front.contact.contact', [
            'contract' => $contract,
            'news'     => $joint,
        ]);
    }

    public function bangabandhu()
    {
        $contract = Contract::all();
        $sliders = Slider::all();
        $news = News::orderBy('id', 'desc')->take(10)->get();
        $joint = '';
        foreach ($news as $key => $item){
            $joint .= ($key+1).'. '.$item->title.' &nbsp;&nbsp;&nbsp;&nbsp;';
        }
        $bangabandhus = Bangabandhu::all();
        return view('front.bangabandhu.bangabandhu', [
            'bangabandhus' => $bangabandhus,
            'news'         => $joint,
            'sliders'      => $sliders,
            'contract'     => $contract,
        ]);
    }

    public function blog()
    {

        $contract = Contract::all();
        $sliders = Slider::all();
        $news = News::orderBy('id', 'desc')->take(10)->get();
        $joint = '';
        foreach ($news as $key => $item){
            $joint .= ($key+1).'. '.$item->title.' &nbsp;&nbsp;&nbsp;&nbsp;';
        }
        return view('front.about.blog', [
            'blogs'    => Blog::orderBy('id', 'desc')->paginate(6),
            'news'     => $joint,
            'contract' => $contract,
        ]);
    }

    public function other()
    {
        $news = News::orderBy('id', 'desc')->take(10)->get();
        $sliders = Slider::all();
        return view('front.other.other', [
            'news'          => $news,
            'sliders'       => $sliders,
            'eventmessages' => EventMessage::orderBy('id', 'desc')->paginate(2),
            'youtubes'      => Youtube::orderBy('id', 'desc')->paginate(8),
            'eventvideos'   => EventVideo::orderBy('id', 'desc')->take(1)->get(),
        ]);
    }

    public function privacy()
    {
        $news = News::orderBy('id', 'desc')->take(10)->get();
        $joint = '';
        foreach ($news as $key => $item){
            $joint .= ($key+1).'. '.$item->title.' &nbsp;&nbsp;&nbsp;&nbsp;';
        }
        return view('front.privacy.privacy', [
            'news' => $joint,
        ]);
    }

    public function tekasaibd()
    {
        $news = News::orderBy('id', 'desc')->take(10)->get();
        $joint = '';
        foreach ($news as $key => $item){
            $joint .= ($key+1).'. '.$item->title.' &nbsp;&nbsp;&nbsp;&nbsp;';
        }
        return view('front.privacy.tekasaibd', [
            'news' => $news,
            'news'     => $joint,
        ]);
    }

    public function bookDetails($id)
    {
        $book = Book::find($id);
        $news = News::orderBy('id', 'desc')->take(10)->get();
        $joint = '';
        foreach ($news as $key => $item){
            $joint .= ($key+1).'. '.$item->title.' &nbsp;&nbsp;&nbsp;&nbsp;';
        }
        $question = BookQuestion::where('book_id', $id)->first();
        return view('front.book.details')->with([
            'book'     => $book,
            'news'     => $joint,
            'question' => $question,
        ]);
    }

    public function amaderkotha()
    {

        $abouts = About::all();
        $contract = Contract::all();
        $news = News::orderBy('id', 'desc')->take(10)->get();
        $joint = '';
        foreach ($news as $key => $item){
            $joint .= ($key+1).'. '.$item->title.' &nbsp;&nbsp;&nbsp;&nbsp;';
        }
        return view('front.about.amaderkotha', [
            'eventmessages' => EventMessage::orderBy('id', 'desc')->paginate(2),
            'publications' => Publication::orderBy('id', 'desc')->paginate(6),
            'news'         => $joint,
            'youtubes'     => Youtube::orderBy('id', 'desc')->paginate(4),
            'eventvideos'  => EventVideo::orderBy('id', 'desc')->take(1)->get(),
            'contract'     => $contract,
            'abouts'       => $abouts,
            'galleris'     => Gallery::orderBy('id', 'desc')->paginate(12),
        ]);
    }
    public function detailsEvents($id){
        $contract = Contract::all();
        $eventmessages = EventMessage::find($id);
        $news = News::orderBy('id', 'desc')->take(10)->get();
        $joint = '';
        foreach ($news as $key => $item){
            $joint .= ($key+1).'. '.$item->title.' &nbsp;&nbsp;&nbsp;&nbsp;';
        }

        return view('front.about.details-events-message',[
            'news'          => $joint,
            'eventmessages' => $eventmessages,
            'contract'     => $contract,
        ]);
    }

    public function detailsBlog($id)
    {

        $blogs = Blog::find($id);
        $contract = Contract::all();
        $news = News::orderBy('id', 'desc')->take(10)->get();
        return view('front.about.detailsblog', [
            'blogs'    => $blogs,
            'news'     => $news,
            'contract' => $contract,
        ]);
    }
    public function sendEmail(Request $request){
        try{
            $inputs = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'message' => $request->input('comments')
            ];
            Mail::to('tekasai100@gmail.com')
                ->send(new ContactUsMail($inputs));
            return response()->json('success',200);
        }catch (\Exception $exception){
            return response()->json($exception->getMessage(),401);
        }

    }

}
