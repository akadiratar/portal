<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function anasayfa(){
        return view('ets.master');
    }


   

}
