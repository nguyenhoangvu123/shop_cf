<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_post', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_phone');
            $table->string('user_email');
            $table->text('user_comment');
            $table->unsignedBigInteger('id_post');
            $table->foreign('id_post')->references('id')->on('posts')->onDelete('cascade');
            $table->unsignedBigInteger('parent_id')->nullable();
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
        Schema::dropIfExists('comment_post');
    }
};
