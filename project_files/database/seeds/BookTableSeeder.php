<?php

use Illuminate\Database\Seeder;
use App\Genre;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Also fills pivot table.
     *
     * @return void
     */
    public function run()
    {
        $synopsis = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel purus ac elit rutrum sollicitudin ut in ante. Integer aliquet neque ornare, placerat erat condimentum, elementum libero. Fusce vitae posuere eros. In et felis mi. Ut in elementum tellus, ac lobortis velit. Aenean eget sapien facilisis, congue magna in, rhoncus.';

        $book = new \App\Book([
        	'title' => 'Gone Tomorrow',
        	'author_id' => '1',
        	'isbn' => '9780553824698',
        	'pubyear' => '2009',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,9]);

        $book = new \App\Book([
        	'title' => '61 Hours',
        	'author_id' => '1',
        	'isbn' => '9780553825565',
        	'pubyear' => '2010',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,9]);

        $book = new \App\Book([
        	'title' => 'Nothing to lose',
        	'author_id' => '1',
        	'isbn' => '9780553824414',
        	'pubyear' => '2008',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,9]);

        $book = new \App\Book([
        	'title' => 'Tripwire',
        	'author_id' => '1',
        	'isbn' => '9781408488003',
        	'pubyear' => '1999',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,9]);

        $book = new \App\Book([
        	'title' => 'Echo burning',
        	'author_id' => '1',
        	'isbn' => '9780857500083',
        	'pubyear' => '2001',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,9]);

        $book = new \App\Book([
        	'title' => 'Killing floor',
        	'author_id' => '1',
        	'isbn' => '9780553826166',
        	'pubyear' => '1998',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,9]);

        $book = new \App\Book([
        	'title' => 'Bad luck and trouble',
        	'author_id' => '1',
        	'isbn' => '9780857500144',
        	'pubyear' => '2007',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,9]);

        $book = new \App\Book([
        	'title' => 'The Kremlin device',
        	'author_id' => '2',
        	'isbn' => '0753159503',
        	'pubyear' => '1999',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,7,8]);

        $book = new \App\Book([
        	'title' => 'Blackout',
        	'author_id' => '2',
        	'isbn' => '0099465787',
        	'pubyear' => '2005',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,7,8]);

        $book = new \App\Book([
        	'title' => 'The Hit list',
        	'author_id' => '2',
        	'isbn' => '0712684115',
        	'pubyear' => '2000',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,7,8]);

        $book = new \App\Book([
        	'title' => 'Greed',
        	'author_id' => '2',
        	'isbn' => '0099432226',
        	'pubyear' => '2003',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,7,8]);

        $book = new \App\Book([
        	'title' => 'Zero option',
        	'author_id' => '2',
        	'isbn' => '0099460130',
        	'pubyear' => '1997',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,7,8]);

        $book = new \App\Book([
        	'title' => 'Zero option',
        	'author_id' => '2',
        	'isbn' => '0099460130',
        	'pubyear' => '1997',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,7,8]);

        $book = new \App\Book([
        	'title' => 'Amazing grace',
        	'author_id' => '3',
        	'isbn' => '9781405619288',
        	'pubyear' => '2007',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,5]);

        $book = new \App\Book([
        	'title' => 'Echoes',
        	'author_id' => '3',
        	'isbn' => '9780593050200',
        	'pubyear' => '2005',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,5]);

        $book = new \App\Book([
        	'title' => 'Bittersweet',
        	'author_id' => '3',
        	'isbn' => '0593040708',
        	'pubyear' => '2000',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,5]);

        $book = new \App\Book([
        	'title' => 'Power play',
        	'author_id' => '3',
        	'isbn' => '9780552165860',
        	'pubyear' => '2015',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,5]);

        $book = new \App\Book([
        	'title' => 'Against all odds',
        	'author_id' => '3',
        	'isbn' => '9781101883914',
        	'pubyear' => '2017',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,5]);

        $book = new \App\Book([
        	'title' => 'Learning python',
        	'author_id' => '4',
        	'isbn' => '9781449355739',
        	'pubyear' => '2013',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([2,3]);

        $book = new \App\Book([
        	'title' => 'Programming python',
        	'author_id' => '4',
        	'isbn' => '9780596158101',
        	'pubyear' => '2011',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([2,3]);

        $book = new \App\Book([
        	'title' => 'Fluent python',
        	'author_id' => '4',
        	'isbn' => '9781491946008',
        	'pubyear' => '2015',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([2,3]);

        $book = new \App\Book([
        	'title' => 'Python pocket reference',
        	'author_id' => '4',
        	'isbn' => '9780596158088',
        	'pubyear' => '2009',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([2,3]);

        $book = new \App\Book([
        	'title' => 'The Chocolate Lovers Club',
        	'author_id' => '5',
        	'isbn' => '9780755335824',
        	'pubyear' => '2007',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,5]);

        $book = new \App\Book([
        	'title' => 'The Chocolate Lovers Diet',
        	'author_id' => '5',
        	'isbn' => '9780755335879',
        	'pubyear' => '2007',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,5]);

        $book = new \App\Book([
        	'title' => 'The Chocolate Lovers Christmas',
        	'author_id' => '5',
        	'isbn' => '9780751552133',
        	'pubyear' => '2015',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,5]);

        $book = new \App\Book([
        	'title' => 'Wrapped Up In You',
        	'author_id' => '5',
        	'isbn' => '9780751545098',
        	'pubyear' => '2011',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,5]);

        $book = new \App\Book([
        	'title' => 'Wilt',
        	'author_id' => '6',
        	'isbn' => '9780330341479',
        	'pubyear' => '1976',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,6]);

        $book = new \App\Book([
        	'title' => 'Porterhouse Blue',
        	'author_id' => '6',
        	'isbn' => '9780099435464',
        	'pubyear' => '1974',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,6]);

        $book = new \App\Book([
        	'title' => 'Blott On the Landscape',
        	'author_id' => '6',
        	'isbn' => '9780099435471',
        	'pubyear' => '1975',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([1,6]);

        $book = new \App\Book([
        	'title' => 'The Family History Project',
        	'author_id' => '7',
        	'isbn' => '9781903365755',
        	'pubyear' => '2004',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([2,4]);

        $book = new \App\Book([
        	'title' => 'The Family Detective',
        	'author_id' => '7',
        	'isbn' => '9780091912208',
        	'pubyear' => '2006',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([2,4]);

        $book = new \App\Book([
        	'title' => 'Tracing the History of Your House',
        	'author_id' => '7',
        	'isbn' => '9781903365908',
        	'pubyear' => '2006',
            'synopsis' => $synopsis
        ]);
        $book->save();
        $book->genres()->attach([2,4]);
    }
}
