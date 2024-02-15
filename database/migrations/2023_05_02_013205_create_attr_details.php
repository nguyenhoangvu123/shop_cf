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
        Schema::create('attr_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_attr_master');
            $table->foreign('id_attr_master')->references('id')->on('attr_master')->onDelete('cascade');
            $table->boolean("type")->nullable();
            $table->string("value_percent")->nullable();
            $table->string("value_expense")->nullable();
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
        Schema::dropIfExists('attr_details');
    }
};
