<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonanimModellerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donanim_modeller', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_adi', 100);
            $table->string('ornek_seri_no');
            $table->unsignedInteger('tur_id');
            $table->unsignedInteger('marka_id');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(array('model_adi', 'tur_id', 'marka_id'));
            $table->foreign('tur_id')->references('id')->on('donanim_turler');
            $table->foreign('marka_id')->references('id')->on('donanim_markalar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donanim_modeller');
    }
}
