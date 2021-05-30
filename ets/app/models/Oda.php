<?php

class Oda extends Eloquent
{
    
    protected $table = "oda";

    public function birim(){
        return $this->hasOne("Birim","id","birim_id"); 
    }

}
