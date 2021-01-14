<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DtsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function anasayfa(){
    	//buradaki versiyon daha sonra kullanıcının hızlı panelden seçeceği ve veritabanına kaydedilecek şekilde değişecek ve auth->dts_versiyon şeklinde kontrol edilecek masterda
    	$versiyon = 'dts-v1';
        return view('dts.master', compact('versiyon'));
    }
}
