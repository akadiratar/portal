<?php

class Tur extends Eloquent
{
    
    protected $table = "tur";

    static public function modelGetir($id=NULL){ return Model::where("tur_id",$id)->get();}

}
