<?php


namespace App\Models\OnlineExam;


use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'name', 'username', 'email', 'mobile_number', 'school_name', 'class', 'roll', 'sub_district',
        'district', 'division'
    ];

    public function assessments()
    {
        return $this->hasMany(ParticipantAssessment::class);
    }
}
