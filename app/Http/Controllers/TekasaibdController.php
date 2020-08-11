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
use App\Models\Message;
use App\Models\TeamMember;
use App\News;
use App\Publication;
use App\Slider;
use App\Youtube;
use Illuminate\Http\Request;

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
        return view('front.about.about', [
            'abouts' => About::all(),
        ]);
    }

    public function contact()
    {
        return view('front.contact.contact', [
            'contract' => Contract::query()->first()
        ]);
    }

    public function bangabandhu()
    {
        return view('front.bangabandhu.bangabandhu', [
            'bangabandhu' => Bangabandhu::query()->first(),
        ]);
    }

    public function blog()
    {

        return view('front.about.blog', [
            'blogs'    => Blog::query()
                ->latest()
                ->paginate(6),
            'contract' => Contract::all(),

            'youtubes'     => Youtube::query()
                ->latest()
                ->paginate(4),
            'eventvideos'  => EventVideo::query()->orderBy('id', 'desc')
                ->take(1)
                ->get(),
            'galleris'    => Gallery::query()->latest()
                ->paginate(12),
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
        return view('front.privacy.privacy');
    }

    public function tekasaibd()
    {
        return view('front.privacy.tekasaibd');
    }

    public function bookDetails($id)
    {
        $book = Book::find($id);

        $question = BookQuestion::where('book_id', $id)->first();
        return view('front.book.details')->with([
            'book'     => $book,
            'question' => $question,
        ]);
    }

    public function amaderkotha()
    {
        $abouts = About::all();
        $team_members = TeamMember::query()->get();
        return view('front.about.amaderkotha', [
            'abouts'       => $abouts,
            'publications' => Publication::query()
                ->latest()
                ->paginate(6 ,'*', 'publication'),
            'team_members' => $team_members->whereNotIn('is_highlighted', 1),
            'director' => $team_members->firstWhere('is_highlighted', 1)
        ]);
    }
    public function detailsEvents($id){
        $contract = Contract::all();
        $eventmessages = EventMessage::query()->find($id);

        return view('front.about.details-events-message',[
            'eventmessages' => $eventmessages,
            'contract'     => $contract,
        ]);
    }

    public function detailsBlog($id)
    {
        return view('front.about.detailsblog', [
            'blogs'    => Blog::query()->find($id),

        ]);
    }
    public function sendEmail(Request $request){
//            $inputs = [
//                'name' => $request->input('name'),
//                'email' => $request->input('email'),
//                'comment' => $request->input('comments')
//            ];
            Message::query()
                ->create($request->only('name', 'email', 'comment'));
//            Mail::to('tekasai100@gmail.com')
//                ->send(new ContactUsMail($inputs));
            return back()->withSent('Your comment sent successfully.');

    }

}
