<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTysNumaralarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tys_numaralar', function (Blueprint $table) {
            $table->id();
            $table->string('no')->unique();
            $table->unsignedInteger('oda_id')->nullable();
            $table->string('tip')->nullable();
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
        Schema::dropIfExists('tys_numaralar');
    }
}
