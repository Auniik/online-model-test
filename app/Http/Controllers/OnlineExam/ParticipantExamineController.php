<?php


namespace App\Http\Controllers\OnlineExam;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\ParticipantAssessment;
use App\Models\OnlineExam\ParticipantAssessmentAnswer;

class ParticipantExamineController extends Controller
{

    public function index(ParticipantAssessment $assessment)
    {
        return view('admin.online-exam.exam.participants.examine', [
            'assessment' => $assessment->load('participant', 'exam.questions')
        ]);
    }

    public function store(ParticipantAssessment $assessment, ParticipantAssessmentAnswer $answer)
    {

    }
}
