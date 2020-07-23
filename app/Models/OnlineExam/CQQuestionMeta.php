<?php

namespace App\Models\OnlineExam;

use Illuminate\Database\Eloquent\Model;

class CQQuestionMeta extends Model
{
    protected $table = "cq_question_metas";
    protected $fillable = [
        'title', 'max_remarks', 'level', 'exam_question_id'
    ];

    public function question()
    {
        return $this->belongsTo(ExamQuestion::class);
    }

    public function getTranslatedLevelAttribute()
    {
        return __('default')[$this->level];
    }
}
