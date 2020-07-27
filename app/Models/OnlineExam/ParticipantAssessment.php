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
        $startAt = $this->start_at ? $this->start_at : now();

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
        return $this->hasMany(ParticipantAssessmentAnswer::class, 'participant_assessment_id')
            ->with('attachments');
    }

    public function totalRemarks()
    {
        return $this->answers()->sum('remarks');
    }

    public function consumedTime()
    {
        if ($this->start_at) {
            if ($this->end_at) {
                $seconds = Carbon::parse($this->end_at)->diffInSeconds(Carbon::parse($this->start_at));
                $secs = floor($seconds);
                $hours   = floor(($secs/(60*60)));
                $minutes = (($secs / 60) % 60);
                $seconds = $secs % 60;
                return "{$hours}h {$minutes}m {$seconds}s";
            }
        }
        return null;
    }

}
