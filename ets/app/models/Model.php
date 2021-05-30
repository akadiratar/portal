<?php

class Model extends Eloquent
{
    
    protected $table = "model";

	public function marka(){
        return $this->hasOne("Marka","id","marka_id"); 
    }

    public function tur(){
        return $this->hasOne("Tur","id","tur_id"); 
    }

}
