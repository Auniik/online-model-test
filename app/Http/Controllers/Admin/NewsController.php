<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.news', [
            'newses' => News::query()
                ->latest()
                ->paginate(15),
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'link' => ''
        ]);
        News::query()
            ->create($attributes);
        return back()->withSuccess('নিউজ আপডেট যুক্ত করা হয়েছে');
    }

    public function edit(News $news_update)
    {
        return view('admin.news.edit-news', [
            'news' => $news_update,
        ]);
    }

    public function update(Request $request, News $news_update)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'link' => ''
        ]);
        $news_update->update($attributes);
        return redirect()
            ->route('news-updates.index')
            ->withSuccess(' নিউজ আপডেট হালনাগাদ করা হয়েছে');

    }

    public function destroy(News $news_update)
    {
        $news_update->delete();
        return response([
            'check' => true
        ]);
    }
}
