<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnInKullanicilar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kullanicilar', function (Blueprint $table) {
            $table->unsignedInteger('unvan_id')->nullable()->change();
            $table->unsignedInteger('birim_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kullanicilar', function (Blueprint $table) {
            //
        });
    }
}
