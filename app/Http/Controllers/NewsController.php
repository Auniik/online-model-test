<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function addNews(){
        $news = News::query()->latest()->paginate(15);
        return view('admin.news.news',[
            'news' => $news,
        ]);
    }
    public function newNews(Request $request){
        $request->validate([
            'title' => 'required'
        ]);
        $news = new News();
        $news->title = $request->title;
        $news->save();
        return redirect('add-news')->withSuccess('News update saved successfully');
    }
    public function editNews($id){
        $news = News::query()->find($id);
        return view('admin.news.edit-news',[
            'news' => $news,
        ]);
    }
    public function updateNews(Request $request){
        $news = News::query()->find($request->id);
        $news->title = $request->title;
        $news->save();
        return redirect('add-news')->withSuccess('News Update updated.');

    }
    public function deleteNews($id){
        $news = News::query()->find($id);
        $news->delete();
        return redirect('add-news')->withSuccess('News Update Deleted');
    }
}
