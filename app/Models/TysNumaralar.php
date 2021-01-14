<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TysNumaralar extends Model
{
	use SoftDeletes;
    protected $table = 'tys_numaralar';
    protected $guarded = [];

    public function oda()
    {
        return $this->belongsTo('App\Models\Oda', 'oda_id', 'id');
    }
}
