<?php

class SmTakip extends Eloquent
{
    protected $table = "sm_takip";

    public function smgelen(){
        return $this->hasOne("SmUrun","id","sm_gelen_id"); 
    }

    public function smgiden(){
        return $this->hasOne("SmUrun","id","sm_giden_id"); 
    }

    public function smtakipbirim(){
        return $this->hasOne("Birim","id","sm_birim_id"); 
    }
}
