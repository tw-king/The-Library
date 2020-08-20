<?php

namespace App\Http\Controllers;
use App\Genre;

use Illuminate\Http\Request;

class GenresController extends Controller
{
    /*
		Get data for and display initial index page
	*/
    public function getIndex()
    {
    	// Get all genres and display index
    	$genres = Genre::orderBy('genre')->withCount('books')->paginate(20);
    	return view('admin.genres', ['genres' => $genres]);
    }

    /*
        Enable librarian to add a genre to the database
    */
    public function addGenre(Request $request)
    {
        $this->validate($request, [
            'genre' => 'required'
        ]);

        $genre = new Genre([
            'genre' => $request->input('genre')
        ]);
        $genre->save();

        return redirect()->route('admin.genre.index')->with('info', 'Genre added!');
    }

    /*
        Enable librarian to edit a genre in the database
    */
    public function editGenre(Request $request)
    {
        $this->validate($request, [
            'genre' => 'required'
        ]);

        $genre = Genre::find($request->input('genre_id'));

        $genre->genre = $request->input('genre');
        $genre->save();

        return redirect()->route('admin.genre.index')->with('info', 'Genre updated!');
    }

    /*
        Enable librarian to remove a genre from the database
    */
    public function deleteGenre(Request $request)
    {
    	$infoMsg = 'Genre has books! Deletion failed!!';
        $genre = Genre::withCount('books')->find($request->input('genre_id'));
        if ($genre->books_count == 0) {
        	$genre->delete();
	    	$infoMsg = 'Genre deleted!';
    	}

        return redirect()->route('admin.genre.index')->with('info', $infoMsg);
    }
}
