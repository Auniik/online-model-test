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
            'galleries' => Gallery::query()->paginate(15),
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

    public function delete(Gallery $gallery)
    {
        $gallery->delete();

        return response([
            'check' => true
        ]);
    }
}
