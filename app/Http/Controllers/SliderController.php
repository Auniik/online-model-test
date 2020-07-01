<?php

namespace App\Http\Controllers;

use App\Slider;
use Image;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function addSlider(){
        $sliders = Slider::all();
        return view('admin.slider.add-slider',[
            'sliders' => $sliders,
        ]);
    }
    public function newSlider(Request $request){

        $sliderImage = $request->file('image');
        $directory = "slider-image/";
        $imageName = $sliderImage->getClientOriginalName();
        $sliderImage->move($directory,$imageName);
        $imageUrl = $directory.$imageName;

        $slider = new Slider();
        $slider->image = $imageUrl;
        $slider->title = $request->title;
        $slider->short_description = $request->short_description;
        $slider->link = $request->link;
        $slider->status = $request->status;
        $slider->save();
        return redirect('add-slider')->with('message','Slider Save Successfully');
    }
    public function editSlider($id){

        $slider = Slider::find($id);
        return view('admin.slider.edit-slider',[
            'slider' => $slider,
        ]);
    }
    public function updateSlider(Request $request){

        $slider = Slider::find($request->id);
        if($sliderImage = $request->file('image'))
        {
            if(file_exists($slider->image)){
                unlink($slider->image);
            }
            $directory = "slider-image/";
            $imageName = $sliderImage->getClientOriginalName();
            $imageUrl = $directory.$imageName;
            Image::make($sliderImage)->resize(2000, 1333)->save($imageUrl);
        }
        else{
            $imageUrl = $slider->image;
        }

        $slider->image = $imageUrl;
        $slider->title = $request->title;
        $slider->short_description = $request->short_description;
        $slider->link = $request->link;
        $slider->status = $request->status;
        $slider->save();
        return redirect('add-slider')->with('message','Slider Update Successfully');
    }
    public function deleteSlider($id){
        $slider = Slider::find($id);
        $slider->delete();
        return redirect('add-slider')->with('message','Slider Delete Successfully');

    }
}
