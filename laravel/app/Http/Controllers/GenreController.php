<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;


class GenreController extends Controller
{

    // display all Genres
    public function list(): View
    {
        $items = Genre::orderBy('name', 'asc')->get();
        return view(
            'genre.list',
            [
                'title' => 'Genres',
                'items' => $items,
            ]
        );
    }
    // display new Genre form
    public function create(): View
    {
        return view(
            'genre.form',
            [
                'title' => 'Add new genre',
                'genre' => new Genre()
            ]
        );
    }
    // create new Genre
    public function put(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $genre = new Genre();
        $genre->name = $validatedData['name'];
        $genre->save();
        return redirect('/genres');
    }
    // display Genre editing form
    public function update(Genre $genre): View
    {
        return view(
            'genre.form',
            [
                'title' => 'Edit genre',
                'genre' => $genre
            ]
        );
    }
    // update existing Genre data
    public function patch(Genre $genre, Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $genre->name = $validatedData['name'];
        $genre->save();
        return redirect('/genres');
    }
    public function delete(Genre $genre): RedirectResponse
    {
        // this is a good place to check if genre has related Book items and prevent deletion if so
        $genre->delete();
        return redirect('/genres');
    }
}
