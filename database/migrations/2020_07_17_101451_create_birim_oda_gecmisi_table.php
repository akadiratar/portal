<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirimOdaGecmisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yapi_oda_birim_gecmisi', function (Blueprint $table) {
            $table->id();
            $table->string('birim_adi');
            $table->string('ust_birim_adi');
            $table->unsignedInteger('oda_id');
            $table->string('oda_tipi_adi');
            $table->timestamps();

            $table->foreign('oda_id')->references('id')->on('yapi_odalar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('birim_oda_gecmisi');
    }
}
