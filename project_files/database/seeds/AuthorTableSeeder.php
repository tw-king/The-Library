<?php

use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = new \App\Author([
        	'surname' => 'Child',
        	'firstnames' => 'Lee'
        ]);
        $author->save();

        $author = new \App\Author([
        	'surname' => 'Ryan',
        	'firstnames' => 'Chris'
        ]);
        $author->save();

        $author = new \App\Author([
        	'surname' => 'Steel',
        	'firstnames' => 'Danielle'
        ]);
        $author->save();

        $author = new \App\Author([
        	'surname' => 'Lutz',
        	'firstnames' => 'Mark'
        ]);
        $author->save();

        $author = new \App\Author([
        	'surname' => 'Matthews',
        	'firstnames' => 'Carole'
        ]);
        $author->save();

        $author = new \App\Author([
        	'surname' => 'Sharpe',
        	'firstnames' => 'Tom'
        ]);
        $author->save();

        $author = new \App\Author([
        	'surname' => 'Barratt',
        	'firstnames' => 'Nick'
        ]);
        $author->save();

    }
}
