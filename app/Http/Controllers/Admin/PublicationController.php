<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    public function index()
    {
        return view('admin.publication.index', [
            'publications' => Publication::query()
                ->latest()
                ->paginate(15),
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'file' => 'required|mimes:pdf|max:20000',
            'image' => 'required|image|max:2048',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        $attributes['file'] = $request->file->store('uploads/publications');
        $attributes['image'] = $request->image->store('uploads/publications');
        Publication::query()->create($attributes);
        return back()->withSuccess('Publication added Successfully');
    }

    public function edit(Publication $publication)
    {
        return view('admin.publication.edit', [
            'publication' => $publication,
        ]);
    }

    public function update(Request $request, Publication $publication)
    {
        $attributes = $request->validate([
            'file' => 'mimes:pdf|max:20000',
            'image' => 'image|max:2048',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        if ($request->has('file')) {
            $attributes['file'] = $request->file->store('uploads/publications');
            Storage::delete($publication->file);
        }

        if ($request->has('image')) {
            $attributes['image'] = $request->image->store('uploads/publications');
            Storage::delete($publication->image);
        }
        $publication->update($attributes);
        return back()->withSuccess('পাবলিকেশন হালনাগাদ করা হয়েছে');
    }

    public function destroy(Publication $publication)
    {
        Storage::delete($publication->file);
        Storage::delete($publication->image);
        $publication->delete();
        return response([
            'check' => true
        ]);
    }


    public function show(Publication $publication)
    {
        return view('front.about.publication-details', [
            'publication' => $publication,
        ]);
    }
}
