<?php


namespace App\Http\Controllers\Quiz;


use App\Models\OnlineExam\Participant;
use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuizAssessment;
use Illuminate\Http\Request;

class QuizResultsController extends \App\Http\Controllers\Controller
{
    public function index(Request $request)
    {
        $assessments = QuizAssessment::with('participant', 'quiz')
            ->withCount('answers');

        if ($request->filled('quiz_id')) {
            $assessments->where('quiz_id', $request->quiz_id);
        }
        if ($request->filled('participant_type')) {
            $assessments->where('participant_type', $request->get('participant_type'));
        }
        if ($request->filled('participated')) {
            $assessments->where('is_attended', !!$request->get('participated'));
        }
        if ($request->filled('participant_id')) {
            $assessments->where('participant_id', $request->participant_id);
        }

        return view('admin.quiz.results.index', [
            'assessments' => $assessments->paginate(50),
            'quizzes' => Quiz::query()->latest()->pluck('name', 'id'),
            'participants' => Participant::query()->latest()->pluck('name', 'id'),
        ]);
    }

    public function show()
    {

    }
}
