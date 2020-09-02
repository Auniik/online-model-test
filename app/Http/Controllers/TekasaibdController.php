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
use App\Video;
use App\Youtube;
use Illuminate\Http\Request;

class TekasaibdController extends Controller
{

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

    public function gallery()
    {
        return view('front.gallery.index', [
            'galleries' => Gallery::query()->with('photos')->paginate(12)
        ]);
    }

    public function blog()
    {
        $slider = Gallery::query()->where('is_slider', 1)->first();
        if (!$slider) {
            $slider = Gallery::query()->latest()->first();
        }
        return view('front.about.blog', [
            'blogs'    => Blog::query()
                ->latest()
                ->paginate(6),
            'contract' => Contract::all(),

            'slider'    => $slider,
            'videos' => Video::query()->latest()->take(6)->get()
        ]);
    }

    public function privacy()
    {
        return view('front.privacy.privacy');
    }

    public function tekasaibd()
    {
        return view('front.privacy.tekasaibd', [
            'about' => About::query()->first()
        ]);
    }

    public function bookDetails(Book $book)
    {
        $question = BookQuestion::query()->where('book_id', $book->id)->first();
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


    public function detailsBlog(Blog $blog)
    {
        return view('front.about.detailsblog', [
            'blogs'    => $blog,

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
