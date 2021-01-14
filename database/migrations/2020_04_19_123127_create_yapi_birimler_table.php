<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYapiBirimlerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yapi_birimler', function (Blueprint $table) {
            $table->increments('id');
            $table->string('birim_adi');
            $table->unsignedInteger('ust_birim_id');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(array('birim_adi', 'ust_birim_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yapi_birimler');
    }
}
