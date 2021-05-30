<?php

class UrunAriza extends Eloquent
{
    
    protected $table = "urun_ariza";

    public function urun(){
        return $this->hasOne("Urun","id","urun_id"); 
    }

}
