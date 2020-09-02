<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::query()->latest()->paginate(15);
        return view('admin.publication.add-publication', [
            'publications' => $publications,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:20000',
            'image' => 'required|image|max:2048',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $fileUrl = $request->file->store('uploads/publications');
        $image = $request->image->store('uploads/publications');

        $publication = new Publication();
        $publication->title = $request->title;
        $publication->description = $request->description;
        $publication->file = $fileUrl;
        $publication->image = $image;
        $publication->status = $request->status;
        $publication->save();

        return back()->withSuccess('Publication added Successfully');
    }

    public function edit(Publication $publication)
    {
        return view('admin.publication.edit-publication', [
            'publication' => $publication,
        ]);
    }

    public function update(Request $request, Publication $publication)
    {
        $request->validate([
            'file' => 'mimes:pdf|max:20000',
            'image' => 'image|max:2048',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        if ($request->has('file')) {
            $fileUrl = $request->file->store('uploads/publications');
            Storage::delete($publication->file);
        } else {
            $fileUrl = $publication->file;
        }

        if ($request->has('image')) {
            $image = $request->image->store('uploads/publications');
            Storage::delete($publication->image);
        } else {
            $image = $publication->image;
        }


        $publication->title = $request->title;
        $publication->description = $request->description;
        $publication->file = $fileUrl;
        $publication->image = $image;
        $publication->status = $request->status;
        $publication->save();
        return back()->withSuccess(' পাবলিকেশন হালনাগাদ করা হয়েছে');
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
