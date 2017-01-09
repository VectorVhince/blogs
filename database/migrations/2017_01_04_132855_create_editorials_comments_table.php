<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditorialsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editorials_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('editorials_id')->unsigned();
            $table->foreign('editorials_id')->references('id')->on('editorials')->onDelete('cascade');
            $table->string('category')->default('editorial');
            $table->string('comment_name')->nullable();
            $table->string('comment_email')->nullable();
            $table->string('comment_dept')->nullable();
            $table->string('comment_message')->nullable();
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
        Schema::dropIfExists('editorials_comments');
    }
}
