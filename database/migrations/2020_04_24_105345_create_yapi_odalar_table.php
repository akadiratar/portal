<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYapiOdalarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yapi_odalar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('oda_numarasi', 100);
            $table->string('oda_kodu', 100);
            $table->unsignedInteger('kat_id');
            $table->unsignedInteger('birim_id')->nullable();
            $table->unsignedInteger('oda_tipi_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(array('oda_numarasi', 'kat_id'));
            $table->foreign('kat_id')->references('id')->on('yapi_katlar');
            $table->foreign('birim_id')->references('id')->on('yapi_birimler');
            $table->foreign('oda_tipi_id')->references('id')->on('yapi_oda_tipleri');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yapi_odalar');
    }
}
