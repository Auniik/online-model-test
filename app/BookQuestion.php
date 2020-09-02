<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookQuestion extends Model
{

    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo(Book::class,'book_id');
    }
}
