<?php

namespace App\Models\OnlineExam;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ParticipantAssessment extends Model
{
    protected $fillable = [
        'participant_id', 'exam_id', 'start_at', 'end_at', 'score', 'comment'
    ];

    protected $dates = [
        'start_at', 'end_at'
    ];

    public function possibleEndTime()
    {
        $duration = explode(':', $this->exam->duration);
        $startAt = $this->attributes['start_at'] ? Carbon::parse($this->attributes['start_at']) : now();

        return $startAt->addHours($duration[0])
            ->addMinutes($duration[1])
            ->addSeconds($duration[2]);
    }

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
        return $this->hasOne(ParticipantAssessmentAnswer::class, 'participant_assessment_id')
            ->with('attachments');
    }

}
