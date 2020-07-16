<?php


namespace App\Http\Controllers\Website;


use App\Models\Quiz\QuizAssessment;
use Illuminate\Http\Request;

class QuizControlController extends \App\Http\Controllers\Controller
{

    public function start(Request $request)
    {
        $assessment = QuizAssessment::query()
            ->firstOrCreate($request->except('_token'));
        session(['assessment' => $assessment->load('participant:id,name')]);
        session(['quiz' => $assessment->quiz->loadCount('questions')]);

        return view('front.quizzes.question', [
            'assessment' => $assessment
        ]);
    }

    public function redirectToQuiz($participant, $defaultQuiz)
    {



    }
}
