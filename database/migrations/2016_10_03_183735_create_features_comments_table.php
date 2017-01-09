<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('features_id')->unsigned();
            $table->foreign('features_id')->references('id')->on('features')->onDelete('cascade');
            $table->string('category')->default('feature');
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
        Schema::dropIfExists('features_comments');
    }
}
