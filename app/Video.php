<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [''];

    public function getUrlAttribute()
    {
        return "https://www.youtube.com/watch?v=" . $this->link;
    }

    public function getThumbnailAttribute()
    {
        return "https://img.youtube.com/vi/{$this->link}/mqdefault.jpg";
    }
}
