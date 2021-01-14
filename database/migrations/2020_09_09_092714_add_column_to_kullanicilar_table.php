<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToKullanicilarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kullanicilar', function (Blueprint $table) {
            $table->char('kullanici_tc_kimlik_no', 11)->nullable();
            $table->string('kullanici_fotograf')->nullable();
            $table->char('kullanici_cep_telefonu', 11)->nullable();
            $table->string('kullanici_email', 100)->nullable();
            $table->boolean('kullanici_kadro')->nullable();
            $table->boolean('kullanici_durumu')->default(0);
            $table->text('kullanici_aciklama')->nullable();
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
