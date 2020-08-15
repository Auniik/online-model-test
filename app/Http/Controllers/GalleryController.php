<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin.gallery.index', [
            'galleries' => Gallery::query()->withCount('photos')->paginate(15),
        ]);

    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'image' => 'required|image|max:2048',
            'title' => 'required',
            'short_descriptions' => 'required',
            'date' => 'required',
            'status' => 'required'
        ]);
        $attributes['image'] = $request->image->store('uploads/gallery');

        Gallery::query()->create($attributes);

        return back()->withSuccess(' গ্যালারী যোগ করা হয়েছে !');
    }

    public function show(Gallery $gallery)
    {
        return view('front.gallery.show', [
            'gallery' => $gallery
        ]);
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', [
            'gallery' => $gallery,
        ]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $attributes = $request->validate([
            'image' => 'image|max:2048',
            'title' => 'required',
            'short_descriptions' => 'required',
            'date' => 'required',
            'status' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $attributes['image'] = $request->image->store('uploads/gallery');
            Storage::delete($gallery->image);
        }
        $gallery->update($attributes);
        return back()->withSuccess(' গ্যালারী  হালনাগাদ করা হয়েছে !');
    }

    public function destroy(Gallery $gallery)
    {
        foreach ($gallery->photos as $photo) {
            Storage::delete($photo->path);
        }
        $gallery->photos()->delete();
        $gallery->delete();

        return response([
            'check' => true
        ]);
    }

    public function setSlider(Gallery $gallery)
    {
        Gallery::query()->where('is_slider', 1)->update([
            'is_slider' => 0
        ]);
        $gallery->update([
            'is_slider' => 1
        ]);
        return back()->withSuccess('গ্যালারীর স্লাইডার সেট করা হয়েছে !');
    }
}
