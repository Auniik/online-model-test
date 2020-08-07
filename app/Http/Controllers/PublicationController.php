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
        $publications = Publication::all();
        return view('admin.publication.add-publication',[
            'publications' => $publications,
        ]);
    }

    public function newPublication(Request $request)
    {
//        $publicationImage = $request->file('image');
//        $directory = "publication-image/";
//        $imageName = $publicationImage->getClientOriginalName();
//        $imageUrl = $directory.$imageName;
//        Image::make($publicationImage)->resize(300, 300)->save($imageUrl);


        if ($request->has('image')) {
            $publicationImage = $request->file('image');
            $directory = "publication-image/";
            $imageName = Str::random(40) . '.' . $publicationImage->getClientOriginalExtension();
            $publicationImage->move($directory,$imageName);
            $imageUrl = $directory.$imageName;
        }



        $publication = new Publication();
        $publication->title = $request->title;
        $publication->description = $request->description;
        $publication->image = $imageUrl;
        $publication->status = $request->status;
        $publication->save();

        return redirect('add-publication')->with('message', 'Publication Save Successfully');
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
        $publication = Publication::query()->find($request->id);
        if ($request->has('image')) {
            $publicationImage = $request->file('image');
            $directory = "publication-image/";
            $imageName = Str::random(40) . '.' . $publicationImage->getClientOriginalExtension();
            $imageUrl = $directory.$imageName;
           Storage::delete($publication->image);
        } else {
            $imageUrl = $publication->image;
        }


        $publication->title = $request->title;
        $publication->description = $request->description;
        $publication->image = $imageUrl;
        $publication->status = $request->status;
        $publication->save();
        return redirect('/add-publication');
    }
    public function deletePublication($id){
        $publication = Publication::query()->find($id);
        Storage::delete($publication->image);
        $publication->delete();
        return redirect('/add-publication');
    }


    public function detailsPublication($id){

        $publications = Publication::query()->find($id);
        return view('front.about.publication-details',[
            'publications' => $publications,
        ]);
    }
}
