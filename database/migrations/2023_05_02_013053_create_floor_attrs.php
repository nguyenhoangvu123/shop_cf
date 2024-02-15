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
        Schema::create('floor_attrs', function (Blueprint $table) {
            $table->id();
            $table->string("floor_attr_name");
            $table->unsignedBigInteger('id_floor_master');
            $table->foreign('id_floor_master')->references('id')->on('floors')->onDelete('cascade');
            $table->string("floor_attr_acreage")->nullable();
            $table->boolean("floor_attr_type_apply")->nullable();
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
        Schema::dropIfExists('floor_attrs');
    }
};
