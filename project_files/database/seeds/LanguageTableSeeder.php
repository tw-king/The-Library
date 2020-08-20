<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = new \App\Language([
        	'language' => 'English'
        ]);
        $language->save();

        $language = new \App\Language([
        	'language' => 'French'
        ]);
        $language->save();

        $language = new \App\Language([
        	'language' => 'German'
        ]);
        $language->save();

        $language = new \App\Language([
        	'language' => 'Spanish'
        ]);
        $language->save();
    }
}
