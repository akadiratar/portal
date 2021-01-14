<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Unvan extends Model
{
	use SoftDeletes;
    protected $table = 'kullanici_unvanlar';
    protected $guarded = [];

    public function kullanicilar()
    {
        return $this->hasMany('App\User', 'unvan_id', 'id');
    }

    //FONKSİYONLAR

    //Silinecek ünvan için tanımlı kişi var mı yok mu diye kontrol ediyor
    public function kisiKontrol()
    {
      $kisiler = User::where('unvan_id', $this->id)->get();
      if (count($kisiler)>0) {
        return true;
      } else {
        return false;
      }
    }
}
