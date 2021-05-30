<?php

class Urun extends Eloquent
{
    
    protected $table = "urun";

    public function model(){
        return $this->hasOne("Model","id","model_id"); 
    }

    static public function urunSay($id=NULL){ return self::where("model_id",$id)->count();}

    static public function odaUrun($id=NULL){
        return OdaUrun::where("urun_id",$id)->first(); 
    }

}
