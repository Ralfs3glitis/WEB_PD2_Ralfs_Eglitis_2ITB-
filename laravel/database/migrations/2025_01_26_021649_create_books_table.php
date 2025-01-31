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
    public function up(): void
    {
     Schema::create('books', function (Blueprint $table) {
    $table->id();
    $table->foreignId('author_id');
    $table->string('name', 256);
    $table->foreignId('genre_id');
    $table->text('description')->nullable();
    $table->decimal('price', 8, 2)->nullable();
    $table->integer('year');
    $table->string('image', 256)->nullable();
    $table->boolean('display');
    $table->timestamps();
    $table->foreign('author_id')->references('id')->on('authors');
    $table->foreign('genre_id')->references('id')->on('genres');
     });
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
