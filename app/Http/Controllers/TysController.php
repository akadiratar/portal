<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Birim;
use App\Models\Blok;
use App\Models\Kat;
use App\Models\Oda;
use App\Models\OdaTipi;
use App\Models\OdaBirimGecmis;
use App\Models\TysNumaralar;
use App\Models\OdaNumaraGecmis;
use App\Http\Requests\YeniNumaraEkleRequest;
use DB;

class TysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function anasayfa(){ 
    	$toplam_numara_sayisi = TysNumaralar::count();
        $dolu_numara_sayisi = TysNumaralar::where('oda_id', '<>', null)->count();
        $bos_numara_sayisi = TysNumaralar::where('oda_id', null)->count();
        if (!empty($dolu_numara_sayisi)) {
            $dolu_numara_orani = round($dolu_numara_sayisi*100/$toplam_numara_sayisi,2);
        } else {
            $dolu_numara_orani = "-";
        }

        if (!empty($bos_numara_sayisi)) {
            $bos_numara_orani = round($bos_numara_sayisi*100/$toplam_numara_sayisi,2);
        } else {
            $bos_numara_orani = "-";
        }

        $numara_tipleri = DB::table('tys_numaralar')->select('tip', DB::raw('count(*) as toplam'))->where('tip', '<>' , null)->where('deleted_at', null)->groupBy('tip')->get();
        return view('tys.index', compact('toplam_numara_sayisi', 'dolu_numara_sayisi', 'bos_numara_sayisi', 'dolu_numara_orani', 'bos_numara_orani', 'numara_tipleri'));
    }

    public function birim_detay(Birim $birim)
    {
        $secili_birim = Birim::birimUstbirimGetir($birim, 'tys_birim_detay');
        $alt_birimler = Birim::where('ust_birim_id', $birim->id)->orderBy('birim_adi', 'ASC')->get()->sortBy('birim_adi', SORT_NATURAL, false);
        $odalar = Oda::where('birim_id', $birim->id)->get();
        return view('tys.birim_detay', compact('secili_birim', 'alt_birimler', 'birim', 'odalar'));
    }

    public function blok_detay(Blok $blok)
    {
        $katlar = Kat::where('blok_id', $blok->id)->orderByRaw(Kat::katSiralamaFonksiyonu())->get();
        return view('tys.blok_detay', compact('katlar', 'blok'));
    }

    public function kat_detay(Kat $kat)
    {
        $odalar_tumu = Oda::where('kat_id', $kat->id)->get();
        $odalar = $odalar_tumu->sortBy('oda_kodu', SORT_NATURAL, false); //sıralamak için kullanılmaktadır.
        return view('tys.kat_detay', compact('odalar', 'kat'));
    }

    public function ara($kodu){
        $oda = Oda::where('oda_kodu', $kodu)->first();
        $numara = TysNumaralar::where('no', $kodu)->first();
        if (is_null($oda) && is_null($numara)) {
            return redirect()->route('tys')->with('danger', $kodu.' numaralı oda veya numara bulunamadı.');
        } elseif (!is_null($oda)) {
            $oda_gecmis = OdaBirimGecmis::where('oda_id', $oda->id)->orderBy('created_at', 'DESC')->get();
            $oda_numaralar = TysNumaralar::where('oda_id', $oda->id)->orderBy('tip', 'ASC')->orderBy('no', 'ASC')->get();
            $oda_numara_gecmis = OdaNumaraGecmis::where('oda_id', $oda->id)->orderBy('created_at', 'DESC')->get();
            return view('tys.oda_detay', compact('oda', 'oda_gecmis', 'oda_numaralar', 'oda_numara_gecmis'));
        } elseif (!is_null($numara)) {
            $numara_odalar = OdaNumaraGecmis::where('numara_id', $numara->id)->orderBy('created_at', 'DESC')->get();
            return view('tys.numara_detay', compact('numara', 'numara_odalar'));
        }
    }

    public function ara_post(Request $request){
        return redirect()->route('tys_ara', $request->kodu);
    }

    public function birimler(){
        $birimler = Birim::birimlerUstbirimGetir(Birim::all());
        return view('tys.birimler', compact('birimler'));
    }

    public function birim_yapisi(){
        $birimler = Birim::where('ust_birim_id', 0)->orderBy('birim_adi')->get();
        return view('tys.birim_yapisi', compact('birimler'));
    }

    public function bloklar(){
        $bloklar = Blok::orderBy('blok_adi')->get();
        return view('tys.bloklar', compact('bloklar'));
    }

    public function katlar(){
        $katlar = Kat::with('blok')->orderBy('blok_id')->orderByRaw(Kat::katSiralamaFonksiyonu())->get();
        return view('tys.katlar', compact('katlar'));
    }

    public function odalar(){
        $odalar = Oda::with('kat')->orderBy('kat_id')->paginate(500);
        return view('tys.odalar', compact('odalar'));
    }

    public function oda_tipleri(){
        $oda_tipleri = OdaTipi::orderBy('oda_tipi_adi')->get();
        return view('tys.oda_tipleri', compact('oda_tipleri'));
    }

    public function numara_tipi_detay($tip){
        $toplam_numara_sayisi = TysNumaralar::where('tip', $tip)->count();
        $dolu_numara_sayisi = TysNumaralar::where('tip', $tip)->where('oda_id', '<>', null)->count();
        $bos_numara_sayisi = TysNumaralar::where('tip', $tip)->where('oda_id', null)->count();
        if (!empty($dolu_numara_sayisi)) {
            $dolu_numara_orani = round($dolu_numara_sayisi*100/$toplam_numara_sayisi,2);
        } else {
            $dolu_numara_orani = "-";
        }

        if (!empty($bos_numara_sayisi)) {
            $bos_numara_orani = round($bos_numara_sayisi*100/$toplam_numara_sayisi,2);
        } else {
            $bos_numara_orani = "-";
        }
        $numaralar = TysNumaralar::with('oda')->where('tip', $tip)->paginate(300);
        return view('tys.numara_tipi_detay', compact('numaralar', 'tip', 'toplam_numara_sayisi', 'dolu_numara_sayisi', 'bos_numara_sayisi', 'dolu_numara_orani', 'bos_numara_orani'));
    }

    public function dahili_no_ekle(Oda $oda){
        return view('tys.dahili_no_ekle', compact('oda'));
    }

    public function dahili_no_ekle_post(Oda $oda, Request $request){

        $tasinanlar = [];
        $tanimlilar = [];
        $kayitsizlar = [];

        $dahililer = json_decode($request->dahililer, true);

        if ($dahililer == null) {
            return redirect()->route('tys_dahili_no_ekle', $oda->id)->with('danger', 'Numara yazmadınız.');
        } else {
            if ($dahililer <> null) {
                foreach ($dahililer as $key) {
                    $numara = TysNumaralar::where('no', $key["value"])->first();
                    if (!is_null($numara)) {
                        if ($numara->oda_id == 0) {
                    
                            $numara->oda_id = $oda->id;
                            $numara->save();

                            $gecmis_kayit = new OdaNumaraGecmis();
                            $gecmis_kayit->oda_id = $oda->id;
                            $gecmis_kayit->numara_id = $numara->id;
                            $gecmis_kayit->save();

                            $tasinanlar[] = $numara->no;

                        } elseif ($numara->oda_id == $oda->id) {
                            
                        } else {
                            $tanimlilar[] = $numara;
                        }
                    } else {
                        $kayitsizlar[] = $key["value"];
                    }
                }
            }

            if (count($tanimlilar)>0 || count($kayitsizlar)>0) {
                return view('tys.onayla_tasi', compact('tasinanlar', 'tanimlilar', 'kayitsizlar', 'oda'));
            } else {
                return redirect()->route('tys_ara', $oda->oda_kodu)->with('success', 'Numaralar eklendi.');
            }
        }
    }

    public function onayla_tasi_post(Oda $oda, Request $request){

        if (!is_null($request['tanimlilar'])) {
            foreach ($request['tanimlilar'] as $value) {
                $numara = TysNumaralar::findOrFail($value);
                if (!is_null($numara)) {
                    $numara->oda_id = $oda->id;
                    $numara->save();

                    $gecmis_kayit = new OdaNumaraGecmis();
                    $gecmis_kayit->oda_id = $oda->id;
                    $gecmis_kayit->numara_id = $numara->id;
                    $gecmis_kayit->save();
                }
            }

            return redirect()->route('tys_ara', $oda->oda_kodu)->with('success', 'Numaralar odaya eklendi. Taşımak istedikleriniz taşındı.');
        } else {
            return redirect()->route('tys_ara', $oda->oda_kodu)->with('info', 'Numaralar odaya eklendi. Başka odada tanımlı numaralar TAŞINMADI.');
        }
    }

    public function numara_sil_post(Request $request){
        $numara = TysNumaralar::findOrFail($request->numara);
        $oda = $numara->oda->oda_kodu;
        $numara->oda_id = null;
        $numara->save();

        return redirect()->route('tys_ara', $oda)->with('success', 'Numara odadan silindi.');
    }

    public function diger_numaralar(){
        $diger_numaralar = TysNumaralar::whereNotIn('tip', ['PANİK BUTONU', 'DAHİLİ', 'YANGIN'])->get();
        return view('tys.diger_numaralar', compact('diger_numaralar'));
    }

    public function diger_numara_sil_post(Request $request){
        $numara = TysNumaralar::findOrFail($request->numara);
        $numara->delete();

        return redirect()->route('tys_diger_numaralar')->with('success', 'Numara başarıyla silindi.');
    }

    public function yeni_numara_ekle(){
        return view('tys.yeni_numara_ekle');
    }

    public function yeni_numara_ekle_post(YeniNumaraEkleRequest $request){
        $yeni_numara = new TysNumaralar();
        $yeni_numara->no = $request->numara;
        $yeni_numara->tip = $request->tip;
        $yeni_numara->save();

        return redirect()->route('tys_diger_numaralar')->with('success', 'Numara başarıyla eklendi.');
    }

    public function numaralar_silinenler (){
        $silinen_numaralar = TysNumaralar::onlyTrashed()->get();
        return view('tys.numaralar_silinenler', compact('silinen_numaralar'));
    }

    public function numara_geri_yukle(Request $request){
        $numara = TysNumaralar::onlyTrashed()->where('id', $request->numara)->first();
        $numara->restore();
        return redirect()->route('tys_numaralar_silinenler')->with('success', 'Numara geri yüklendi.');
    }
}
