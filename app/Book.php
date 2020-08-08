<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    protected $guarded = [''];

    public function images()
    {
        return $this->hasMany(BookImage::class,'book_id','id');
    }
    public function img()
    {
        return $this->hasOne(BookImage::class,'book_id','id');
    }

    public function getShortDescriptionAttribute()
    {
        return Str::limit(strip_tags($this->description), 60, ' (...)');
    }
}
