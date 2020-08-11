<?php

namespace App\Http\Controllers;

use App\Book;
use App\Book_image;
use App\BookImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addBook()
    {
        $books = Book::query()->withCount('questions')->latest()->paginate(15);
        return view('admin.book.add-book', [
            'books' => $books,
        ]);
    }

    public function create()
    {
        return view('admin.book.create');
    }

    public function newBook(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'reward' => 'required',
            'cover_image' => 'required|max:2048|image',
            'reward_image' => 'required|max:2048|image',
            'book_image.*' => 'required|max:8000|image',
        ]);

        DB::transaction(function () use ($request) {
            $attributes = $request->only('title', 'description', 'reward', 'status');
            $attributes['cover_image'] = $request->cover_image->store('uploads/books');
            $attributes['reward_image'] = $request->reward_image->store('uploads/books');

            $book = Book::query()->create($attributes);

            foreach ($request->file('book_image', []) as $image) {
                $imageURL = $image->store('uploads/books');
                /** @var Book $book */
                $book->images()->create([
                    'image' => $imageURL
                ]);
            }
        });

        return redirect('add-book')->withSuccess('বই তৈরী করা হয়েছে !');
    }

    public function editBook($id)
    {
        $book = Book::query()->find($id);
        return view('admin.book.edit-book', [
            'book' => $book,
        ]);
    }

    public function updateBook(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'reward' => 'required',
            'cover_image' => 'max:2048|image',
            'reward_image' => 'max:2048|image',
            'book_image.*' => 'max:8000|image',
        ]);

        DB::transaction(function () use ($request) {
            $book = Book::query()->find($request->id);
            $attributes = $request->only('title', 'description', 'reward', 'status');
            if ($request->hasFile('cover_image')) {
                $attributes['cover_image'] = $request->cover_image->store('uploads/books');
                Storage::delete($book->cover_image);
            }
            if ($request->hasFile('reward_image')) {
                $attributes['reward_image'] = $request->reward_image->store('uploads/books');
                Storage::delete($book->reward_image);
            }

            $book = $book->update($attributes);

            foreach ($request->file('book_image', []) as $image) {
                $imageURL = $image->store('uploads/books');
                /** @var Book $book */
                $book->images()->create([
                    'image' => $imageURL
                ]);
            }
        });

        return redirect('/add-book')->withSuccess(' বই হালনাগাদ করা হয়েছে !');
    }
    public function deleteBook($id){
        $book = Book::find($id);
        $book->delete();
        return redirect('/add-book');
    }

    public function deleteBookImage($id){
        $bookImage = BookImage::query()->find($id);
        Storage::delete($bookImage->image);
        $bookImage->delete();
        return response([
            'status' => true,
            'message' => ' ছবি মুছে ফেলা হয়েছে !'
        ]);
    }
}
