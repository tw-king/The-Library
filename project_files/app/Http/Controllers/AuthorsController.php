<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorsController extends Controller
{
    /*
		Get data for and display initial index page
	*/
    public function getIndex()
    {
    	// Get all authors and display index
    	$authors = Author::orderBy('surname')->withCount('books')->paginate(20);
    	return view('admin.authors', ['authors' => $authors]);
    }

    /*
        Enable librarian to add an author to the database
    */
    public function addAuthor(Request $request)
    {
        $this->validate($request, [
            'surname' => 'required'
        ]);

        $author = new Author([
            'surname' => $request->input('surname'),
            'firstnames' => $request->input('firstnames')
        ]);
        $author->save();

        return redirect()->route('admin.author.index')->with('info', 'Author added!');
    }

    /*
        Enable librarian to edit an author in the database
    */
    public function editAuthor(Request $request)
    {
        $this->validate($request, [
            'surname' => 'required'
        ]);

        $author = Author::find($request->input('author_id'));

        $author->surname = $request->input('surname');
        $author->firstnames = $request->input('firstnames');

        $author->save();

        return redirect()->route('admin.author.index')->with('info', 'Author updated!');
    }

    /*
        Enable librarian to remove an author from the database
    */
    public function deleteAuthor(Request $request)
    {
    	$infoMsg = 'Author has books! Deletion failed!!';
        $author = Author::withCount('books')->find($request->input('author_id'));
        if ($author->books_count == 0) {
        	$author->delete();
	    	$infoMsg = 'Author deleted!';
    	}

        return redirect()->route('admin.author.index')->with('info', $infoMsg);
    }

}
