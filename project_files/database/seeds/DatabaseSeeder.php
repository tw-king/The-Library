<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(AuthorTableSeeder::class);
        $this->call(LanguageTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(BookTableSeeder::class);
    }
}
