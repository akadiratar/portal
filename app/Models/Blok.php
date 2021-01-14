<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Kat;

class Blok extends Model
{
	//TANIMLAMALAR
    use SoftDeletes;
    protected $table = 'yapi_bloklar';
    protected $guarded = [];

    //İLİŞKİLER
    public function katlar()
    {
        return $this->hasMany('App\Models\Kat', 'blok_id', 'id');
    }


    //FONKSİYONLAR

    //Silinecek blok için tanımlı kat var mı yok mu diye kontrol ediyor
    public function katKontrol()
    {
      $katlar = Kat::where('blok_id', $this->id)->get();
      if (count($katlar)>0) {
        return true;
      } else {
        return false;
      }
    }

    //Envanter Takip Sisteminde bulunan sol taraftaki menü için bloklar
    public static function temel_bloklar()
    {
      return Blok::orderBy('blok_adi')->get();
    }
}
