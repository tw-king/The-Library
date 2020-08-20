<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_genre', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('book_id');
            $table->integer('genre_id');
        });

        DB::statement('GRANT INSERT, SELECT, UPDATE, DELETE ON TABLE examples.book_genre TO poppy;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_genre');
    }
}
