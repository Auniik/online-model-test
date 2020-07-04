<?php

namespace App\Models\OnlineExam;

use Illuminate\Database\Eloquent\Model;

class MCQQuestionOption extends Model
{
    protected $table = "mcq_question_options";
    protected $fillable = [
        'value', 'file', 'is_correct', 'exam_question_id'
    ];

    public function question()
    {
        return $this->belongsTo(ExamQuestion::class);
    }
}
