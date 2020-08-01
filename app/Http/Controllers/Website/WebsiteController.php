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
        $exams = Exam::query()
            ->whereDate('start_at', '<=', $date)
            ->whereDate('end_at', '>=', $date)
            ->latest()
            ->where('in_homepage', 1);

        if ($participant = auth('participant')->user()) {
            $participatedExams = $participant->participatedExams->pluck('exam_id');
            $exams->whereNotIn('id', $participatedExams);
        }

        return view('front.index.index', [
            'exams' => $exams
                ->take(6)
                ->get(),
            'current_quiz' => Quiz::query()
                ->whereHas('questions')
                ->where('is_default', 1)
                ->first(),
            'books' => Book::with('img')->latest()->take(6)->get(),
        ]);
    }

}
