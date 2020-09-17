<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Exam;
use App\Models\OnlineExam\Participant;
use App\Models\Quiz\Quiz;

class HomeController extends Controller
{

    public function index()
    {
        return view('admin.home.home', [
            'total_participants' => Participant::query()->count(),
            'total_quizzes' => Quiz::query()->count(),
            'total_exams' => Exam::query()->count()
        ]);
    }
}
