<?php

class SmUrun extends Eloquent
{
    
    protected $table = "sm_urun";

    public function smalttur(){
        return $this->hasOne("SmAlttur","id","sm_alttur_id"); 
    }

    public function urunbirim(){
        return $this->hasOne("Birim","id","sm_birim_id"); 
    }

}
