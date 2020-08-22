<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

// Models
use App\Book;
use App\Genre;
use App\Author;

class BooksController extends Controller
{

	/*
		Get data for and display initial index page
	*/
    public function getIndex()
    {
    	// Get all authors and display books indexed by author
    	$authors = Author::orderBy('surname')->get();
    	return view('books.index', ['authors' => $authors, 'user_id' => $this->getUserID()]);
    }

    /*
        Get data for and display admin area book list
    */
    public function getAdminIndex()
    {

        $authors = Author::orderBy('surname')->get();
        $genres = Genre::orderBy('genre')->get();

        $books = Book::join('authors', 'author_id', '=', 'authors.id')->select('books.*', 'surname', 'firstnames')->orderBy('surname')->orderBy('title')->paginate(15);
        return view('admin.index', ['books' => $books, 'genres' => $genres, 'authors' => $authors]);
    }

	/*
		Get data for and display genre index page
	*/
    public function getGenreIndex()
    {
    	// Get all genres and display books indexed by genre
        $rainbow = ['red','orange','yellow','green','blue','indigo','purple'];
        $i = 0;
    	$genres = Genre::orderBy('genre')->get();
        foreach ($genres as $genre) {
            $genre['colour'] = $rainbow[$i++];
            if ($i == 7) $i = 0;
        }
    	return view('books.by_genre', ['genres' => $genres, 'user_id' => $this->getUserID()]);
    }

    /*
    	Enable user to borrow a book.
    */
    public function borrowBook($book_id) {

        // Provided book is not already loaned, update it
        $book = Book::find($book_id);
        if ($book['loaned_to_user_id'] === -1) {
            $book['loaned_to_user_id'] = Auth::user()->id;
            $loanDate = date_format(date_add(date_create(date('Y-m-d')),date_interval_create_from_date_string("7 days")),"Y-m-d");
            $book['loaned_until'] = $loanDate;
            $book->save();
        }

        return redirect()->back();
    }

    /*
        Enable user to borrow a book.
    */
    public function returnBook($book_id) {

        // Update book as returned, provided it is the correct user
        $book = Book::find($book_id);
        if ($book['loaned_to_user_id'] === Auth::user()->id) {
            $book['loaned_to_user_id'] = -1;
            $book['loaned_until'] = null;
            $book->save();
        }

        return redirect()->back();
    }

    /*
        Enable librarian to add a book to the database
    */
    public function addBook(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author_id' => 'required',
            'isbn' => ['regex:/^([\d$]{10}|[\d$]{13})$/','nullable'],
            'synopsis' => 'required|min:10'
        ]);

        $book = new Book([
            'title' => $request->input('title'),
            'isbn' => $request->input('isbn'),
            'author_id' => $request->input('author_id'),
            'pubyear' => $request->input('pubyear')
        ]);
        /*
            Textarea value wasn't being set when in above block
            hence it is set separately now.
        */
        $book->synopsis = $request->input('synopsis');
        $book->save();

        // Update genres pivot table
        $book->genres()->attach($request->input('genres') === null ? [] : $request->input('genres'));

        return redirect()->route('admin.index')->with('info', 'Book added!');
    }

    /*
        Enable librarian to edit a book in the database
    */
    public function editBook(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author_id' => 'required',
            'isbn' => ['regex:/^([\d$]{10}|[\d$]{13})$/','nullable'],
            'synopsis' => 'required|min:10'
        ]);

        $book = Book::find($request->input('book_id'));

        $book->title = $request->input('title');
        $book->synopsis = $request->input('synopsis');
        $book->isbn = $request->input('isbn');
        $book->author_id = $request->input('author_id');
        $book->pubyear = $request->input('pubyear');
        $book->save();

        // Update genres pivot table
        $book->genres()->sync($request->input('genres') === null ? [] : $request->input('genres'));

        return redirect()->route('admin.index')->with('info', 'Book updated!');
    }

    /*
        Enable librarian to remove a book from the database
    */
    public function deleteBook(Request $request)
    {
        $infoMsg = 'Book is on loan! Deletion failed!!';
        $book = Book::find($request->input('book_id'));
        if ($book['loaned_to_user_id'] == -1) {
            $book->delete();
            $book->genres()->detach();  // Delete genre links
            $infoMsg = 'Book deleted!';
        }

        return redirect()->route('admin.index')->with('info', $infoMsg);
    }

    /*
        Pass user ID if logged in otherwise -999, to validate in views.
    */
    public function getUserID() {

        // If authenticated, return users id
        $user_id = -999;
        if (Auth::check()) {
            $user_id = Auth::user()->id;
        }
        return $user_id;
    }
}
