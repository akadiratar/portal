<?php

class Birim extends Eloquent
{
    
    protected $table = "birim";

    public function ustbirim(){
        return $this->hasOne("UstBirim","id","ust_birim_id"); 
    }

}
