<?php

namespace App\Http\Controllers;
use App\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function addBlog() {

        return view('admin.blog.add-blog',[
            'blogs' => Blog::query()->latest()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }
    public function newBlog(Request $request){

        $blogImage = $request->file('image');
        $directory = "blog-image/";
        $imageName = Str::random(40) ."." . $blogImage->getClientOriginalExtension();
        $blogImage->move($directory,$imageName);
        $imageUrl = $directory.$imageName;

        $blog = new Blog();
        $blog->title               = $request->title;
        $blog->short_description   = $request->short_description;
        $blog->long_description    = $request->long_description;
        $blog->image               = $imageUrl;
        $blog->status              = $request->status;
        $blog->save();
        return redirect('add-blog')->with('message','Blog Save Successfully');
    }
    public function editBlog($id){
        $blog = Blog::query()->find($id);
        return view('admin.blog.edit-blog',[
            'blog' => $blog,
        ]);
    }
    public function updateBlog(Request $request){

        $blog = Blog::query()->find($request->id);
        if ( $blogImage = $request->file('image')) {
            $directory = "blog-image/";
            $imageName = Str::random(40) ."." . $blogImage->getClientOriginalExtension();
            //$aboutImage->move($directory,$imageName);
            $blogImage->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
            Storage::delete($blog->image);
        } else {
            $imageUrl = $blog->image;
        }

        $blog->title               = $request->title;
        $blog->short_description   = $request->short_description;
        $blog->long_description    = $request->long_description;
        $blog->image               = $imageUrl;
        $blog->status              = $request->status;
        $blog->save();
        return redirect('/add-blog');
    }
    public function deleteBlog($id){
        $blog = Blog::query()->find($id);
        Storage::delete($blog->image);
        $blog->delete();
        return redirect('/add-blog');
    }
}
