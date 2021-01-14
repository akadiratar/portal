<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marka extends Model
{
    protected $table = 'donanim_markalar';

    public function modeller()
    {
        return $this->hasMany('App\Models\Model', 'marka_id', 'id');
    }
}
