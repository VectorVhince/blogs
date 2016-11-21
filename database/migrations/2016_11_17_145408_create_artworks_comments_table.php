<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtworksCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artworks_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('artworks_id')->unsigned();
            $table->foreign('artworks_id')->references('id')->on('artworks')->onDelete('cascade');
            $table->string('comment_name')->nullable();
            $table->string('comment_email')->nullable();
            $table->string('comment_dept')->nullable();
            $table->string('comment_message')->nullable();
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
        Schema::dropIfExists('artworks_comments');
    }
}