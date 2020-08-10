<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function addPublication()
    {
        $publications = Publication::query()->latest()->paginate(15);
        return view('admin.publication.add-publication',[
            'publications' => $publications,
        ]);
    }

    public function newPublication(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
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

        return redirect('add-publication')->withSuccess('Publication added Successfully');
    }

    public function editPublication($id)
    {
        $publication = Publication::find($id);
        return view('admin.publication.edit-publication', [
            'publication' => $publication,
        ]);
    }

    public function updatePublication(Request $request)
    {
        $request->validate([
            'file' => 'mimes:pdf|max:20000',
            'image' => 'image|max:2048',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        $publication = Publication::query()->find($request->id);
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
        return redirect('/add-publication')->withSuccess(' পাবলিকেশন হালনাগাদ করা হয়েছে');
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


    public function detailsPublication($id){

        $publications = Publication::query()->find($id);
        return view('front.about.publication-details',[
            'publications' => $publications,
        ]);
    }
}
