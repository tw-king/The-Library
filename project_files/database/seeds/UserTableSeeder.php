<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User([
        	'name' => 'The Librarian (Master)',
        	'email' => 'me@tonyking.me',
        	'password' => '$2y$10$cZrA2KtTPoFrctlzRvp1U.7IL5d4dLVqAr2EYmus1mZC75VjdrCAO',
        	'is_admin' => 1,
        	'is_librarian' => 1
        ]);
        $user->save();

        // Dummy accounts for testing only - DELETE
        $user = new \App\User([
        	'name' => 'Tony',
        	'email' => 'tking@gmx.co.uk',
        	'password' => '$2y$10$Ds29gWla0iWXjtnSWzINAeWFb9rWlmFSvnb/heVQE6U4SqoESxQRK',
        	'is_admin' => 0,
        	'is_librarian' => 0
        ]);
        $user->save();

        $user = new \App\User([
        	'name' => 'Debbie',
        	'email' => 'debsmeader@gmx.co.uk',
        	'password' => '$2y$10$Ds29gWla0iWXjtnSWzINAeWFb9rWlmFSvnb/heVQE6U4SqoESxQRK',
        	'is_admin' => 0,
        	'is_librarian' => 1
        ]);
        $user->save();
    }
}
