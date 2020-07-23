<?php

namespace App\Models\OnlineExam;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    protected $fillable = [
        'title', 'description', 'file', 'level', 'meta', 'type', 'remarks', 'solution', 'exam_id'
    ];

    public function getTranslatedTypeAttribute()
    {
        return __('default')[$this->type];
    }

    public function getRemarkAttribute()
    {
        if ($this->type == 'cq')
            return $this->CQs()->sum('max_remarks');
        if ($this->type == 'mcq')
            return 1;
        return $this->remarks;
    }

    public function CQs()
    {
        return $this->hasMany(CQQuestionMeta::class);
    }

    public function MCQs()
    {
        return $this->hasMany(MCQQuestionOption::class);
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function isMCQ()
    {
        return $this->attributes['type'] == 'mcq';
    }
    public function isCQ()
    {
        return $this->attributes['type'] == 'cq';
    }
    public function isWritten()
    {
        return $this->attributes['type'] == 'written';
    }
}
