<?php

namespace App\Http\Controllers;

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

    public function edit(News $news)
    {
        return view('admin.news.edit-news', [
            'news' => $news,
        ]);
    }

    public function update(Request $request, News $news)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'link' => ''
        ]);
        $news->update($attributes);
        return redirect()
            ->route('newses.index')
            ->withSuccess(' নিউজ আপডেট হালনাগাদ করা হয়েছে');

    }

    public function destroy(News $news)
    {
        $news->delete();
        return response([
            'check' => true
        ]);
    }
}
