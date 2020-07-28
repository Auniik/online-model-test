<?php

namespace App\Http\Controllers;
use App\Blog;
use Image;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function addBlog() {

        return view('admin.blog.add-blog',[
            'blogs' => Blog::query()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }
    public function newBlog(Request $request){

        $blogImage = $request->file('image');
        $directory = "blog-image/";
        $imageName = $blogImage->getClientOriginalName();
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
        $blog = Blog::find($id);
        return view('admin.blog.edit-blog',[
            'blog' => $blog,
        ]);
    }
    public function updateBlog(Request $request){

        $blogImage = $request->file('image');
        $directory = "about-image/";
        $imageName = $blogImage->getClientOriginalName();
        //$aboutImage->move($directory,$imageName);
        $imageUrl = $directory.$imageName;
        Image::make($blogImage)->resize(1500, 500)->save($imageUrl);

        $blog = Blog::find($request->id);
        $blog->title               = $request->title;
        $blog->short_description   = $request->short_description;
        $blog->long_description    = $request->long_description;
        $blog->image               = $imageUrl;
        $blog->status              = $request->status;
        $blog->save();
        return redirect('/add-blog');
    }
    public function deleteBlog($id){
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('/add-blog');
    }
}
