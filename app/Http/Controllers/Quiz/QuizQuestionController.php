<?php


namespace App\Http\Controllers\Quiz;


use App\Http\Controllers\Controller;
use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class QuizQuestionController extends Controller
{
    public function index(Quiz $quiz)
    {
        return view('admin.quiz.question.index', [
            'quiz' => $quiz
        ]);
    }

    public function store(Request $request, Quiz $quiz)
    {

        DB::transaction(function () use($request, $quiz) {
            foreach ($request->get('title', []) as $key => $title) {
                $path = null;

                if (isset($request->meta[$key]) && $request->meta[$key] instanceof UploadedFile){
                    $path = $request->meta[$key]->store('uploads/quizzes/questions');
                }

                $question = QuizQuestion::query()->create([
                    'title' => $title,
                    'meta' => $path,
                    'quiz_id' => $quiz->id
                ]);
                foreach ($request->options[$key] as $k => $option) {
                    /** @var QuizQuestion $question */
                    $question->options()->create([
                        'value' => $option,
                        'is_correct' => $request->is_correct[$key] == $k,
                    ]);
                }
            }
        });

        return back_with_success(' কুইজ');

    }


    public function destroy(QuizQuestion $question)
    {
        Storage::delete($question->meta);
        Storage::delete(optional($question->discussion)->meta);
        $question->discussion()->delete();
        $question->delete();
        return response(['check' => true]);
    }
}
