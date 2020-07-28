<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\BookQuestion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.book.question.index')->with([
            'questions'=> BookQuestion::query()->paginate(15)
        ]);
    }

    public function create()
    {
        return view('admin.book.question.create', [
            'books'=> Book::query()->latest()->pluck('title', 'id'),
        ]);
    }

    public function store(Request $request)
    {
        $exists = BookQuestion::query()
            ->where('book_id', $request->book_id)
            ->first();

        if(empty($exists)){
            BookQuestion::query()->create($request->except('_token'));

            return redirect()->back()->with([
                'success'=>'New Question created'
            ]);
        }

        return redirect()->back()->with([
            'error'=>'Question already exists'
        ]);

    }

    public function edit($id,Request $request)
    {
        return view('admin.book.question.edit')->with([
            'books' => Book::query()->get()->pluck('title','id'),
            'question' => BookQuestion::query()->find($id)
        ]);
    }

    public function update(Request $request,$id)
    {
        BookQuestion::query()
            ->where('id', $id)
            ->update($request->except('_token'));

        return redirect()->route('admin.book.question')->with([
            'success'=>'New Question updated'
        ]);
    }

    public function delete($id)
    {
        BookQuestion::query()->where('id',$id)->delete();
        return redirect()->back()->with([
            'success' => 'Question deleted'
        ]);
    }
}
