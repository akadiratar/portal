<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Birim;
use App\Http\Requests\BirimRequest;
use App\Models\Oda;
use App\Models\OdaTipi;
use App\Models\Kat;
use App\Models\Blok;
use App\Models\OdaBirimGecmis;
use App\Http\Requests\BlokRequest;
use App\Http\Requests\KatRequest;
use App\Http\Requests\OdaTipiRequest;
use App\Http\Requests\OdaRequest;
use App\Http\Requests\BirimOdaRequest;
use App\Http\Requests\BirimOdaGuncelleRequest;
use DB;
use App\Models\TysNumaralar;

class BysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function anasayfa(){
        $toplam_oda_sayisi = Oda::count();
        $dolu_oda_sayisi = Oda::where('birim_id', '<>', null)->count();
        $bos_oda_sayisi = Oda::where('birim_id', null)->count();
        if (!empty($dolu_oda_sayisi)) {
            $dolu_oda_orani = round($dolu_oda_sayisi*100/$toplam_oda_sayisi,2);
        } else {
            $dolu_oda_orani = "-";
        }

        if (!empty($bos_oda_sayisi)) {
            $bos_oda_orani = round($bos_oda_sayisi*100/$toplam_oda_sayisi,2);
        } else {
            $bos_oda_orani = "-";
        }

        $oda_tipleri = DB::table('yapi_odalar')->select('oda_tipi_id', DB::raw('count(*) as toplam'))->where('oda_tipi_id', '<>' , null)->groupBy('oda_tipi_id')->get();

