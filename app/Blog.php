<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $guarded = [];

    public function getShortTalksAttribute()
    {
        return Str::limit(strip_tags($this->short_description), 60, ' (...)');
    }
}
