<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit()
    {
        return view('admin.about.edit', [
            'about' => About::query()->first(),
        ]);
    }

    public function update(Request $request, About $about)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'mission' => 'required',
            'vision' => 'required',
            'short_description'=> 'required',
            'image' => 'image|max:2048',
            'long_description' => 'nullable',
            'status' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $attributes['image'] = $request->image->store('uploads/blog');
            Storage::delete($about->image);
        } else {
            $attributes['image'] = $about->image;
        }

        $about->update($attributes);
        return back()->withSuccess('হালনাগাদ করা হয়েছে!');
    }
}
