<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function addNews(){
        $news = News::all();
        return view('admin.news.news',[
            'news' => $news,
        ]);
    }
    public function newNews(Request $request){
        $news = new News();
        $news->title = $request->title;
        $news->save();
        return redirect('add-news')->with('message','Data save');
    }
    public function editNews($id){
        $news = News::find($id);
        return view('admin.news.edit-news',[
            'news' => $news,
        ]);
    }
    public function updateNews(Request $request){
        $news = News::find($request->id);
        $news->title = $request->title;
        $news->save();
        return redirect('add-news')->with('message','Data Update save');

    }
    public function deleteNews($id){
        $news = News::find($id);
        $news->delete();
        return redirect('add-news')->with('message','Data Delete');
    }
}
