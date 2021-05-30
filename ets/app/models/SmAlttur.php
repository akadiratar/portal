<?php

class SmAlttur extends Eloquent
{
    
    protected $table = "sm_alttur";

	public function smtur(){
        return $this->hasOne("SmTur","id","sm_tur_id"); 
    }
}
