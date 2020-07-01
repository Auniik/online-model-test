<?php

namespace App\Http\Controllers;

use App\Gallery;
use Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function addGallery(){
        $galleries = Gallery::all();
        return view('admin.gallery.add-gallery',[
            'galleries' => $galleries,
        ]);

    }
    public function newGallery(Request $request){

        $galleryImage = $request->file('image');
        $directory = "gallery-image/";
        $imageName = $galleryImage->getClientOriginalName();
        $galleryImage->move($directory,$imageName);
        $imageUrl = $directory.$imageName;

        $gallery = new Gallery();
        $gallery->title               = $request->title;
        $gallery->image               = $imageUrl;
        $gallery->short_descriptions   = $request->short_descriptions;
        $gallery->status              = $request->status;
        $gallery->save();
        return redirect('add-gallery')->with('message','gallery Save Successfully');
    }
    public function editGallery($id){
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit-gallery',[
            'gallery' => $gallery,
        ]);
    }
    public function updateGallery(Request $request){

        $galleryImage = $request->file('image');
        $directory = "gallery-image/";
        $imageName = $galleryImage->getClientOriginalName();
        //$aboutImage->move($directory,$imageName);
        $imageUrl = $directory.$imageName;
        Image::make($galleryImage)->resize(1500, 400)->save($imageUrl);

        $gallery = Gallery::find($request->id);
        $gallery->title               = $request->title;
        $gallery->image               = $imageUrl;
        $gallery->short_descriptions   = $request->short_descriptions;
        $gallery->status              = $request->status;
        $gallery->save();
        return redirect('add-gallery')->with('message','gallery Save Successfully');
    }
    public function deleteGallery($id){
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect('add-gallery')->with('message','gallery Successfully Delete');
    }
}
