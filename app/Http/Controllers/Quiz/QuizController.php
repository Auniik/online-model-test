<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Quiz\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        $quizzes = Quiz::query()
            ->withCount('assignedParticipants', 'questions')->latest();

        if ($request->filled('quiz_id')){
            $quizzes->where('id', 'quiz_id');
        }

        return view('admin.quiz.index', [
            'quizzes' => $quizzes->paginate(25),
            'selectableQuizzes' => Quiz::query()->pluck('name', 'id'),
        ]);
    }
    public function create()
    {
        return view('admin.quiz.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:3',
            'duration' => 'required',
        ]);
        $data = $request->only('description', 'date', 'is_default', 'is_published');

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('uploads/quizzes');
        }

        Quiz::query()->create(array_merge($attributes, $data));

        return back_with_success('Quiz');
    }
}
