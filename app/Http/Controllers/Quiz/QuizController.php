<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Quiz\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('admin.quiz.index', [
            'quizzes' => Quiz::query()->latest()->paginate(25),
            'selectableQuizzes' => Quiz::query()->pluck('name', 'id'),
        ]);
    }
    public function create()
    {
        return view('admin.quiz.create');
    }

    public function store(Request $request)
    {

    }
}
