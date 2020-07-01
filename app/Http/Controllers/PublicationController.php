<?php

namespace App\Http\Controllers;

use App\Publication;
use Image;
use App\Contract;
use App\News;
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


        $publicationImage = $request->file('image');
        $directory = "publication-image/";
        $imageName = $publicationImage->getClientOriginalName();
        $publicationImage->move($directory,$imageName);
        $imageUrl = $directory.$imageName;


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

        $publicationImage = $request->file('image');
        $directory = "publication-image/";
        $imageName = $publicationImage->getClientOriginalName();
        $imageUrl = $directory.$imageName;
        Image::make($publicationImage)->resize(300, 300)->save($imageUrl);

        $publication = Publication::find($request->id);
        $publication->title = $request->title;
        $publication->description = $request->description;
        $publication->image = $imageUrl;
        $publication->status = $request->status;
        $publication->save();
        return redirect('/add-publication');
    }
    public function deletePublication($id){
        $publication = Publication::find($id);
        $publication->delete();
        return redirect('/add-publication');
    }
    public function detailsPublication($id){
        $contract = Contract::all();
        $news = News::orderBy('id', 'desc')->take(10)->get();
        $joint = '';
        foreach ($news as $key => $item){
            $joint .= ($key+1).'. '.$item->title.' &nbsp;&nbsp;&nbsp;&nbsp;';
        }
        $publications = Publication::find($id);
        return view('front.about.publication-details',[
            'publications' => $publications,
            'news' =>$joint,
            'contract'=>$contract,
        ]);
    }
}
