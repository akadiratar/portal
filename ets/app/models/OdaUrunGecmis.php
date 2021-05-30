<?php

class OdaUrunGecmis extends Eloquent
{
    
    protected $table = "oda_urun_gecmis";

    public function urun(){
        return $this->hasOne("Urun","id","urun_id"); 
    }

}
