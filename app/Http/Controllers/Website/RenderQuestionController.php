<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Models\Quiz\QuizAssessment;
use App\Models\Quiz\QuizAssessmentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RenderQuestionController extends Controller
{
    public function show(QuizAssessment $assessment)
    {
        $questions = $assessment->quiz->questions;
        $totalQuestions = $questions->count();
        $totalAnswered = $assessment->answers->count();
        if ($totalQuestions == $totalAnswered) {
            $assessment->update([
                'score' => $assessment->correctCount()
            ]);
            return 'COMPLETED';
        }
        if(!$totalAnswered) {
            $question = $questions->first();
            $options = $question->options->shuffle();
            return view('front.quizzes.renderQ', [
                'question' => $question,
                'options' => $options,
                'count' => 1,
                'quiz_assessment_id' => $assessment->id
            ]);
        }

        $answeredQuestionIds = $assessment->answers->pluck('quiz_question_id');
        $notAnsweredYet = $questions->whereNotIn('id', $answeredQuestionIds);

        $question = $notAnsweredYet->shuffle()->first();
        return view('front.quizzes.renderQ', [
            'question' => $question,
            'options' => $question->options->shuffle(),
            'count' => $totalQuestions + 1 - $notAnsweredYet->count(),
            'quiz_assessment_id' => $assessment->id
        ]);

    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $answer = QuizAssessmentAnswer::query()
                ->create($request->except('_token'));
            return $this->show($answer->assessment);
        });

    }
}
