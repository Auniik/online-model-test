<?php

namespace App\Models\Quiz;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'name', 'description', 'duration', 'image', 'date', 'is_default', 'is_published'
    ];

    protected $dates = [
        'date'
    ];

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::parse($value);
    }

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }

    public function assignedParticipants()
    {
        return $this->hasMany(QuizAssessment::class, 'quiz_id');
    }

    public function vipParticipants()
    {
        return $this->assignedParticipants()
            ->where('participant_type', 'vip');
    }

    public function generalParticipants()
    {
        return $this->assignedParticipants()
            ->where('participant_type', 'general');
    }
}
