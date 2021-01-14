<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Illuminate\Support\Facades\Hash;

class PortalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cikis(){
        Auth::logout();
        return redirect()->route('giris')->with('success', 'Çıkış yapıldı.');
    }

    public function anasayfa(){
        if (auth()->user()->hasRole('administrator') || auth()->user()->hasAnyPermission(['ets.goster', 'riy.goster', 'buro.goster', 'segbis.goster', 'bys.goster', 'tys.goster'])) {
            return view('portal.branch');
        } else {
            return redirect()->route('dts');
        }
        // $permission = Permission::create(['name' => 'tys.oda_numara_eslestirme', 'display_name' => 'Oda/Numara Eşleştirme İşlemleri', 'description' => 'Telefon Yönetim Sisteminde kayıtlı olan numara ve odaları eşleştirme veya eşleştirmeleri kaldırma işlemlerinin yapılabilmesi için gereken izin.']);
        // $user = User::findOrFail(4);
        // $user->assignRole('telefon-yonetim-sistemi-temel-islemler');
    }

    public function parola_degistir(){
        return view('portal.parola_degistir');
    }

    public function parola_degistir_post(Request $request)
    {
        $eskisifre = $request['eskisifre'];
        $yenisifre = $request['yenisifre'];
        $yenisifretekrar = $request['yenisifretekrar'];

        $durum = Auth::attempt(
            
        array(
            "id" => Auth::User()->id,
            "password" => $eskisifre 
            )
        );

        if ($durum)
        {   
            if ($yenisifre == $yenisifretekrar) {

                if ($yenisifre === null) {
                    return redirect()->route("parola_degistir")->with("danger", "Parola boş geçilemez.");
                }else{
                    $kullanici = User::find(Auth::User()->id);
                    $kullanici->password = Hash::make($yenisifre);
                    $kullanici->save();
                    return redirect()->route("parola_degistir")->with("success", "Parola güncellendi.");
                }
            }else{
                return redirect()->route("parola_degistir")->with("danger", "Parolalar uyuşmuyor.");
            }
        }
        else{
            return redirect()->route("parola_degistir")->with("danger", "Eski parola yanlış.");
        }
    }
}

