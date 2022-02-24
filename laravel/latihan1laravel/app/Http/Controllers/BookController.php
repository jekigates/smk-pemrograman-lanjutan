<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class BookController extends Controller
{
    //
    public function index() {
        $books = Book::all();

        return view('books.index', ['books' => $books]);
    }
    
    public function create()
    {
        return view('books.create');
    }

    public function show($id)
    {
        $book = Book::find($id);

        return view('books.show', ['book' => $book]);
    }

    public function store(Request $request)
    {
        $timestamp = now();

        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publication = $request->publication;
        $book->year = $request->year;
        $book->created_at = now();
        $book->updated_at = now();
        $book->save();

        return redirect('/books');
    }

    public function edit($id)
    {
        $book = Book::find($id);

        return view('books.edit', ['book' => $book]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publication = $request->publication;
        $book->year = $request->year;
        $book->updated_at = now();
        $book->save();

        return redirect('/books');
    }

    public function destroy($id)
    {
        Book::find($id)->delete();

        return redirect('/books');
    }
}
