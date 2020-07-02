<?php


namespace App\Models\OnlineExam;


use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name', 'description', 'code', 'class', 'status'
    ];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
