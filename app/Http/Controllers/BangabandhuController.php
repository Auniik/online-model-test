<?php

namespace App\Http\Controllers;

use App\Bangabandhu;
use Image;
use Illuminate\Http\Request;

class BangabandhuController extends Controller
{
    public function addBangabandhu(){
        $bangabandhus = Bangabandhu::all();
        return view('admin.bangabandhu.add-bangabandhu',[
            'bangabandhus' => $bangabandhus,
        ]);
    }
    public function newBangabandhu(Request $request){

        $bonImage = $request->file('image');
        $directory = "bon-image/";
        $imageName = $bonImage->getClientOriginalName();
        $bonImage->move($directory,$imageName);
        $imageUrl = $directory.$imageName;

        $bangabandhu = new Bangabandhu();
        $bangabandhu->title               = $request->title;
        $bangabandhu->description    = $request->description;
        $bangabandhu->image    = $imageUrl;
        $bangabandhu->save();
        return redirect('add-bangabandhu')->with('message','Slider Save Successfully');
    }
    public function editBangabandhu(){
        $bangabandhu = Bangabandhu::first();
        return view('admin.bangabandhu.edit-bangabandhu',[
            'bangabandhu' => $bangabandhu,
        ]);
    }
    public function updateBangabandhu(Request $request){

        $bangabandhu = Bangabandhu::find($request->id);

        if($bonImage = $request->file('image'))
        {
            if(file_exists($bangabandhu->image)){
                unlink($bangabandhu->image);
            }
            $directory = "bon-image/";
            $imageName = $bonImage->getClientOriginalName();
            $imageUrl = $directory.$imageName;
            Image::make($bonImage)->resize(2000, 1333)->save($imageUrl);
        }
        else{
            $imageUrl = $bangabandhu->image;
        }


        $bangabandhu->title               = $request->title;
        $bangabandhu->description    = $request->description;
        $bangabandhu->image    = $imageUrl;
        $bangabandhu->save();
        return redirect('/add-bangabandhu');
    }
}
