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
            $this->completeAssessment($assessment);
            session()->forget(['participant_id', 'quiz', 'type']);
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
            $assessment = QuizAssessment::query()->find($request->quiz_assessment_id);

            if ($assessment->end_at) {
                /** @var QuizAssessment $assessment */
                return $this->complete($assessment);
            }

            $answer = QuizAssessmentAnswer::query()
                ->create($request->except('_token'));
            return $this->show($answer->assessment);
        });

    }

    public function complete(QuizAssessment $assessment)
    {
        $this->completeAssessment($assessment);
        return view('front.quiz.complete');
    }

    public function completeAssessment($assessment)
    {
        $attributes = [
            'score' => $assessment->correctCount(),
        ];
        if (!$assessment->end_at) {
            $attributes['end_at'] = now();
            session()->forget(['participant_id', 'quiz', 'type']);
        }
        $assessment->update($attributes);
        return true;
    }

}
