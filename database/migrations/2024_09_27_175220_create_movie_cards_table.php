<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieCardsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('movie_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('release_date');
            $table->float('vote_average', 3, 1);
            $table->string('category'); // Add this line for category
            $table->string('video')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('movie_cards');
    }
}
