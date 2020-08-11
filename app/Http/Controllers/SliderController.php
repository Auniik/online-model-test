<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Support\Facades\Storage;
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

    public function create()
    {
        return view('admin.slider.create');
    }

    public function newSlider(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'link_1' => 'required_with:link_1_text',
            'link_2' => 'required_with:link_2_text',
            'link_1_text' => 'required_with:link_1',
            'link_2_text' => 'required_with:link_2',
            'image' => 'image|required|max:5000',
            'status' => 'required'
        ]);

        $attributes['image'] = $request->image->store('uploads/slider');

        Slider::query()->create($attributes);

        return redirect('add-slider')
            ->withSuccess('Slider image saved Successfully!');
    }

    public function editSlider($id){

        $slider = Slider::find($id);
        return view('admin.slider.edit-slider',[
            'slider' => $slider,
        ]);
    }
    public function updateSlider(Request $request, Slider $slider){

        $attributes = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'link_1' => 'required_with:link_1_text',
            'link_2' => 'required_with:link_2_text',
            'link_1_text' => 'required_with:link_1',
            'link_2_text' => 'required_with:link_2',
            'image' => 'image|max:5000',
            'status' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $attributes['image'] = $request->image->store('uploads/slider');
            Storage::delete($slider->image);
        }

        $slider->update($attributes);

        return redirect('add-slider')->withSuccess(' স্লাইডার ছবি হালনাগাদ করা হয়েছে !');
    }
    public function deleteSlider($id){

        $slider = Slider::query()->find($id);
        Storage::delete($slider->image);
        $slider->delete();

        return response([
            'check' => true
        ]);

    }
}
