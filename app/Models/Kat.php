<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Oda;

class Kat extends Model
{
	//TANIMLAMALAR
	use SoftDeletes;
    protected $table = 'yapi_katlar';
    protected $guarded = [];

    //İLİŞKİLER
    public function blok()
    {
        return $this->belongsTo('App\Models\Blok', 'blok_id', 'id');
    }

    public function odalar()
    {
        return $this->hasMany('App\Models\Oda', 'kat_id', 'id');
    }


    //FONKSİYONLAR

    //Silinecek kat için tanımlı oda var mı yok mu diye kontrol ediyor
    public function odaKontrol()
    {
      $odalar = Oda::where('kat_id', $this->id)->get();
      if (count($odalar)>0) {
        return true;
      } else {
        return false;
      }
    }

    //Katları sıralama fonksiyonu
    public static function katSiralamaFonksiyonu()
    {
        $katSiralamaFonksiyonu = "CASE WHEN kat_adi = '5' THEN 1 ";
        $katSiralamaFonksiyonu .= "WHEN kat_adi = '4' THEN 2 ";
        $katSiralamaFonksiyonu .= "WHEN kat_adi = '3' THEN 3 ";
        $katSiralamaFonksiyonu .= "WHEN kat_adi = '2' THEN 4 ";
        $katSiralamaFonksiyonu .= "WHEN kat_adi = '1' THEN 5 ";
        $katSiralamaFonksiyonu .= "WHEN kat_adi = 'A' THEN 5 ";
        $katSiralamaFonksiyonu .= "WHEN kat_adi = 'Z' THEN 6 ";
        $katSiralamaFonksiyonu .= "WHEN kat_adi = '1B' THEN 7 ";
        $katSiralamaFonksiyonu .= "WHEN kat_adi = '2BA' THEN 8 ";
        $katSiralamaFonksiyonu .= "WHEN kat_adi = '2B' THEN 9 ";
        $katSiralamaFonksiyonu .= "WHEN kat_adi = '3BA' THEN 10 ";
        $katSiralamaFonksiyonu .= "WHEN kat_adi = '3B' THEN 11 ";
        $katSiralamaFonksiyonu .= "WHEN kat_adi = '4BA' THEN 12 ";
        $katSiralamaFonksiyonu .= "WHEN kat_adi = '4B' THEN 13 ";
        $katSiralamaFonksiyonu .= "WHEN kat_adi = '5B' THEN 14 ";
        $katSiralamaFonksiyonu .= "ELSE 15 END";
        return $katSiralamaFonksiyonu;
    }
}
