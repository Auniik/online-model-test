<?php

namespace App\Http\Controllers;

use App\Youtube;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class YoutubeController extends Controller
{
    public function addVideo(){
        $youtubies = Youtube::all();
        return view('admin.video.add-video',[
            'youtubies' => $youtubies,
        ]);
    }
    public function newVideo(Request $request){
        $youtube = new youtube();
        $youtube->link = $request->link;
        $youtube->save();
        return redirect('add-video')->with('message','Data Save Successfully');
    }
    public function deleteVideo($id){
        $youtube = Youtube::find($id);
        $youtube->delete();
        return redirect('add-video')->with('message','Data Delete Successfully');
    }
}
