<?php

namespace App\Http\Controllers;

use App\About;
use Image;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function addAbout(){
        $abouts = About::all();
      return view('admin.about.add-about',[
        'abouts' => $abouts,
      ]);

    }
    public function newAbout(Request $request){

        $aboutImage = $request->file('image');
        $directory = "about-image/";
        $imageName = $aboutImage->getClientOriginalName();
        $aboutImage->move($directory,$imageName);
        $imageUrl = $directory.$imageName;

        $about = new About();
        $about->title               = $request->title;
        $about->mission             = $request->mission;
        $about->vision              = $request->vision;
        $about->short_description   = $request->short_description;
        $about->long_description    = $request->long_description;
        $about->image               = $imageUrl;
        $about->status              = $request->status;
        $about->save();
        return redirect('add-about')->with('message','Slider Save Successfully');
    }
    public function editAbout($id){
        $about = About::find($id);
        return view('admin.about.edit-about',[
            'about' => $about,
        ]);
    }
    public function updateAbout(Request $request){

        $aboutImage = $request->file('image');
        $directory = "about-image/";
        $imageName = $aboutImage->getClientOriginalName();
        //$aboutImage->move($directory,$imageName);
        $imageUrl = $directory.$imageName;
        Image::make($aboutImage)->resize(1500, 400)->save($imageUrl);

        $about = About::find($request->id);
//        $about->title               = $request->title;
//        $about->mission             = $request->mission;
//        $about->vision              = $request->vision;
//        $about->short_description   = $request->short_description;
//        $about->long_description    = $request->long_description;
        $about->image               = $imageUrl;
        $about->status              = $request->status;
        $about->save();
        return redirect('/add-about');
    }
}
