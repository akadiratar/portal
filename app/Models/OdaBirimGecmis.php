<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OdaBirimGecmis extends Model
{
    protected $table = 'yapi_oda_birim_gecmisi';

    public function oda()
    {
        return $this->belongsTo('App\Models\Oda', 'oda_id', 'id');
    }
}
