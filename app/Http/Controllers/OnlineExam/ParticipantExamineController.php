<?php


namespace App\Http\Controllers\OnlineExam;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\ExamQuestion;
use App\Models\OnlineExam\ParticipantAssessment;
use App\Models\OnlineExam\ParticipantAssessmentAnswer;

class ParticipantExamineController extends Controller
{

    public function index(ParticipantAssessment $assessment)
    {
        $questions = ExamQuestion::with(['answer' => function($query) use($assessment) {
                $query->where('participant_assessment_id', $assessment->id);
            }])
            ->where('exam_id', $assessment->exam_id)
            ->get();
        return view('admin.online-exam.exam.participants.examine', [
            'assessment' => $assessment,
            'questions' => $questions
        ]);
    }

    public function store(ParticipantAssessment $assessment, ParticipantAssessmentAnswer $answer)
    {

    }
}
