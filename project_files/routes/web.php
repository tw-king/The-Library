<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Library front routes
Route::get('/', [
    'uses' => 'BooksController@getIndex',
    'as' => 'books.index'
]);

Route::get('by_genre', [
    'uses' => 'BooksController@getGenreIndex',
    'as' => 'books.GenreIndex'
]);

Route::get('borrow/{book_id}', [
    'uses' => 'BooksController@borrowBook',
    'as' => 'books.borrow'
])->middleware('auth');

Route::get('return/{book_id}', [
    'uses' => 'BooksController@returnBook',
    'as' => 'books.return'
])->middleware('auth');


// Admin area routes
Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
	Route::get('', [
        'uses' => 'BooksController@getAdminIndex',
        'as' => 'admin.index'
	]);

    Route::post('createBook', [
        'uses' => 'BooksController@addBook',
        'as' => 'admin.createBook'
    ]);

    Route::post('editBook', [
        'uses' => 'BooksController@editBook',
        'as' => 'admin.editBook'
    ]);

    Route::post('deleteBook', [
        'uses' => 'BooksController@deleteBook',
        'as' => 'admin.deleteBook'
    ]);

    Route::get('authorIndex', [
        'uses' => 'AuthorsController@getIndex',
        'as' => 'admin.author.index'
    ]);

    Route::post('createAuthor', [
        'uses' => 'AuthorsController@addAuthor',
        'as' => 'admin.createAuthor'
    ]);

    Route::post('editAuthor', [
        'uses' => 'AuthorsController@editAuthor',
        'as' => 'admin.editAuthor'
    ]);

    Route::post('deleteAuthor', [
        'uses' => 'AuthorsController@deleteAuthor',
        'as' => 'admin.deleteAuthor'
    ]);

    Route::get('genreIndex', [
        'uses' => 'GenresController@getIndex',
        'as' => 'admin.genre.index'
    ]);

    Route::post('createGenre', [
        'uses' => 'GenresController@addGenre',
        'as' => 'admin.createGenre'
    ]);

    Route::post('editGenre', [
        'uses' => 'GenresController@editGenre',
        'as' => 'admin.editGenre'
    ]);

    Route::post('deleteGenre', [
        'uses' => 'GenresController@deleteGenre',
        'as' => 'admin.deleteGenre'
    ]);

    Route::get('languageIndex', [
        'uses' => 'LanguagesController@getIndex',
        'as' => 'admin.language.index'
    ]);

    Route::post('createLanguage', [
        'uses' => 'LanguagesController@addLanguage',
        'as' => 'admin.createLanguage'
    ]);

    Route::post('editLanguage', [
        'uses' => 'LanguagesController@editLanguage',
        'as' => 'admin.editLanguage'
    ]);

    Route::post('deleteLanguage', [
        'uses' => 'LanguagesController@deleteLanguage',
        'as' => 'admin.deleteLanguage'
    ]);
    
    Route::get('userIndex', [
        'uses' => 'UsersController@getIndex',
        'as' => 'admin.user.index'
    ]);

});

// Laravel Authorisation route handling
Auth::routes();
