<?php

namespace App\Models\OnlineExam;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'name', 'description', 'competency_score',
        'subject_id', 'class_id', 'image', 'start_at', 'end_at', 'duration', 'in_homepage',
        'status'
    ];
    protected $dates = [
        'start_at', 'end_at'
    ];

    public function getClassAttribute()
    {
        return trans('default')[
            config('exam.classes')[$this->class_id]
        ];
    }
    public function setStartAtAttribute($value)
    {
        $this->attributes['start_at'] = Carbon::parse($value);
    }
    public function setEndAtAttribute($value)
    {
        $this->attributes['end_at'] = Carbon::parse($value);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function questions()
    {
        return $this->hasMany(ExamQuestion::class);
    }

    public function assignedParticipants()
    {
        return $this->hasMany(ParticipantAssessment::class, 'exam_id');
    }
}
