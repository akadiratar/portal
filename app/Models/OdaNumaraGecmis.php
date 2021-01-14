<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OdaNumaraGecmis extends Model
{
    protected $table = 'tys_oda_numara_gecmis';

    public function oda()
    {
        return $this->belongsTo('App\Models\Oda', 'oda_id', 'id');
    }

    public function numara()
    {
        return $this->belongsTo('App\Models\TysNumaralar', 'numara_id', 'id')->withTrashed();
    }
}
