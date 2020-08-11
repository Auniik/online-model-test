<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Quiz\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'duration' => ['required', 'regex:/^(0[0-9]|1[0-9]|2[0-9]):[0-5][0-9]$/'],
        ]);
        $data = $request->only('description', 'date', 'is_default', 'is_published');

        if (isset($data['is_default'])) {
            $this->resetDefault();
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('uploads/quizzes');
        }

        Quiz::query()->create(array_merge($attributes, $data));

        return back_with_success('কুইজ');
    }

    public function edit(Quiz $quiz)
    {
        return view('admin.quiz.edit', [
            'quiz' => $quiz
        ]);
    }

    public function update(Request $request, Quiz $quiz)
    {
        $attributes = $request->validate([
            'name' => 'required|min:3',
            'duration' => ['required', 'regex:/^(0[0-9]|1[0-9]|2[0-9]):[0-5][0-9]$/'],
        ]);
        $data = $request->only('description', 'date', 'is_default', 'is_published');

        if (!isset($data['is_default'])) {
            $this->resetDefault();
        }
        if (!isset($data['is_published'])) {
            $data['is_published'] = 0;
        }

        if ($request->hasFile('image')) {
            Storage::delete($quiz->image);
            $data['image'] = $request->image->store('uploads/quizzes');
        }

        $quiz->update(array_merge($attributes, $data));

        return updated_response('কুইজ');
    }

    public function resetDefault()
    {
        Quiz::query()
            ->where('is_default', 1)
            ->update(['is_default'=> 0]);
    }

    public function destroy(Quiz $quiz)
    {
        Storage::delete($quiz->image);
        foreach ($quiz->questions as $question) {
            Storage::delete($question->meta);
            $question->options()->delete();
        }
        $quiz->questions()->delete();

        foreach ($quiz->assignedParticipants as $assessment) {
            $assessment->answer()->delete();
        }

        $quiz->assignedParticipants()->delete();
        $quiz->delete();

        return response([
            'check' => true
        ]);
    }

    public function publish(Quiz $quiz)
    {
        $quiz->update([
            'is_published' => 1
        ]);
        return back()->withSuccess($quiz->name . ' টির রেজাল্ট পাবলিশ করা হয়েছে।');
    }

    public function current(Quiz $quiz)
    {
        $this->resetDefault();
        $quiz->update([
            'is_default' => 1
        ]);
        return back()->withSuccess($quiz->name . ' টি বর্তমানে চলছে।');
    }
}
