<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\BookImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        return view('admin.book.index', [
            'books' => Book::query()
                ->withCount('questions')
                ->latest()
                ->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.book.create');
    }

    public function store(Request $request)
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

        return back()->withSuccess('বই তৈরী করা হয়েছে !');
    }

    public function edit(Book $book)
    {
        return view('admin.book.edit', [
            'book' => $book,
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'reward' => 'required',
            'cover_image' => 'max:2048|image',
            'reward_image' => 'max:2048|image',
            'book_image.*' => 'max:8000|image',
        ]);

        DB::transaction(function () use ($request, $book)  {
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

        return back()->withSuccess(' বই হালনাগাদ করা হয়েছে !');
    }

    public function destroy(Book $book)
    {
        Storage::delete($book->reward_image);
        Storage::delete($book->cover_image);
        $book->questions()->delete();
        foreach ($book->images as $image) {
            Storage::delete($image->image);
        }
        $book->images()->delete();
        $book->delete();
        return response([
            'check' => true
        ]);
    }

    public function deleteBookImage($id)
    {
        $bookImage = BookImage::query()->find($id);
        Storage::delete($bookImage->image);
        $bookImage->delete();
        return response([
            'status' => true,
            'message' => ' ছবি মুছে ফেলা হয়েছে !'
        ]);
    }
}
