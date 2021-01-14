<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GirisController extends Controller
{
    public function giris(){
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('portal.giris');
        }
    }

    public function giris_post()
    {
    	request()->validate([
			'kullanici_sicili' => 'required',
			'password' => 'required'],[
			'kullanici_sicili.required' => 'Lütfen sicilinizi yazın.',
    		'password.required' => 'Lütfen parolanızı girin.'
    	]);

        $credentials = request()->only('kullanici_sicili', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('/');
        }
        else {
            return redirect()->route('giris')->with('danger', 'Sicil veya parola hatalı.');
        } 
    }
}
