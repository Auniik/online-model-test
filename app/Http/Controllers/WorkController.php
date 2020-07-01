<?php

namespace App\Http\Controllers;

use App\Work;
use App\News;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function addWork()
    {
        $works = Work::all();
        $news = News::orderBy('id','desc')->take(10)->get();
        return view('front.work.submit-work',[
            'news'          => $news,
            'works'         => $works,
        ]);
    }

    public function newWork(Request $request)
    {
        $request->validate([
            'file' => 'required|max:20480|mimes:jpeg,bmp,png,mp4,jpg,gif',
        ]);
        $eventImage = $request->file('file');
        $directory = "submitted_work/";
        $imageName = $eventImage->getClientOriginalName();
        $eventImage->move($directory, $imageName);
        $fileUrl = $directory . $imageName;

        $work = new Work();
        $work->title        = $request->title;
        $work->work_type    = $request->work_type;
        $work->description  = $request->description;
        $work->file         = $fileUrl;
        $work->link         = $request->link;
        $work->user_name    = $request->user_name;
        $work->mobile_no    = $request->mobile_no;
        $work->save();
        return redirect()->back()->with('message', 'Data Successfully Save');

    }
    public function deleteSubmitWork($id){
       $work  = Work::find($id);
       $work->delete();
        return redirect('/admin/submitted-work')->with('message', 'Data Successfully Delete' );
    }
}
