<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->text('synopsis')->nullable($value = true);
            $table->string('isbn')->nullable($value = true);
            $table->integer('author_id');
            $table->integer('pubyear');
            $table->integer('loaned_to_user_id')->default(-1);
            $table->date('loaned_until')->nullable($value = true);
        });

        DB::statement('GRANT INSERT, SELECT, UPDATE, DELETE ON TABLE examples.books TO poppy;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
