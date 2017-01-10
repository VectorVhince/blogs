<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('category')->default('news');
            $table->string('title')->unique();
            $table->longText('body');
            $table->string('image')->default('default.jpg');
            $table->string('user');
            $table->string('update');
            $table->string('featured')->default('0');
            $table->string('featured_date')->default('0');
            $table->integer('views')->default('0');
            $table->string('trend_date')->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
