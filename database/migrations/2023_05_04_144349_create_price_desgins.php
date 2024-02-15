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
        Schema::create('price_desgins', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("price");
            $table->unsignedBigInteger('id_desgin');
            $table->foreign('id_desgin')->references('id')->on('style_design')->onDelete('cascade');
            $table->unsignedBigInteger('id_contruction');
            $table->foreign('id_contruction')->references('id')->on('type_contruction')->onDelete('cascade');
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
        Schema::dropIfExists('price_desgins');
    }
};
