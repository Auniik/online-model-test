<?php


namespace App\Http\Controllers\OnlineExam;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\ParticipantAssessmentAnswer;
use Illuminate\Http\Request;

class AssessmentAnswerController extends Controller
{

    public function show(ParticipantAssessmentAnswer $answer)
    {
        $method = [
            'mcq' => "renderMCQ",
            'cq' => "renderCQ",
            'written' => "renderWritten",
        ][$answer->question->type];

        return $this->$method($answer);
    }

    public function store(Request $request, ParticipantAssessmentAnswer $answer)
    {
        $request->validate([
            'remark' => "required|max:{$answer->question->remark}"
        ]);
        $answer->update([
            'remarks' => $request->get('remark', 0)
        ]);
        return back()->withSuccess('Remarked successfully');

    }

    private function renderMCQ(ParticipantAssessmentAnswer $answer)
    {
        $options = $answer->question->MCQs;
        return view('admin.online-exam.exam.examine.mcq-answer', [
            'question' => $answer->question,
            'options' => $options,
            'answer' => $options->firstWhere('id', $answer->answer),
            'answer_id' => $answer->id
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
