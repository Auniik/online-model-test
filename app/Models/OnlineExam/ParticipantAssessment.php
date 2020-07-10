<?php

namespace App\Models\OnlineExam;

use Illuminate\Database\Eloquent\Model;

class ParticipantAssessment extends Model
{
    protected $fillable = [
        'participant_id', 'exam_id', 'score', 'comment'
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class)->withCount('questions');
    }
    public function answers()
    {
        return $this->hasMany(ParticipantAssessmentAnswer::class)
            ->with('attachments');
    }

    public function getAnswer($question)
    {
        return $this->answers->firstWhere('exam_question_id', $question->id);
    }

}
