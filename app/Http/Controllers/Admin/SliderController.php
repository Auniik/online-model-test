<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin.slider.index', [
            'sliders' => Slider::query()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
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

        return back()->withSuccess('Slider image saved Successfully!');
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', [
            'slider' => $slider,
        ]);
    }

    public function update(Request $request, Slider $slider)
    {
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

        return back()->withSuccess('স্লাইডার ছবি হালনাগাদ করা হয়েছে!');
    }

    public function destroy(Slider $slider)
    {
        Storage::delete($slider->image);
        $slider->delete();

        return response([
            'check' => true
        ]);

    }
}
