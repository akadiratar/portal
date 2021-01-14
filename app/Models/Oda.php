<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oda extends Model
{
    //TANIMLAMALAR
    use SoftDeletes;
    protected $table = 'yapi_odalar';
    protected $guarded = [];


    //İLİŞKİLER
    public function kat()
    {
        return $this->belongsTo('App\Models\Kat', 'kat_id', 'id');
    }

    public function tip()
    {
        return $this->belongsTo('App\Models\OdaTipi', 'oda_tipi_id', 'id');
    }

    public function birim()
    {
        return $this->belongsTo('App\Models\Birim', 'birim_id', 'id');
    }

    public function donanimlar()
    {
        return $this->hasMany('App\Models\Donanim', 'oda_id', 'id');
    }




    //FONKSİYONLAR




}
