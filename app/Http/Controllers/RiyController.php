<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\RolRequest;
use App\Models\Unvan;
use App\Http\Requests\UnvanRequest;
use App\Http\Requests\KullaniciRequest;
use App\Models\Birim;
use App\User;
use Illuminate\Support\Facades\Hash;

class RiyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function anasayfa(){
        return view('riy.anasayfa');
    }

    public function roller(){
        $roller = Role::orderBy('name', 'ASC')->get();
        return view('riy.roller', compact('roller'));
    }

    public function rol_olustur(){
        $rol = new Role(); //Rol ekle ve güncellenin tek form olması için gerekli
        return view('riy.rol_olustur', compact('rol'));
    }

    public function rol_olustur_post(RolRequest $request){
        $role = Role::create(['name' => $request->name, 'description' => $request->description]);
        return redirect()->route('riy_roller')->with('success', $role->name.' isimli rol eklendi.');
    }

    public function rol_duzenle(Role $rol){
        if ($rol->name <> "administrator") {
            return view('riy.rol_duzenle', compact('rol'));
        } else {
            return redirect()->route('riy_roller')->with('danger', 'Seçilen rol düzenlenemez.');
        }
    }

    public function rol_duzenle_post(RolRequest $request){
        $rol = Role::findOrFail($request->rol);
        $rol->update(['name' => $request->name, 'description' => $request->description]);
        return redirect()->route('riy_roller')->with('success', 'Rol güncellendi.');
    }

    public function rol_sil(Role $rol){
        if ($rol->name <> "administrator") {
            $rol->delete();
            return redirect()->route('riy_roller')->with('success', 'Rol silindi.');
        } else {
            return redirect()->route('riy_roller')->with('danger', 'Seçilen rol silinemez.');
        }
    }

    public function rol_izin_ekle(Role $rol){
            $ets_permissions = Permission::where('name', 'like', 'ets.%')->where('name', '<>', 'ets.goster')->get();
            $riy_permissions = Permission::where('name', 'like', 'riy.%')->where('name', '<>', 'riy.goster')->get();
            $segbis_permissions = Permission::where('name', 'like', 'segbis.%')->where('name', '<>', 'segbis.goster')->get();
            $buro_permissions = Permission::where('name', 'like', 'buro.%')->where('name', '<>', 'buro.goster')->get();
            $bys_permissions = Permission::where('name', 'like', 'bys.%')->where('name', '<>', 'bys.goster')->get();
            $tys_permissions = Permission::where('name', 'like', 'tys.%')->where('name', '<>', 'tys.goster')->get();
            return view('riy.rol_izin_ekle', compact('rol', 'ets_permissions', 'riy_permissions', 'segbis_permissions', 'buro_permissions', 'bys_permissions', 'tys_permissions'));
    }

    public function rol_izin_ekle_post(Role $rol){
        $rol->revokePermissionTo(Permission::all());
        $permissions = request('permission');
        if(!empty($permissions) && !is_null($permissions)){
            foreach ($permissions as $perm) {
                $permission = Permission::findOrFail($perm);
                if(!$rol->hasPermissionTo($permission->name)){
                    $rol->givePermissionTo($permission);
                }
            }
        }
        return redirect()->route('riy_roller')->with('success', $rol->name.' isimli role seçilen izinler tanımlandı.');
    }

    public function izinler(){
        $ets_permissions = Permission::where('name', 'like', 'ets.%')->get();
        $riy_permissions = Permission::where('name', 'like', 'riy.%')->get();
        $segbis_permissions = Permission::where('name', 'like', 'segbis.%')->get();
        $buro_permissions = Permission::where('name', 'like', 'buro.%')->get();
        $bys_permissions = Permission::where('name', 'like', 'bys.%')->get();
        $tys_permissions = Permission::where('name', 'like', 'tys.%')->get();
        return view('riy.izinler', compact('ets_permissions', 'riy_permissions', 'segbis_permissions', 'buro_permissions', 'bys_permissions', 'tys_permissions'));
    }

    public function unvanlar(){
        $unvanlar = Unvan::orderBy('unvan_adi', 'ASC')->get();
        return view('riy.k_unvanlar', compact('unvanlar'));
    }

    public function unvan_sil(Unvan $unvan){
        if ($unvan->kisiKontrol()) {
            return redirect()->route('riy_unvanlar')->with('danger', 'Silmek istediğiniz ünvana tanımlı kişi bulunduğu için silinemedi.');
        } else {
            $unvan->delete();
            return redirect()->route('riy_unvanlar')->with('success', 'Ünvan silindi.');
        }
    }

    public function unvan_ekle(){
        $unvan = new Unvan();
        return view('riy.k_unvan_ekle', compact('unvan'));
    }

    public function unvan_ekle_post(UnvanRequest $request){
        $unvan = Unvan::create(['unvan_adi' => Birim::buyukHarfeCevir($request->unvan_adi)]);
        return redirect()->route('riy_unvanlar')->with('success', 'Ünvan eklendi.');
    }

    public function unvan_duzenle(Unvan $unvan){
        return view('riy.k_unvan_duzenle', compact('unvan'));
    }

    public function unvan_duzenle_post(UnvanRequest $request){
        $unvan = Unvan::findOrFail($request->unvan);
        $unvan->update(['unvan_adi' => Birim::buyukHarfeCevir($request->unvan_adi)]);
        return redirect()->route('riy_unvanlar')->with('success', 'Ünvan güncellendi.');
    }


    public function kullanici_ekle(){
        $kullanici = new User();
        $unvanlar = Unvan::orderBy('unvan_adi', 'ASC')->get();
        return view('riy.kullanici_ekle', compact('kullanici', 'unvanlar'));
    }


    public function kullanici_ekle_post(KullaniciRequest $request){
        $kullanici = User::create([
            'kullanici_adi' => Birim::buyukHarfeCevir($request->kullanici_adi),
            'kullanici_soyadi' => Birim::buyukHarfeCevir($request->kullanici_soyadi),
            'kullanici_sicili' => Birim::buyukHarfeCevir($request->kullanici_sicili),
            'unvan_id' => Birim::buyukHarfeCevir($request->unvan_id),
            'password' => Hash::make("adalet")
            ]);
        return redirect()->route('riy_kullanici_ekle')->with('success', $kullanici->kullanici_adi.' '.$kullanici->kullanici_soyadi.' isimli kullanıcı eklendi.');
    }

    public function kullanici_ara(){
        return view('riy.kullanici_ara');
    }
    

    public function kullanici_ara_post(Request $request){

        request()->validate([
            'search' => 'required|min:3'],[
            'search.required' => 'En az 3 karakter girilmelidir.',
            'search.min' => 'En az 3 karakter girilmelidir.'
        ]);

        $kullanicilar = User::kullanici_ara($request);
        if(count($kullanicilar)==0) {
            return redirect()->route('riy_kullanici_ara')->with('danger', $request->search.' ile ilgili kullanıcı bulunamadı.');
        } else {
            return view('riy.kullanici_sonuc', compact('kullanicilar'));
        }
    }

    public function kullanici_detay(User $kullanici){
        return view('riy.kullanici_detay', compact('kullanici'));
    }

    public function kullanicilar(){
        $kullanicilar = User::orderBy('kullanici_adi', 'ASC')->orderBy('kullanici_soyadi', 'ASC')->paginate(100);
        return view('riy.kullanicilar', compact('kullanicilar'));
    }

    public function rol_tanimla(User $kullanici){
        return view('riy.rol_tanimla', compact('kullanici'));
    }

    public function direkt_izin_tanimla(User $kullanici){
        return view('riy.direkt_izin_tanimla', compact('kullanici'));
    }

    public function rol_kullanicilar(Role $rol){
        $kullanicilar = User::role($rol)->get();
        return view('riy.rol_kullanicilar', compact('kullanicilar', 'rol'));
    }

    public function izin_kullanicilar(Permission $izin){
        $kullanicilar = User::permission($izin)->get();
        return view('riy.izin_kullanicilar', compact('kullanicilar', 'izin'));
    }

    public function kullanici_sil(User $kullanici){
        if ($kullanici->hasRole('administrator')) {
            return redirect()->route('riy_kullanici_detay', $kullanici->id)->with('danger', 'Kullanıcının administrator rolü olduğu için silinemiyor.');
        } else {
            $kullanici->delete();
            return redirect()->route('riy_kullanicilar')->with('success', 'Kullanıcı Silindi.');
        }
    }

    public function kullanici_duzenle(User $kullanici){
        $unvanlar = Unvan::orderBy('unvan_adi', 'ASC')->get();
        return view('riy.kullanici_duzenle', compact('kullanici', 'unvanlar'));
    }


    public function kullanici_duzenle_post(KullaniciRequest $request){
        $kullanici = User::findOrFail($request->kullanici);
        $kullanici->update([
            'kullanici_adi' => Birim::buyukHarfeCevir($request->kullanici_adi),
            'kullanici_soyadi' => Birim::buyukHarfeCevir($request->kullanici_soyadi),
            'kullanici_sicili' => Birim::buyukHarfeCevir($request->kullanici_sicili),
            'unvan_id' => Birim::buyukHarfeCevir($request->unvan_id)
        ]);
        return redirect()->route('riy_kullanici_detay', $kullanici->id)->with('success', $kullanici->kullanici_adi.' '.$kullanici->kullanici_soyadi.' isimli kullanıcı güncellendi.');
    }

    public function kullanici_birim_degistir(User $kullanici){
        $birimler = Birim::birimlerUstbirimGetir(Birim::where('ust_birim_id', 0)->get());
        return view('riy.kullanici_birim_degistir', compact('kullanici', 'birimler'));
    }


    // public function kullanici_birim_degistir_post(Request $request){
    //     $kullanici = User::findOrFail($request->kullanici);
    //     $kullanici->update([
    //         'kullanici_adi' => Birim::buyukHarfeCevir($request->kullanici_adi),
    //         'kullanici_soyadi' => Birim::buyukHarfeCevir($request->kullanici_soyadi),
    //         'kullanici_sicili' => Birim::buyukHarfeCevir($request->kullanici_sicili),
    //         'unvan_id' => Birim::buyukHarfeCevir($request->unvan_id)
    //     ]);
    //     return redirect()->route('riy_kullanici_detay', $kullanici->id)->with('success', $kullanici->kullanici_adi.' '.$kullanici->kullanici_soyadi.' isimli kullanıcı güncellendi.');
    // }
}