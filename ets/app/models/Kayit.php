<?php

class Kayit extends Eloquent
{
    
    protected $table = "kayit";

    public function oda(){
        return $this->hasOne("Oda","id","oda_id"); 
    }

}
