<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->float('rating')->nullable();
            $table->boolean('viewed')->nullable();
            $table->foreignId('genre_id')->unsigned()->nullable();
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreignId('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categorys');
            $table->binary('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
