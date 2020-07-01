<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public function images()
    {
        return $this->hasMany(BookImage::class,'book_id','id');
    }
}
