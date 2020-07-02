<?php

namespace App\Models\OnlineExam;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'name', 'description', 'subject_id', 'image', 'start_at', 'duration', 'in_homepage', 'status'
    ];
    protected $dates = [
        'start_at'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
