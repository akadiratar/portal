<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYapiKatlarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yapi_katlar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kat_adi', 100);
            $table->unsignedInteger('blok_id');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(array('kat_adi', 'blok_id'));
            $table->foreign('blok_id')->references('id')->on('yapi_bloklar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yapi_katlar');
    }
}
