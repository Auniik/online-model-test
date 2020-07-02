<?php

namespace App\Models\OnlineExam;

use Illuminate\Database\Eloquent\Model;

class ParticipantAssessmentAnswer extends Model
{
    protected $fillable = [
        'participant_assessment_id', 'exam_question_id', 'answer', 'remarks'
    ];

    public function assessment()
    {
        return $this->belongsTo(ParticipantAssessment::class);
    }
    public function question()
    {
        return $this->belongsTo(ExamQuestion::class);
    }
}
