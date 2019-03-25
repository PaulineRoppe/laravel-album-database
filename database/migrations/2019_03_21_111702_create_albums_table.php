<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('albums', function (Blueprint $table) {
      $table->increments('id');
      $table->string('albumCover');
      $table->string('artistName');
      $table->string('albumName');
      $table->string('genre');
      $table->year('productionYear');
      $table->string('label');
      $table->string('songsList');
      $table->tinyInteger('note');
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
        Schema::dropIfExists('albums');
    }
}
