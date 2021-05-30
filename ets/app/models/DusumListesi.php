<?php

class DusumListesi extends Eloquent
{
    
    protected $table = "dusum_listesi";

    public function urun(){
        return $this->hasOne("Urun","id","urun_id"); 
    }

}
