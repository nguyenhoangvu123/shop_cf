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
        Schema::create('attr_master', function (Blueprint $table) {
            $table->id();
            $table->string("attr_master_name");
            $table->string("attr_master_value")->default(0)->nullable();
            $table->boolean("type")->nullable();
            $table->string("value")->nullable();
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
        Schema::dropIfExists('attr_master');
    }
};
