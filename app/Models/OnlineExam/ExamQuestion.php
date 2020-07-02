<?php

namespace App\Models\OnlineExam;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    protected $fillable = [
        'title', 'description', 'file', 'level', 'meta', 'type', 'remarks', 'solution', 'exam_id'
    ];

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
}
