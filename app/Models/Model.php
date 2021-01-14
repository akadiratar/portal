<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Model extends Model
{
    protected $table = 'donanim_modeller';

    public function tur()
    {
        return $this->belongsTo('App\Models\Tur', 'tur_id', 'id');
    }

    public function marka()
    {
        return $this->belongsTo('App\Models\Marka', 'marka_id', 'id');
    }

    public function donanimlar()
    {
        return $this->hasMany('App\Models\Donanim', 'model_id', 'id');
    }
}
