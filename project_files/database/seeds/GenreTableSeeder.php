<?php

use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre = new \App\Genre([
        	'genre' => 'Fiction'
        ]);
        $genre->save();

        $genre = new \App\Genre([
        	'genre' => 'Reference'
        ]);
        $genre->save();

        $genre = new \App\Genre([
        	'genre' => 'Computing'
        ]);
        $genre->save();

        $genre = new \App\Genre([
        	'genre' => 'Genealogy'
        ]);
        $genre->save();

        $genre = new \App\Genre([
        	'genre' => 'Romance'
        ]);
        $genre->save();

        $genre = new \App\Genre([
        	'genre' => 'Humour'
        ]);
        $genre->save();

        $genre = new \App\Genre([
        	'genre' => 'Military'
        ]);
        $genre->save();

        $genre = new \App\Genre([
        	'genre' => 'Action'
        ]);
        $genre->save();

        $genre = new \App\Genre([
        	'genre' => 'Thriller'
        ]);
        $genre->save();
    }
}
