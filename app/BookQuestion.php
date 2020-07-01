<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookQuestion extends Model
{

    protected $guarded = [];

    public function book()
    {
        return $this->hasOne(Book::class,'id','book_id');
    }
}
