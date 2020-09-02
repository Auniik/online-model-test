<?php

namespace App\Http\Controllers;

use App\Models\OnlineExam\Exam;
use App\Models\OnlineExam\Participant;
use App\Models\Quiz\Quiz;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home.home', [
            'total_participants' => Participant::query()->count(),
            'total_quizzes' => Quiz::query()->count(),
            'total_exams' => Exam::query()->count()
        ]);
    }
}
