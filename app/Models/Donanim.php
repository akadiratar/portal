<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donanim extends Model
{
    protected $table = 'donanimlar';

    public function model()
    {
        return $this->belongsTo('App\Models\Model', 'model_id', 'id');
    }

    public function oda()
    {
        return $this->belongsTo('App\Models\Oda', 'oda_id', 'id');
    }

    public function kullanici()
    {
        return $this->belongsTo('App\User', 'kullanici_id', 'id');
    }
}
