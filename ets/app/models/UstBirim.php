<?php

class UstBirim extends Eloquent
{
    
    protected $table = "ust_birim";

    public function birimtip(){
        return $this->hasOne("BirimTip","id","tip_id"); 
    }

}
