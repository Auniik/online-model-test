<?php


namespace App\Http\Controllers\Website;


use App\Book;
use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Exam;
use App\Models\Quiz\Quiz;

class WebsiteController extends Controller
{

    public function home()
    {
        $date = date('Y-m-d');
        return view('front.index.index', [
            'exams' => Exam::query()
                ->whereDate('start_at', '<=', $date)
                ->whereDate('end_at', '>=', $date)
                ->latest()
                ->where('in_homepage', 1)
                ->take(6)
                ->get(),
            'current_quiz' => Quiz::query()->where('is_default', 1)->first(),
            'books' => Book::with('img')->latest()->take(6)->get(),
        ]);
    }

}
