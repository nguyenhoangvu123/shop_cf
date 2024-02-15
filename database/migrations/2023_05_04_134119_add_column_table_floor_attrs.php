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
        Schema::table('floor_attrs', function (Blueprint $table) {
            $table->dropColumn('floor_attr_type_apply');
            $table->dropColumn('floor_attr_acreage');
        });

        Schema::table('floor_attrs', function (Blueprint $table) {
            $table->string("value_desgin")->nullable()->after('id_floor_master');
            $table->string('value_expense')->nullable()->after('id_floor_master');
        });

        Schema::table('floors', function (Blueprint $table) {
            $table->boolean('floor_checked')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
