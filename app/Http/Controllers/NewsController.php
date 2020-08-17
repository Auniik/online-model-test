<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.news', [
            'newses' => News::query()->latest()->paginate(15),
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $news = new News();
        $news->title = $request->title;
        $news->link = $request->link;
        $news->save();
        return back()->withSuccess(' নিউজ আপডেট যুক্ত করা হয়েছে');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit-news', [
            'news' => $news,
        ]);
    }

    public function update(Request $request, News $news)
    {
        $news->title = $request->title;
        $news->link = $request->link;
        $news->save();
        return redirect('add-news')->withSuccess(' নিউজ আপডেট হালনাগাদ করা হয়েছে');

    }

    public function destroy(News $news)
    {
        $news->delete();
        return response([
            'check' => true
        ]);
    }
}
