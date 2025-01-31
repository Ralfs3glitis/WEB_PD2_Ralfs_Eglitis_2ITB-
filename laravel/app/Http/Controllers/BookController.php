<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    // validate and save Book data
    private function saveBookData(Book $book, BookRequest $request)
    {
        $validatedData = $request->validated();
        $book->fill($validatedData);
        $book->display = (bool) ($validatedData['display'] ?? false);
        if ($request->hasFile('image')) {
            // here you can add code that deletes old image file when new one is uploaded
            $uploadedFile = $request->file('image');
            $extension = $uploadedFile->clientExtension();
            $name = uniqid();
            $book->image = $uploadedFile->storePubliclyAs(
                '/',
                $name . '.' . $extension,
                'uploads'
            );
        }
        $book->save();
    }

    // call auth middleware
    public function __construct()
    {
        $this->middleware('auth'); // Apply authentication middleware to all methods
    }
    // display all Books
    public function list(): View
    {
        $items = Book::orderBy('name', 'asc')->get();
        return view(
            'book.list',
            [
                'title' => 'Books',
                'items' => $items
            ]
        );
    }
    // display new Book form
    public function create(): View
    {
        $authors = Author::orderBy('name', 'asc')->get();
        $genres = Genre::orderBy('name', 'asc')->get();
        return view(
            'book.form',
            [
                'title' => 'Add new book',
                'book' => new Book(),
                'authors' => $authors,
                'genres' => $genres,
            ]
        );
    }
    // create new Book entry
    public function put(BookRequest $request)
    {
        $book = new Book();
        $this->saveBookData($book, $request);
        return redirect('/books');
    }
    // display Book edit form
    public function update(Book $book): View
    {
        $authors = Author::orderBy('name', 'asc')->get();
        $genres = Genre::orderBy('name', 'asc')->get();
        return view(
            'book.form',
            [
                'title' => 'Rediģēt grāmatu',
                'book' => $book,
                'authors' => $authors,
                'genres' => $genres,
            ]
        );
    }
    // update Book data
    public function patch(Book $book, BookRequest $request)
    {
        $this->saveBookData($book, $request);
        return redirect('/books/update/' . $book->id);
    }
    // delete Book
    public function delete(Book $book): RedirectResponse
    {
        if ($book->image) {
            unlink(getcwd() . '/images/' . $book->image);
        }
        $book->delete();
        return redirect('/books');
    }
}