        return view('bys.index', compact('toplam_oda_sayisi', 'dolu_oda_sayisi', 'bos_oda_sayisi', 'dolu_oda_orani', 'bos_oda_orani', 'oda_tipleri'));
    }


     //BİRİM İŞLEMLERİ
    public function birim_ekle(){
        $birimler = Birim::birimlerUstbirimGetir(Birim::all());
        $birim = new Birim(); //Birim ekle ve güncellenin tek form olması için gerekli
    	return view('bys.birim_ekle', compact('birimler', 'birim'));
    }

    public function birim_ekle_post(BirimRequest $request){
        $birim = Birim::create(['ust_birim_id' => $request->ust_birim_id, 'birim_adi' => Birim::buyukHarfeCevir($request->birim_adi)]);
        return redirect()->route('bys_birim_ekle')->with('success', $birim->birim_adi.' isimli birim eklendi.');
    }

    public function birimler(){
        $birimler = Birim::birimlerUstbirimGetir(Birim::all());
        return view('bys.birimler', compact('birimler'));
    }

    public function birim_yapisi(){
        $birimler = Birim::where('ust_birim_id', 0)->orderBy('birim_adi')->get();
        return view('bys.birim_yapisi', compact('birimler'));
    }

    public function birim_duzenle(Birim $birim){
        $birimler = Birim::secilebilirUstbirimler($birim);
        return view('bys.birim_duzenle', compact('birimler', 'birim'));
    }

    public function birim_duzenle_post(BirimRequest $request){
        $birim = Birim::findOrFail($request->birim);
        $birim->update(['ust_birim_id' => $request->ust_birim_id, 'birim_adi' => Birim::buyukHarfeCevir($request->birim_adi)]);
        return redirect()->route('bys_birimler')->with('success', 'Birim güncellendi.');
    }

    public function birim_sil(Birim $birim){
        if ($birim->altBirimKontrol()) {
            return redirect()->route('bys_birimler')->with('danger', 'Silmek istediğiniz birimin alt birimi olduğu için silinemedi.');
        } elseif ($birim->kullaniciKontrol()) {
            return redirect()->route('bys_birimler')->with('danger', 'Silmek istediğiniz birime tanımlı kullanıcı olduğu için silinemedi.');
        } elseif ($birim->odaKontrol()) {
            return redirect()->route('bys_birimler')->with('danger', 'Silmek istediğiniz birime tanımlı oda olduğu için silinemedi.');
        } else {
            $birim->delete();
            return redirect()->route('bys_birimler')->with('success', 'Birim silindi.');
        }
    }

    public function birim_detay(Birim $birim)
    {
        $secili_birim = Birim::birimUstbirimGetir($birim, 'bys_birim_detay');
        $alt_birimler = Birim::where('ust_birim_id', $birim->id)->orderBy('birim_adi', 'ASC')->get()->sortBy('birim_adi', SORT_NATURAL, false);
        $odalar = Oda::where('birim_id', $birim->id)->get();
        return view('bys.birim_detay', compact('secili_birim', 'alt_birimler', 'birim', 'odalar'));
    }

    public function birimler_silinenler (){
        $silinen_birimler = Birim::birimlerUstbirimGetir(Birim::onlyTrashed()->get());
        return view('bys.birimler_silinenler', compact('silinen_birimler'));
    }

    public function birim_kalici_sil(Request $request){
        $birim = Birim::onlyTrashed()->where('id', $request->birim)->first();
        if ($birim->altBirimKontrol()) {
            return redirect()->route('bys_birimler_silinenler')->with('danger', 'Silmek istediğiniz birimin alt birimi olduğu için silinemedi.');
        } elseif ($birim->kullaniciKontrol()) {
            return redirect()->route('bys_birimler_silinenler')->with('danger', 'Silmek istediğiniz birime tanımlı kullanıcı olduğu için silinemedi.');
        } elseif ($birim->odaKontrol()) {
            return redirect()->route('bys_birimler_silinenler')->with('danger', 'Silmek istediğiniz birime tanımlı oda olduğu için silinemedi.');
        } else {
            $birim->forceDelete();
            return redirect()->route('bys_birimler_silinenler')->with('success', 'Birim kalıcı olarak silindi.');
        }
    }

    public function birim_geri_yukle(Request $request){
        $birim = Birim::onlyTrashed()->where('id', $request->birim)->first();
        $birim->restore();
        return redirect()->route('bys_birimler')->with('success', 'Birim geri yüklendi.');
    }




    //BLOK İŞLEMLERİ
    public function blok_ekle(){
        $blok = new Blok(); //Blok ekle ve güncellenin tek form olması için gerekli
        return view('bys.blok_ekle', compact('blok'));
    }

    public function blok_ekle_post(BlokRequest $request){
        $blok = Blok::create(['blok_adi' => Birim::buyukHarfeCevir($request->blok_adi)]);
        return redirect()->route('bys_blok_ekle')->with('success', $blok->blok_adi.' isimli blok eklendi.');
    }

    public function bloklar(){
        $bloklar = Blok::orderBy('blok_adi')->get();
        return view('bys.bloklar', compact('bloklar'));
    }

    public function blok_duzenle(Blok $blok){
        return view('bys.blok_duzenle', compact('blok'));
    }

    public function blok_duzenle_post(BlokRequest $request){
        $blok = Blok::findOrFail($request->blok);
        $blok->update(['blok_adi' => Birim::buyukHarfeCevir($request->blok_adi)]);
        return redirect()->route('bys_bloklar')->with('success', 'Blok güncellendi.');
    }

    public function blok_sil(Blok $blok){
        if ($blok->katKontrol()) {
            return redirect()->route('bys_bloklar')->with('danger', 'Silmek istediğiniz blokta tanımlı kat bulunduğu için silinemedi.');
        } else {
            $blok->delete();
            return redirect()->route('bys_bloklar')->with('success', 'Blok silindi.');
        }
    }

    public function blok_detay(Blok $blok)
    {
        $katlar = Kat::where('blok_id', $blok->id)->orderByRaw(Kat::katSiralamaFonksiyonu())->get();
        return view('bys.blok_detay', compact('katlar', 'blok'));
    }

    public function bloklar_silinenler (){
        $silinen_bloklar = Blok::onlyTrashed()->get();
        return view('bys.bloklar_silinenler', compact('silinen_bloklar'));
    }

    public function blok_kalici_sil(Request $request){
        $blok = Blok::onlyTrashed()->where('id', $request->blok)->first();
        if ($blok->katKontrol()) {
            return redirect()->route('bys_bloklar_silinenler')->with('danger', 'Silmek istediğiniz blokta tanımlı kat bulunduğu için silinemedi.');
        } else {
            $blok->forceDelete();
            return redirect()->route('bys_bloklar_silinenler')->with('success', 'Blok kalıcı olarak silindi.');
        }
    }

    public function blok_geri_yukle(Request $request){
        $blok = Blok::onlyTrashed()->where('id', $request->blok)->first();
        $blok->restore();
        return redirect()->route('bys_bloklar')->with('success', 'Blok geri yüklendi.');
    }





    //KAT İŞLEMLERİ
    public function kat_ekle(){
        $bloklar = Blok::orderBy('blok_adi')->get();
        $kat = new Kat(); //Kat ekle ve güncellenin tek form olması için gerekli
        return view('bys.kat_ekle', compact('kat', 'bloklar'));
    }

    public function kat_ekle_post(KatRequest $request){
        $kat = Kat::create(['blok_id' => $request->blok_id, 'kat_adi' => Birim::buyukHarfeCevir($request->kat_adi)]);
        return redirect()->route('bys_kat_ekle')->with('success', $kat->kat_adi.' isimli kat eklendi.');
    }

    public function katlar(){
        $katlar = Kat::with('blok')->orderBy('blok_id')->orderByRaw(Kat::katSiralamaFonksiyonu())->get();
        return view('bys.katlar', compact('katlar'));
    }

    public function kat_duzenle(Kat $kat){
        $bloklar = Blok::orderBy('blok_adi')->get();
        return view('bys.kat_duzenle', compact('kat', 'bloklar'));
    }

    public function kat_duzenle_post(KatRequest $request){
        $kat = Kat::findOrFail($request->kat);
        $kat->update(['blok_id' => $request->blok_id, 'kat_adi' => Birim::buyukHarfeCevir($request->kat_adi)]);
        return redirect()->route('bys_katlar')->with('success', 'Kat güncellendi.');
    }

    public function kat_sil(Kat $kat){
        if ($kat->odaKontrol()) {
            return redirect()->route('bys_katlar')->with('danger', 'Silmek istediğiniz katta tanımlı oda bulunduğu için silinemedi.');
        } else {
            $kat->delete();
            return redirect()->route('bys_katlar')->with('success', 'Kat silindi.');
        }
    }

    public function kat_detay(Kat $kat)
    {
        $odalar_tumu = Oda::where('kat_id', $kat->id)->get();
        $odalar = $odalar_tumu->sortBy('oda_kodu', SORT_NATURAL, false); //sıralamak için kullanılmaktadır.
        return view('bys.kat_detay', compact('odalar', 'kat'));
    }

    public function katlar_silinenler (){
        $silinen_katlar = Kat::onlyTrashed()->get();
        return view('bys.katlar_silinenler', compact('silinen_katlar'));
    }

    public function kat_kalici_sil(Request $request){
        $kat = Kat::onlyTrashed()->where('id', $request->kat)->first();
        if ($kat->odaKontrol()) {
            return redirect()->route('bys_katlar_silinenler')->with('danger', 'Silmek istediğiniz katta tanımlı oda bulunduğu için silinemedi.');
        } else {
            $kat->forceDelete();
            return redirect()->route('bys_katlar_silinenler')->with('success', 'Kat kalıcı olarak silindi.');
        }
    }

    public function kat_geri_yukle(Request $request){
        $kat = Kat::onlyTrashed()->where('id', $request->kat)->first();
        $kat->restore();
        return redirect()->route('bys_katlar')->with('success', 'Kat geri yüklendi.');
    }




    //ODA İŞLEMLERİ
    public function oda_ekle(){
        $katlar = Kat::orderBy('blok_id', 'ASC')->orderByRaw(Kat::katSiralamaFonksiyonu())->get();
        $oda = new Oda(); //Oda ekle ve güncellenin tek form olması için gerekli
        return view('bys.oda_ekle', compact('oda', 'katlar'));
    }

    public function oda_ekle_post(OdaRequest $request){
        $kat = Kat::find($request->kat_id);
        if ($request->checkbox == 1) {
            for ($i=1; $i <= $request->oda_numarasi; $i++) { 
                $find = Oda::where('oda_numarasi', $i)->where('kat_id', $request->kat_id)->first();
                if (is_null($find)) {
                    $oda = Oda::create(['kat_id' => $request->kat_id, 'oda_kodu' => $kat->blok->blok_adi.$kat->kat_adi."-".$i, 'oda_numarasi' => Birim::buyukHarfeCevir($i)]);
                }
            }  
            return redirect()->route('bys_oda_ekle')->with('success', 'Eksik oda varsa eklendi.');
        } else {
            $oda = Oda::create(['kat_id' => $request->kat_id, 'oda_kodu' => $kat->blok->blok_adi.$kat->kat_adi."-".Birim::buyukHarfeCevir($request->oda_numarasi), 'oda_numarasi' => Birim::buyukHarfeCevir($request->oda_numarasi)]);
            return redirect()->route('bys_oda_ekle')->with('success', 'Kat eklendi.');
        }
    }

    public function odalar(){
        // $odalar = Oda::with('kat')->orderBy('kat_id')->orderBy(DB::raw('LENGTH(oda_numarasi), oda_numarasi'))->get();
        $odalar = Oda::with('kat')->orderBy('kat_id')->paginate(500);
        return view('bys.odalar', compact('odalar'));
    }

    public function oda_duzenle(Oda $oda){
        $katlar = Kat::orderBy('blok_id', 'ASC')->orderByRaw(Kat::katSiralamaFonksiyonu())->get();
        return view('bys.oda_duzenle', compact('oda', 'katlar'));
    }

    public function oda_duzenle_post(OdaRequest $request){
        $kat = Kat::findOrFail($request->kat_id);
        $oda = Oda::findOrFail($request->oda);
        $oda->update(['kat_id' => $request->kat_id, 'oda_kodu' => $kat->blok->blok_adi.$kat->kat_adi."-".Birim::buyukHarfeCevir($request->oda_numarasi), 'oda_numarasi' => Birim::buyukHarfeCevir($request->oda_numarasi)]);
        return redirect()->route('bys_odalar')->with('success', 'Oda güncellendi.');
    }

    public function oda_sil(Oda $oda){
        // if ($oda->odaKontrol()) {
        //     return redirect()->route('odalar')->with('danger', 'Silmek istediğiniz odada tanımlı ..... bulunduğu için silinemedi.');
        // } else {
        //     $oda->delete();
        //     return redirect()->route('odalar')->with('success', 'Oda silindi.');
        // }

        return redirect()->route('bys')->with('info', 'Oda silme işlemi devre dışı bırakılmıştır.');
    }

    public function odalar_silinenler (){
        $silinen_odalar = Oda::onlyTrashed()->get();
        return view('bys.odalar_silinenler', compact('silinen_odalar'));
    }

    public function oda_kalici_sil(Request $request){

        return redirect()->route('bys')->with('info', 'Oda kalıcı silme işlemi devre dışı bırakılmıştır.');
    }

    public function oda_geri_yukle(Request $request){
        $oda = Oda::onlyTrashed()->where('id', $request->oda)->first();
        $oda->restore();
        return redirect()->route('bys_odalar')->with('success', 'Oda geri yüklendi.');
    }



    //ODA TİPİ İŞLEMLERİ
    public function oda_tipi_ekle(){
        $oda_tipi = new OdaTipi(); //Oda tipi ekle ve güncellenin tek form olması için gerekli
        return view('bys.oda_tipi_ekle', compact('oda_tipi'));
    }

    public function oda_tipi_ekle_post(OdaTipiRequest $request){
        $oda_tipi = OdaTipi::create(['oda_tipi_adi' => Birim::buyukHarfeCevir($request->oda_tipi_adi)]);
        return redirect()->route('bys_oda_tipi_ekle')->with('success', $oda_tipi->oda_tipi_adi.' isimli oda tipi eklendi.');
    }

    public function oda_tipleri(){
        $oda_tipleri = OdaTipi::orderBy('oda_tipi_adi')->get();
        return view('bys.oda_tipleri', compact('oda_tipleri'));
    }

    public function oda_tipi_duzenle(OdaTipi $oda_tipi){
        return view('bys.oda_tipi_duzenle', compact('oda_tipi'));
    }

    public function oda_tipi_duzenle_post(OdaTipiRequest $request){
        $oda_tipi = OdaTipi::findOrFail($request->oda_tipi);
        $oda_tipi->update(['oda_tipi_adi' => Birim::buyukHarfeCevir($request->oda_tipi_adi)]);
        return redirect()->route('bys_oda_tipleri')->with('success', 'Oda tipi güncellendi.');
    }

    public function oda_tipi_sil(OdaTipi $oda_tipi){
        if ($oda_tipi->odaKontrol()) {
            return redirect()->route('bys_oda_tipleri')->with('danger', 'Silmek istediğiniz oda tipine tanımlı oda bulunduğu için silinemedi.');
        } else {
            $oda_tipi->delete();
            return redirect()->route('bys_oda_tipleri')->with('success', 'Oda tipi silindi.');
        }
    }

    public function oda_tipleri_silinenler (){
        $silinen_oda_tipleri = OdaTipi::onlyTrashed()->get();
        return view('bys.oda_tipleri_silinenler', compact('silinen_oda_tipleri'));
    }

    public function oda_tipi_kalici_sil(Request $request){
        $oda_tipi = OdaTipi::onlyTrashed()->where('id', $request->oda_tipi)->first();
        if ($oda_tipi->odaKontrol()) {
            return redirect()->route('bys_oda_tipleri')->with('danger', 'Silmek istediğiniz oda tipine tanımlı oda bulunduğu için silinemedi.');
        } else {
            $oda_tipi->forceDelete();
            return redirect()->route('bys_oda_tipleri_silinenler')->with('success', 'Oda tipi kalıcı olarak silindi.');
        }
    }

    public function oda_tipi_geri_yukle(Request $request){
        $oda_tipi = OdaTipi::onlyTrashed()->where('id', $request->oda_tipi)->first();
        $oda_tipi->restore();
        return redirect()->route('bys_oda_tipleri')->with('success', 'Oda tipi geri yüklendi.');
    }


    //BİRİM ODA EŞLEŞTİRME İŞLEMLERİ
    public function birim_oda_eslestir(){
    	$birimler = Birim::all();
    	$odalar = Oda::where('birim_id', NULL)->get();
    	$oda_tipleri = OdaTipi::all();
        return view('bys.birim_oda_eslestir', compact('birimler', 'odalar', 'oda_tipleri'));
    }

    public function birim_oda_eslestir_post(BirimOdaRequest $request){
    	$oda = Oda::findOrFail($request->oda_id);
    	$oda_tipi = OdaTipi::findOrFail($request->oda_tipi_id);
    	$birim = Birim::findOrFail($request->birim_id);
        $oda->birim_id = $birim->id;
        $oda->oda_tipi_id = $oda_tipi->id;
        $oda->save();

        $oda_birim_gecmis = new OdaBirimGecmis();
        $oda_birim_gecmis->oda_id = $oda->id;
        $oda_birim_gecmis->birim_adi = $birim->birim_adi;
        if($birim->ust_birim_id == 0){
            $oda_birim_gecmis->ust_birim_adi = 'TEMEL BİRİM';
        } else {
            $oda_birim_gecmis->ust_birim_adi = $birim->birim->birim_adi;
        }
        $oda_birim_gecmis->oda_tipi_adi = $oda_tipi->oda_tipi_adi;
        $oda_birim_gecmis->save();

        return redirect()->route('bys_birim_oda_eslestir')->with('success', $oda->oda_kodu.' numaralı oda '.$birim->birim_adi.' '.$oda_tipi->oda_tipi_adi.' olarak tanımlandı.');
    }

    public function oda_ara($oda_kodu){
        $oda = Oda::where('oda_kodu', $oda_kodu)->first();
        if (is_null($oda)) {
            return redirect()->route('bys')->with('danger', $oda_kodu.' numaralı oda bulunamadı.');
        } else {
            $oda_gecmis = OdaBirimGecmis::where('oda_id', $oda->id)->orderBy('created_at', 'DESC')->get();
            $oda_numaralar = TysNumaralar::where('oda_id', $oda->id)->where('tip', 'DAHİLİ')->get();
            return view('bys.oda_detay', compact('oda', 'oda_gecmis', 'oda_numaralar'));
        }
    }

    public function oda_ara_post(Request $request){
        return redirect()->route('bys_oda_ara', $request->oda_kodu);
    }

    public function birim_oda_guncelle(Oda $oda){
        $birimler = Birim::all();
        $birim = new Birim(); //Birim ekle ve güncellenin tek form olması için gerekli
        $oda_tipleri = OdaTipi::all();
        $oda_tipi = new OdaTipi(); //Oda ekle ve güncellenin tek form olması için gerekli
        return view('bys.birim_oda_guncelle', compact('birimler', 'birim', 'oda', 'oda_tipleri', 'oda_tipi'));
    }

    public function birim_oda_guncelle_post(BirimOdaGuncelleRequest $request){
        $secili_oda = Oda::findOrFail($request->oda);
        $oda_tipi = OdaTipi::findOrFail($request->oda_tipi_id);
        $birim = Birim::findOrFail($request->birim_id);
        $secili_oda->birim_id = $birim->id;
        $secili_oda->oda_tipi_id = $oda_tipi->id;
        $secili_oda->save();

        $oda_birim_gecmis = new OdaBirimGecmis();
        $oda_birim_gecmis->oda_id = $secili_oda->id;
        $oda_birim_gecmis->birim_adi = $birim->birim_adi;
        if($birim->ust_birim_id == 0){
            $oda_birim_gecmis->ust_birim_adi = 'TEMEL BİRİM';
        } else {
            $oda_birim_gecmis->ust_birim_adi = $birim->birim->birim_adi;
        }
        $oda_birim_gecmis->oda_tipi_adi = $oda_tipi->oda_tipi_adi;
        $oda_birim_gecmis->save();

        return redirect()->route('bys_oda_ara', $secili_oda->oda_kodu);
    }

    public function oda_birim_sil(Request $request){
        $secili_oda = Oda::findOrFail($request->oda);
        $secili_oda->birim_id = null;
        $secili_oda->oda_tipi_id = null;
        $secili_oda->save();

        return redirect()->route('bys_oda_ara', $secili_oda->oda_kodu);
    }

     public function oda_bilgi_guncelle(Request $request){
        $secili_oda = Oda::findOrFail($request->oda);
        if ($request->alan == null || $request->alan == "" || $request->lokasyon == null) {
            return redirect()->route('bys_oda_ara', $secili_oda->oda_kodu)->with('danger', 'Alan veya lokasyon boş geçilemez.');
        } else {
            $secili_oda->alan = $request->alan;
            $secili_oda->lokasyon = $request->lokasyon;
            $secili_oda->save();

            return redirect()->route('bys_oda_ara', $secili_oda->oda_kodu)->with('success', 'Alan ve lokasyon kaydedildi.');
        }
    }

    public function bos_odalar(){
        $bos_odalar_tumu = Oda::where('birim_id', null)->get();
        $bos_odalar = $bos_odalar_tumu->sortBy('oda_kodu', SORT_NATURAL, false); //sıralamak için kullanılmaktadır.
        return view('bys.bos_odalar', compact('bos_odalar'));
    }

    public function oda_tipi_detay(OdaTipi $oda_tipi){
        $odalar = Oda::with('birim')->where('oda_tipi_id', $oda_tipi->id)->get();
        return view('bys.oda_tipi_detay', compact('odalar', 'oda_tipi'));
    }
}
