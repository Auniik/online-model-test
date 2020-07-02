<?php

namespace App\Models\OnlineExam;

use Illuminate\Database\Eloquent\Model;

class ParticipantAssessmentAttachment extends Model
{
    protected $fillable = [
        'participant_assessment_answer_id', 'path'
    ];

    public function answer()
    {
        return $this->belongsTo(ParticipantAssessmentAnswer::class);
    }
}
