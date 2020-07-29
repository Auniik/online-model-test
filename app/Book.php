<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public function images()
    {
        return $this->hasMany(BookImage::class,'book_id','id');
    }
    public function img()
    {
        return $this->hasOne(BookImage::class,'book_id','id');
    }
}
