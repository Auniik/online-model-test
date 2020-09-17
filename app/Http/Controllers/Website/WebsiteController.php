<?php


namespace App\Http\Controllers\Website;


use App\About;
use App\Bangabandhu;
use App\Blog;
use App\Book;
use App\BookQuestion;
use App\Contract;
use App\Gallery;
use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Exam;
use App\Models\Quiz\Quiz;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Publication;
use App\Slider;
use App\Video;

class WebsiteController extends Controller
{

    public function home()
    {
        $date = date('Y-m-d');
        $exams = Exam::query()
            ->whereDate('start_at', '<=', $date)
            ->whereDate('end_at', '>=', $date)
            ->oldest('end_at')
            ->where('in_homepage', 1);

        if ($participant = auth('participant')->user()) {
            $participatedExams = $participant->participatedExams->pluck('exam_id');
            $exams->whereNotIn('id', $participatedExams);
        }

        return view('front.index.index', [
            'exams' => $exams->whereHas('questions')
                ->paginate(6, '*', 'exams'),
            'current_quiz' => Quiz::query()
                ->whereHas('questions')
                ->where('is_default', 1)
                ->first(),
            'books' => Book::with('img')->latest()->take(6)->get(),
            'slider_images' => Slider::query()->get(),
            'switch' => Setting::query()->where('context', 'switch')->pluck('value','key')
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
            'blogs' => Blog::query()
                ->latest()
                ->paginate(6),
            'contract' => Contract::all(),
            'slider' => $slider,
            'videos' => Video::query()
                ->latest()
                ->take(6)
                ->get()
        ]);
    }

    public function privacy()
    {
        return view('front.privacy.privacy');
    }

    public function about()
    {
        return view('front.privacy.tekasaibd', [
            'about' => About::query()->first()
        ]);
    }

    public function bookDetails(Book $book)
    {
        $question = BookQuestion::query()->where('book_id', $book->id)->first();
        return view('front.book.details')->with([
            'book' => $book,
            'question' => $question,
        ]);
    }

    public function detailsBlog(Blog $blog)
    {
        return view('front.about.detailsblog', [
            'blogs' => $blog,
        ]);
    }

    public function amaderkotha()
    {
        $abouts = About::all();
        $team_members = TeamMember::query()->get();
        return view('front.about.amaderkotha', [
            'abouts' => $abouts,
            'publications' => Publication::query()
                ->latest()
                ->paginate(6, '*', 'publication'),
            'team_members' => $team_members->whereNotIn('is_highlighted', 1),
            'director' => $team_members->firstWhere('is_highlighted', 1)
        ]);
    }

}
