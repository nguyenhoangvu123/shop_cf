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
        Schema::create('config_layouts', function (Blueprint $table) {
            $table->id();
            $table->string("config_name")->unique();
            $table->string("config_slug");
            $table->string("config_type_show")->nullable();
            $table->string("config_type_slide")->nullable();
            $table->text("config_image")->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->boolean('config_status');
            $table->integer('config_postion')->default(0)->nullable();
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
        Schema::dropIfExists('config_layouts');
    }
};
