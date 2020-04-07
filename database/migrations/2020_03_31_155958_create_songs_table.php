<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('song');
            $table->string('year_released');

            $table->string('uploaded_by');
            $table->string('music_label');
            $table->string('event');
            $table->string('name');
            $table->string('genre');
            $table->string('author');
            $table->mediumText('about');
            $table->mediumText('about_artist');
            $table->mediumText('cover_image');

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
        Schema::dropIfExists('songs');
    }
}