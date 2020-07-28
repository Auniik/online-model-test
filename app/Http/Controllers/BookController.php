<?php

namespace App\Http\Controllers;

use App\Book;
use App\Book_image;
use App\BookImage;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addBook()
    {
        $books = Book::query()->latest()->paginate(15);
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

        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->reward = $request->reward;
        $book->status = $request->status;
        $book->save();
        $bookId = $book->id;

        $images = $request->file('book_image');
        foreach ($images as $image) {
            $imageName = $image->getClientOriginalName();
            $directory = './book-images/';
            $imageUrl = $directory . $imageName;
            $image->move($directory, $imageName);
            $book_Image = new BookImage();
            $book_Image->book_id = $bookId;
            $book_Image->image = $imageUrl;
            $book_Image->save();
        }

        return redirect('add-book')->with('message', 'Book Save Successfully');
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

        $bookImage = $request->file('image');
        $directory = "book-image/";
        $imageName = $bookImage->getClientOriginalName();
        $imageUrl = $directory . $imageName;
        Image::make($bookImage)->resize(1500, 400)->save($imageUrl);

        $book = Book::find($request->id);
        $book->title = $request->title;
        $book->image = $imageUrl;
        $book->description = $request->description;
        $book->reward = $request->reward;
        $book->status = $request->status;
        $book->save();
        return redirect('/add-book');
    }
    public function deleteBook($id){
        $book = Book::find($id);
        $book->delete();
        return redirect('/add-book');
    }
}
