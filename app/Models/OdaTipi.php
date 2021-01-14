<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OdaTipi extends Model
{
	//TANIMLAMALAR
    use SoftDeletes;
    protected $guarded = [];
    protected $table = 'yapi_oda_tipleri';

    //İLİŞKİLER
    public function odalar()
    {
        return $this->hasMany('App\Models\Oda', 'oda_tipi_id', 'id');
    }


    //FONKSİYONLAR

    //Silinecek oda tipi için tanımlı oda var mı yok mu diye kontrol ediyor
    public function odaKontrol()
    {
      $odalar = Oda::where('oda_tipi_id', $this->id)->get();
      if (count($odalar)>0) {
        return true;
      } else {
        return false;
      }
    }

    //ID den oda tipi adını getirmek için kullanılıyor.
    public static function tip_adi_getir($id)
    {
        $oda_tipi = OdaTipi::findOrFail($id);
        return $oda_tipi->oda_tipi_adi;
    }
}
