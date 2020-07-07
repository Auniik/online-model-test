<?php


namespace App\Http\Controllers\OnlineExam;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\ParticipantAssessmentAnswer;

class AssessmentAnswerController extends Controller
{

    public function show(ParticipantAssessmentAnswer $answer)
    {
        return [
            'mcq' => $this->renderMCQ($answer),
            'cq' => $this->renderCQ($answer),
            'written' => $this->renderWritten($answer),
        ][$answer->question->type];
    }

    private function renderMCQ(ParticipantAssessmentAnswer $answer)
    {
        $options = $answer->question->MCQs;
        return view('admin.online-exam.exam.examine.mcq-answer', [
            'question' => $answer->question,
            'options' => $options,
            'answer' => $options->firstWhere('id', $answer->answer)
        ]);
    }

    private function renderCQ($answer)
    {
        $cqs = $answer->question->CQs;
        return view('admin.online-exam.exam.examine.cq-answer', [
            'question' => $answer->question,
            'cqs' => $cqs,
            'answer' => $answer,
            'max_remarks' => $cqs->sum('max_remarks')
        ]);
    }

    private function renderWritten(ParticipantAssessmentAnswer $answer)
    {
        return view('admin.online-exam.exam.examine.written-answer', [
            'question' => $answer->question,
            'answer' => $answer,
            'max_remarks' => $answer->question->remarks
        ]);
    }
}
