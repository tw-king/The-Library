<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;

class LanguagesController extends Controller
{
    /*
		Get data for and display initial index page
	*/
    public function getIndex()
    {
    	// Get all languages and display index
    	$languages = Language::orderBy('language')->withCount('books')->paginate(20);
    	return view('admin.languages', ['languages' => $languages]);
    }

    /*
        Enable librarian to add a language to the database
    */
    public function addLanguage(Request $request)
    {
        $this->validate($request, [
            'language' => 'required'
        ]);

        $language = new Language([
            'language' => $request->input('language')
        ]);
        $language->save();

        return redirect()->route('admin.language.index')->with('info', 'Language added!');
    }

    /*
        Enable librarian to edit a language in the database
    */
    public function editLanguage(Request $request)
    {
        $this->validate($request, [
            'language' => 'required'
        ]);

        $language = Language::find($request->input('language_id'));

        $language->language = $request->input('language');
        $language->save();

        return redirect()->route('admin.language.index')->with('info', 'Language updated!');
    }

    /*
        Enable librarian to remove a language from the database
    */
    public function deleteLanguage(Request $request)
    {
    	$infoMsg = 'Language has books! Deletion failed!!';
        $language = Language::withCount('books')->find($request->input('language_id'));
        if ($language->books_count == 0) {
        	$language->delete();
	    	$infoMsg = 'Language deleted!';
    	}

        return redirect()->route('admin.language.index')->with('info', $infoMsg);
    }
}
