<?php

namespace App;

use App\Models\OnlineExam\Participant;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $guarded = ["id"];

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }


    public function getFileAttribute()
    {
        return json_decode($this->attributes['file']);
    }

    public function fileName($file)
    {
        $arr =  explode(DIRECTORY_SEPARATOR, $file);

        return end($arr);
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'work_type');
    }
}
