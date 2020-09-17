<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index', [
            'blogs' => Blog::query()
                ->latest()
                ->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'image' => 'required|image|max:2048',
            'title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'status' => 'required',
        ]);
        $attributes['image'] = $request->image->store('uploads/blog');
        Blog::query()->create($attributes);
        return back()->withSuccess(' বার্তা  তৈরী করা হয়েছে !');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', [
            'blog' => $blog,
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $attributes = $request->validate([
            'image' => 'image|max:2048',
            'title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'status' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $attributes['image'] = $request->image->store('uploads/blog');
            Storage::delete($blog->image);
        }

        $blog->update($attributes);
        return back()->withSuccess(' বার্তা হালনাগাদ করা হয়েছে!');
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
