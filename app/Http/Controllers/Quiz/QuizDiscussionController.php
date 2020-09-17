<?php


namespace App\Http\Controllers\Quiz;


use App\Http\Controllers\Controller;
use App\Models\Quiz\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuizDiscussionController extends Controller
{
    public function index(QuizQuestion $question)
    {
        return view('admin.quiz.discussion', [
            'question' => $question,
            'discussion' => $question->discussion
        ]);
    }

    public function update(Request $request, QuizQuestion $question)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $attributes['image'] = $request->image->store('uploads/quizzes');
        }
        $discussion = $question->discussion()->first();

        $flash = ' যুক্ত ';
        if (!$discussion) {
            $question->discussion()->create($attributes);
        } else {
            Storage::delete($discussion->image);
            $discussion->update($attributes);
            $flash = '  হালনাগাদ ';
        }
        $message = "কুইজপূর্বক আলাপচারিতা $flash করা হয়েছে!";

        return back()->withSuccess($message);
    }
}
