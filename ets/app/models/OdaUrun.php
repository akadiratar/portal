<?php

class OdaUrun extends Eloquent
{
    
    protected $table = "oda_urun";

    public function oda(){
        return $this->hasOne("Oda","id","oda_id"); 
    }

    public function urun(){
        return $this->hasOne("Urun","id","urun_id"); 
    }

}
