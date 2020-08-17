<?php


namespace App\Http\Controllers\Quiz;


use App\Http\Controllers\Controller;
use App\Models\Quiz\QuizAssessment;

class QuizAssessmentController extends Controller
{
    public function show(QuizAssessment $assessment)
    {
        return view('admin.quiz.assessment.show', [
            'assessment' => $assessment
        ]);
    }

}
