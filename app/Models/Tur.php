<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tur extends Model
{
    protected $table = 'donanim_turler';

    public function modeller()
    {
        return $this->hasMany('App\Models\Model', 'tur_id', 'id');
    }
}
