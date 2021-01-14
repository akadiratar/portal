<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTysOdaNumaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tys_oda_numara_gecmis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('numara_id');
            $table->foreign('numara_id')->references('id')->on('tys_numaralar');
            $table->unsignedInteger('oda_id');
            $table->foreign('oda_id')->references('id')->on('yapi_odalar');
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
        Schema::dropIfExists('tys_oda_numara');
    }
}
