<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonanimlarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donanimlar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seri_no');
            $table->integer('durumu');
            $table->unsignedInteger('model_id');
            $table->unsignedInteger('kullanici_id')->nullable();
            $table->unsignedInteger('oda_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(array('seri_no', 'model_id'));
            $table->foreign('model_id')->references('id')->on('donanim_modeller');
            $table->foreign('kullanici_id')->references('id')->on('kullanicilar');
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
        Schema::dropIfExists('donanimlar');
    }
}
