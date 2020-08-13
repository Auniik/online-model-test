<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class AboutController extends Controller
{

    public function edit()
    {
        return view('admin.about.edit-about', [
            'about' => About::query()->first(),
        ]);
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required',
            'mission' => 'required',
            'vision' => 'required',
            'short_description'=> 'required',
            'image' => 'image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imageUrl = $request->image->store('uploads/blog');
            Storage::delete($about->image);
        } else {
            $imageUrl = $about->image;
        }

        $about = About::find($request->id);
        $about->title               = $request->title;
        $about->mission             = $request->mission;
        $about->vision              = $request->vision;
        $about->short_description   = $request->short_description;
        $about->long_description    = $request->long_description;
        $about->image = $imageUrl;
        $about->status = $request->status;
        $about->save();
        return redirect('/add-about');
    }
}
