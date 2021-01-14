<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kullanicilar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kullanici_adi', 100);
            $table->string('kullanici_soyadi', 100);
            $table->string('kullanici_sicili', 50)->unique();
            $table->unsignedInteger('unvan_id');
            $table->unsignedInteger('birim_id');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('unvan_id')->references('id')->on('kullanici_unvanlar');
            $table->foreign('birim_id')->references('id')->on('yapi_birimler');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kullanicilar');
    }
}