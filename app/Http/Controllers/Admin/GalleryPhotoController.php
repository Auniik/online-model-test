<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Models\GalleryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryPhotoController extends Controller
{
    public function index(Gallery $gallery)
    {
        return view('admin.gallery.photos', [
            'photos' => $gallery->photos,
            'gallery' => $gallery
        ]);

    }


    public function store(Request $request, Gallery $gallery)
    {
        $attributes = $request->validate([
            'photo' => 'required|image|max:2048',
            'name' => '',
            'description' => '',
        ]);

        $attributes['path'] = $request->photo->store('uploads/gallery');
        unset($attributes['photo']);

        $gallery->photos()->create($attributes);

        return back()->withSuccess("$gallery->title  এ ছবি যোগ করা হয়েছে !");
    }



    public function destroy(GalleryFile $photo)
    {
        Storage::delete($photo->path);
        $photo->delete();

        return response([
            'message' => ' ছবি ডিলিট করা হয়েছে'
        ]);
    }
}
