<?php


namespace App\Http\Controllers\Quiz;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Participant;
use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuizAssessment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QuizResultsController extends Controller
{
    use Helpers;
    public function index(Request $request)
    {
        $assessments = QuizAssessment::with('participant', 'quiz')
            ->withCount('answers')
            ->orderByDesc('score');

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

        if ($request->isRanked) {
            $assessments = $assessments
                ->where('score', '>', 0)
                ->get()
                ->sortByDesc(fn ($a) => $a->score)
                ->groupBy('score')
                ->map(fn($g) => $g->sortBy(fn ($a) => $a->consumedTimeScore ))
                ->flatten();
        }


        return view('admin.quiz.results.index', [
            'assessments' => $assessments instanceof Builder
                ? $assessments->paginate($request->get('per_page', 15))
                : $this->paginate($assessments, $request->get('per_page', 15)),
            'quizzes' => Quiz::query()->latest()->pluck('name', 'id')
        ]);
    }

}
