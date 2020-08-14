<?php

namespace App;

use App\Models\GalleryFile;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded = [''];

    public function photos()
    {
        return $this->hasMany(GalleryFile::class, 'gallery_id');
    }
}
