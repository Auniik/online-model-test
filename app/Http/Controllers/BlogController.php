<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.add-blog', [
            'blogs' => Blog::query()->latest()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ]);

        $imageUrl = $request->image->store('uploads/blog');

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->short_description = $request->short_description;
        $blog->long_description = $request->long_description;
        $blog->image = $imageUrl;
        $blog->status = $request->status;
        $blog->save();
        return back()->withSuccess(' বার্তা  তৈরী করা হয়েছে !');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit-blog', [
            'blog' => $blog,
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'image' => 'image|max:2048',
            'title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageUrl = $request->image->store('uploads/blog');
            Storage::delete($blog->image);
        } else {
            $imageUrl = $blog->image;
        }

        $blog->title = $request->title;
        $blog->short_description = $request->short_description;
        $blog->long_description = $request->long_description;
        $blog->image = $imageUrl;
        $blog->status = $request->status;
        $blog->save();
        return back()->withSuccess(' বার্তা হালনাগাদ করা হয়েছে !');
    }

    public function destroy(Blog $blog)
    {
        Storage::delete($blog->image);
        $blog->delete();
        return response([
            'check' => true
        ]);
    }
}
