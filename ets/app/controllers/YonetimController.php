<?php

class YonetimController extends Controller {


    public function index()
    {
        $veri["turler"] = Tur::orderBy("tur_adi","ASC")->get();
        $veri["kayitlar"] = Kayit::orderBy("id","DESC")->take(150)->get();
        return View::make("yonetim.index", $veri);
    }

    public function log()
    {
        return Redirect::to("logviewer");
    }

    public function onay()
    {
        return View::make("yonetim.onay");
    }

    public function onay_post()
    {

        $oda = Oda::where('oda_birlikte',Input::get("oda_no"))->first();
        $urun = Urun::where('seri_no',Input::get("seri_no"))->first();

        $odaurun = OdaUrun::where('urun_id',$urun->id)->first();
        Log::debug('<b>'.$odaurun->urun->seri_no.'</b> seri numaralı ürün <b>'.$odaurun->oda->oda_birlikte.'</b> numaralı <b>'.$odaurun->oda->birim->birim_adi.' '.$odaurun->oda->aciklama.'</b> odasından <b>SİLİNDİ</b>. Silen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');
        $odaurun->delete();

        $oda_urun = new OdaUrun();
        $oda_urun->birim_id = $oda->birim_id;
        $oda_urun->oda_id = $oda->id;
        $oda_urun->urun_id = $urun->id;
        $oda_urun->save();

        $oda_gecmis = new OdaUrunGecmis();
        $oda_gecmis->urun_id = $urun->id;
        $oda_gecmis->oda_birlikte = $oda->oda_birlikte;
        $oda_gecmis->birim = $oda->birim->birim_adi." ".$oda->aciklama;
        $oda_gecmis->save();

        $dusum_listesi = DusumListesi::where('urun_id',$urun->id)->first();
        if (count($dusum_listesi)>0) {
            $dusum_listesi->delete();
        }

        $urun->kayit = 1;
        $urun->save();

        Log::info('<b>'.$oda_urun->oda->oda_birlikte.'</b> numaralı <b>'.$oda_urun->oda->birim->birim_adi.' '.$oda_urun->oda->aciklama.'</b> odasına <b>'.$oda_urun->urun->seri_no.'</b> seri numaralı ürün <b>EKLENDİ</b>. Ekleyen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');

        return Redirect::route('oda_urun')->with("success", $urun->seri_no." seri numaralı ürün ".$oda->oda_birlikte." numaralı odaya taşındı.");
    }

    public function iptal()
    {
        return Redirect::route("index")->with("danger","İŞLEMİNİZ İPTAL EDİLDİ. HERHANGİ BİR DEĞİŞİKLİK YAPILMADI");
    }


    public function arizakayit()
    {
        return View::make("yonetim.urun_ariza_ekle");
    }

    public function arizakayit_post()
    {
        $girilenserino = Urun::where('seri_no',Input::get("seri_no"))->first();
        if (count($girilenserino)>0) {
            $urun_ariza = new UrunAriza();
            $urun_ariza->urun_id = $girilenserino->id;
            $urun_ariza->ariza_aciklamasi = Input::get("aciklama");
            $urun_ariza->birim = Input::get("birim");
            $urun_ariza->yapilan_islem = Input::get("islem");
            $urun_ariza->save();
        } else {
            return Redirect::route("arizakayit")->with("danger","GİRİLEN SERİ NUMARASI KAYITLI DEĞİL. ÖNCE KAYIT ETTİRİN.");
        }

        return Redirect::route("arizakayit")->with("success",$girilenserino->seri_no." SERİ NUMARALI ÜRÜNE ARIZA KAYIT EKLENDİ.");
    }

    public function urunariza_sil($id)
    {
        $kayit = UrunAriza::findOrFail($id);
        $kayit->delete();

        return Redirect::route('tum_ariza_kayitlari')->with("success", "Ürüne ait kayıt Silinmiştir.");
    }




    //Sorgu İşlemleri
    public function sorgu()
    {
        $veri["turler"] = Tur::all();
        return View::make("yonetim.sorgu", $veri);
    }

    public function sorgu_post()
    {
        if (Input::get("model") == "tumu") {

            // $dilimler = explode("/", Input::get("tur_id"));
            // $modeller = Tur::modelGetir($dilimler[5]);
            // foreach ($modeller as $model) {
            //     $veri["urunler"] = Urun::where("model_id", $model->id)->get();
            // }
            // $veri["tur"] = Tur::where("id",Input::get("tur_id"))->first();
            // return View::make("yonetim.sorgusonucu", $veri);

        } else {
            $veri["urunler"] = Urun::where("model_id",Input::get("model"))->orderBy("kayit","ASC")->get();
            $veri["model"] = Model::where("id",Input::get("model"))->first();
            return View::make("yonetim.sorgusonucu", $veri);
        }
    }

    public function secilitur($id=NULL){
        $veri['modeller'] = Model::where("tur_id",$id)->orderBy("marka_id","ASC")->get();
        return View::make("ajax.modeller",$veri);
    }



    //Kilit İşlemleri
    public function kilit()
    {
        return View::make("yonetim.kilit");
    }

    public function kilit_post()
    {
        $kilit = Kilit::findOrFail(1);
        $kilit->kilit = Input::get("kilit");
        $kilit->save();

        if ($kilit->kilit == 0) {
            return Redirect::route("index")->with("success", "Sistem KİLİTLENDİ.");
        }
        else{
            return Redirect::route("index")->with("success", "Sistem Kilidi AÇILDI.");
        }
        
    }



    //Şifre Değiştirme İşlemleri
    public function sifredegistirme()
    {
        return View::make("yonetim.sifredegistirme");
    }



    public function sifredegistirme_post()
    {
        $eskisifre = Input::get("eskisifre");
        $yenisifre = Input::get("yenisifre");
        $yenisifretekrar = Input::get("yenisifretekrar");

        $durum = Auth::attempt(
            
        array(
            "id" => Auth::User()->id,
            "password" => $eskisifre 
            )
        );

        if ($durum)
        {   
            if ($yenisifre == $yenisifretekrar) {

                $kullanici = User::find(Auth::User()->id);
                $kullanici->password = Hash::make($yenisifre);
                $kullanici->save();

                return Redirect::route("sifredegistirme")->with("success", "Şifre güncellendi.");
            }else{
                return Redirect::route("sifredegistirme")->with("danger", "Şifreler uyuşmuyor.");
            }
            
        }
        else{
            return Redirect::route("sifredegistirme")->with("danger", "Eski şifre yanlış.");
        }

    }


    //Giriş Çıkış İşlemleri
    public function giris(){
        if (Auth::check()) {
            return Redirect::route("index");
        }
        else{
            return View::make("yonetim.giris");
        }
    }


    public function giris_post(){
        $yonetici_sicili = Input::get("yonetici_sicili");
        $password = Input::get("password");
        $durum = Auth::attempt(
            array(
                "yonetici_sicili" => $yonetici_sicili,
                "password" => $password
            )
        );

        if ($durum) {
            return Redirect::route("index");
        }
        else {
            return Redirect::route("giris");
        }
    }

    public function cikis(){
        Auth::logout();
        return Redirect::route("giris");
    }



    //Yönetici İşlemleri
    public function yonetici_ekle()
    {
        return View::make("yonetim.yonetici_ekle");
    }

    public function yonetici_ekle_post()
    {

        $validator = Validator::make(Input::all(),
            array(
                'yonetici_sicili' => 'unique:users,yonetici_sicili'
            )
        );

        if ($validator->fails()){
            return Redirect::route("yonetici_ekle")->with("danger", "Sicil zaten kayıtlı.");
        }
        else{
            $user = new User();
            $user->yonetici_adi = Input::get("yonetici_adi");
            $user->yonetici_sicili = Input::get("yonetici_sicili");
            $user->yonetici_unvani = Input::get("yonetici_unvani");
            $user->yonetici_tip = Input::get("yonetici_tip");
            $user->password = Hash::make(Input::get("sifre"));
            $user->save();

            return Redirect::route("yonetici_ekle")->with("success", "Kayıt başarılı.");
        }
    }

    public function yoneticiler()
    {
        $veri["yoneticiler"] = User::all();
        return View::make("yonetim.yoneticiler", $veri);
    }

    public function yonetici_duzenle($id=NULL)
    {
        $veri["yonetici"] = User::where('id',$id)->first();
        return View::make("yonetim.yonetici_duzenle", $veri);
    }

    public function yonetici_duzenle_post($id)
    {
        $user = User::findOrFail($id);
        if ($user->id == 1) {
            if (Input::get("sifre") <> "") {
                $user->password = Hash::make(Input::get("sifre"));
                $user->save();
                return Redirect::route("yoneticiler")->with("success","Şifre değiştirildi.");
            }else{
                return Redirect::route("yoneticiler")->with("info","Sadece şifresi değiştirilebilir.");
            }     
        }else{
            $user->yonetici_adi = Input::get("yonetici_adi");
            $user->yonetici_sicili = Input::get("yonetici_sicili");
            $user->yonetici_tip = Input::get("yonetici_tip");
            $user->yonetici_unvani = Input::get("yonetici_unvani");
            if (Input::get("sifre") <> "") {
                $user->password = Hash::make(Input::get("sifre"));
            }
            $user->save();

            return Redirect::route("yoneticiler")->with("success","Yönetici bilgileri güncellendi.");
        }

    }

    public function yonetici_sil($id)
    {
        $user = User::findOrFail($id);
        if ($user->yonetici_tip == 1) {
            return Redirect::route("yoneticiler")->with("info","Üst yönetici silinemez. Önce seviyesini düşürün.");
        }else{
            $user->delete();

            return Redirect::route("yoneticiler")->with("success","Yönetici silindi.");
        }
    }



    //Not İşlemleri
    public function notlar()
    {
        $veri["notlar"] = Not::where('durum', '<>', 2)->get();
        return View::make("yonetim.notlar", $veri);
    }

    public function notlar_post()
    {
        $not = new Not();
        $not->aciklama = Input::get("aciklama");
        $not->durum = 0;
        $not->save();

        return Redirect::route('notlar');
    }

    public function notuTamamla($id=NULL){
        $not = Not::findOrFail($id);
        $not->durum = 1;
        $not->save();
        return Redirect::route('notlar');
    }

    public function notuArsivle($id=NULL){
        $not = Not::findOrFail($id);
        if ($not->durum == 1) {
            $not->durum = 2;
            $not->save();
            return Redirect::route('notlar');
        }else{
            return Redirect::route('notlar')->with("danger", "Notun arşive kaldırılması için tamamlanmış olması gerekiyor. Önce notu Tamamlayın.");
        }
    }


    public function notuSil($id=NULL){
        $not = Not::findOrFail($id);
        $not->delete();
        return Redirect::route('notlar');
    }


    public function notuDuzenle($id=NULL){
        $not = Not::findOrFail($id);
        $not->aciklama = Input::get("aciklama");
        $not->save();
        return Redirect::route('notlar');
    }

    public function notArsivi()
    {
        $veri["notlar"] = Not::where('durum', 2)->get();
        return View::make("yonetim.not_arsiv", $veri);
    }




    //Odaya Ürün Ekleme İşlemleri
    public function oda_urun()
    {
        return View::make("yonetim.oda_urun");
    }

    public function oda_urun_post()
    {
        $oda = Oda::where('oda_birlikte',Input::get("oda_no"))->first();
        $urun = Urun::where('seri_no',Input::get("seri_no"))->first();
        if (count($oda)>0) {
            if (count($urun)>0) {
                $kayitlimi = OdaUrun::where('urun_id',$urun->id)->first();
                if (count($kayitlimi)>0) {
                    $veri["oda_birlikte"] = $kayitlimi->oda->oda_birlikte;
                    $veri["seri_no"] = $urun->seri_no;
                    $veri["yenioda"] = $oda->oda_birlikte;
                    return View::make("yonetim.onay", $veri);
                }else{
                    $oda_urun = new OdaUrun();
                    $oda_urun->birim_id = $oda->birim_id;
                    $oda_urun->oda_id = $oda->id;
                    $oda_urun->urun_id = $urun->id;
                    $oda_urun->save();

                    $oda_gecmis = new OdaUrunGecmis();
                    $oda_gecmis->urun_id = $urun->id;
                    $oda_gecmis->oda_birlikte = $oda->oda_birlikte;
                    $oda_gecmis->birim = $oda->birim->birim_adi." ".$oda->aciklama;
                    $oda_gecmis->save();

                    $dusum_listesi = DusumListesi::where('urun_id',$urun->id)->first();
                    if (count($dusum_listesi)>0) {
                        $dusum_listesi->delete();
                    }

                    

                    $urun->kayit = 1;
                    $urun->save();

                    Log::info('<b>'.$oda_urun->oda->oda_birlikte.'</b> numaralı <b>'.$oda_urun->oda->birim->birim_adi.' '.$oda_urun->oda->aciklama.'</b> odasına <b>'.$oda_urun->urun->seri_no.'</b> seri numaralı ürün <b>EKLENDİ</b>. Ekleyen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');

                    return Redirect::route('oda_urun')->with("success", $oda->oda_birlikte." numaralı odaya ".$urun->seri_no." seri numaralı ürün eklendi.");
                } 
            }else{
                return Redirect::route('oda_urun')->with("danger", "Girdiğiniz seri numarası kayıtlı değil.");
            }
        }else{
            return Redirect::route('oda_urun')->with("danger", "Girdiğiniz oda tanımlanmamış.");
        }
    }


    public function urun_tasi()
    {
        $urunler = Input::get("seciliurunler");
        $veri["urunler"] = Input::get("seciliurunler");
        if ($urunler <> NULL) {
            return View::make("yonetim.urun_tasi",$veri);
        } else {
            return Redirect::route('index')->with("danger", "Ürün Seçimi Yapmadınız.");
        }
    }


    public function urun_tasi_onayla()
    {
        $oda = Oda::where('oda_birlikte',Input::get("yeni_oda_no"))->first();
        if (count($oda)>0) {

            $urunler = Input::get("seciliurunler");
            foreach ($urunler as $seciliurun) {
                $urun = Urun::where('seri_no',$seciliurun)->first();

                $odaurun = OdaUrun::where('urun_id',$urun->id)->first();
                Log::debug('<b>'.$odaurun->urun->seri_no.'</b> seri numaralı ürün <b>'.$odaurun->oda->oda_birlikte.'</b> numaralı <b>'.$odaurun->oda->birim->birim_adi.' '.$odaurun->oda->aciklama.'</b> odasından <b>SİLİNDİ</b>. Silen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');
                $odaurun->delete();

                $oda_urun = new OdaUrun();
                $oda_urun->birim_id = $oda->birim_id;
                $oda_urun->oda_id = $oda->id;
                $oda_urun->urun_id = $urun->id;
                $oda_urun->save();

                $oda_gecmis = new OdaUrunGecmis();
                $oda_gecmis->urun_id = $urun->id;
                $oda_gecmis->oda_birlikte = $oda->oda_birlikte;
                $oda_gecmis->birim = $oda->birim->birim_adi." ".$oda->aciklama;
                $oda_gecmis->save();

                $urun->kayit = 1;
                $urun->save();

                Log::info('<b>'.$oda_urun->oda->oda_birlikte.'</b> numaralı <b>'.$oda_urun->oda->birim->birim_adi.' '.$oda_urun->oda->aciklama.'</b> odasına <b>'.$oda_urun->urun->seri_no.'</b> seri numaralı ürün <b>EKLENDİ</b>. Ekleyen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');

            }

            return Redirect::route('urunler',$oda->oda_birlikte)->with("success", "Ürünler Başarıyla Taşındı.");

        }else{
            return Redirect::route('index')->with("danger", "Girdiğiniz oda tanımlanmamış.");
        }
    }

    public function odaurun_sil($id, $birim=NULL)
    {
        $odaurun = OdaUrun::findOrFail($id);
        $oda = $odaurun->oda->oda_birlikte;

        $urun = Urun::where("id", $odaurun->urun_id)->first();
        $urun->kayit = 0;
        $urun->save();

        Log::debug('<b>'.$odaurun->urun->seri_no.'</b> seri numaralı ürün <b>'.$odaurun->oda->oda_birlikte.'</b> numaralı <b>'.$odaurun->oda->birim->birim_adi.' '.$odaurun->oda->aciklama.'</b> odasından <b>SİLİNDİ</b>. Silen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');
        
        $odaurun->delete();

        if ($birim == 0) {
            return Redirect::route('urunler', $oda)->with("success", "Kayıt silindi.");
        }else{
            return Redirect::route('birimhepsi', $birim)->with("success", "Kayıt silindi.");
        }
    }




    //Arama İşlemi
    public function ara()
    {
        $girilenoda = Oda::where('oda_birlikte',Input::get("search"))->first();
        $girilenserino = Urun::where('seri_no',Input::get("search"))->first();

        if (count($girilenoda)>0) {
            if ($girilenoda->depokontrol=="1") {
                if (Auth::user()->yonetici_tip == "1") {
                    $veri["urunler"] = OdaUrun::where('oda_id',$girilenoda->id)->get(); 
                    $veri["modeller"] = Model::all();
                    $veri["turler"] = Tur::all();
                    $veri["girilenoda"] = Oda::where('oda_birlikte',Input::get("search"))->first();
                    $veri["kayitlar"] = Kayit::where('oda_id',$girilenoda->id)->orderBy("id","DESC")->take(50)->get();
                    return View::make("yonetim.urunler",$veri);
                }else{
                    return View::make("yonetim.403");
                }
            }else{
                $veri["urunler"] = OdaUrun::where('oda_id',$girilenoda->id)->get();
                $veri["modeller"] = Model::all();
                $veri["turler"] = Tur::all();
                $veri["girilenoda"] = Oda::where('oda_birlikte',Input::get("search"))->first();
                $veri["kayitlar"] = Kayit::where('oda_id',$girilenoda->id)->orderBy("id","DESC")->take(50)->get();
                return View::make("yonetim.urunler",$veri);
            }
        }elseif (count($girilenserino)>0) {
            $veri["girilenserino"] = $girilenserino;
            $veri["oda"] = OdaUrun::where('urun_id',$girilenserino->id)->first();
            $veri["arizalar"] = UrunAriza::where('urun_id',$girilenserino->id)->orderBy("id","DESC")->get();
            $veri["gecmis"] = OdaUrunGecmis::where('urun_id',$girilenserino->id)->orderBy("id","DESC")->get();
            return View::make("yonetim.urun.urun_detay",$veri);
        }else {
            return Redirect::route('index')->with("danger", "Aradığınız oda - seri no bulunamamıştır.");
        }
        
    }

    public function uruntiklama($id=NULL){
        $girilenserino = Urun::where('seri_no',$id)->first();
        $veri["girilenserino"] = $girilenserino;
        $veri["oda"] = OdaUrun::where('urun_id',$girilenserino->id)->first();
        $veri["arizalar"] = UrunAriza::where('urun_id',$girilenserino->id)->orderBy("id","DESC")->get();
        $veri["gecmis"] = OdaUrunGecmis::where('urun_id',$girilenserino->id)->orderBy("id","DESC")->get();
        return View::make("yonetim.urun.urun_detay",$veri);
    }



    //Sol Menü İşlemleri
    public function kat($blok=NULL, $kat=NULL){
        $veri["odalar"] = Oda::where('blok',$blok)->where('kat',$kat)->where('depokontrol',"0")->orderBy("oda_no","ASC")->get();
        $veri["ustmenu"] = $blok;
        $veri["menu"] = $kat;
        return View::make("yonetim.odalar",$veri);
    }

    public function urunler($oda=NULL){
        $girilenoda = Oda::where('oda_birlikte',$oda)->first();
        
        if ($girilenoda->depokontrol=="1") {
            if (Auth::user()->yonetici_tip == "1") {
                $veri["urunler"] = OdaUrun::where('oda_id',$girilenoda->id)->get();
                $veri["modeller"] = Model::all();
                $veri["turler"] = Tur::all();
                $veri["girilenoda"] = Oda::where('oda_birlikte',$oda)->first();
                $veri["kayitlar"] = Kayit::where('oda_id',$girilenoda->id)->orderBy("id","DESC")->take(50)->get();
                return View::make("yonetim.urunler",$veri);
            }else{
                return View::make("yonetim.403");
            }
        }else{
            $veri["urunler"] = OdaUrun::where('oda_id',$girilenoda->id)->get();
            $veri["modeller"] = Model::all();
            $veri["turler"] = Tur::all();
            $veri["girilenoda"] = Oda::where('oda_birlikte',$oda)->first();
            $veri["kayitlar"] = Kayit::where('oda_id',$girilenoda->id)->orderBy("id","DESC")->take(50)->get();
            return View::make("yonetim.urunler",$veri);
        }
        
    }

    public function birimler($id=NULL){
        $veri["birimler"] = Birim::where('ust_birim_id',$id)->get();
        $veri["ustbirim"] = UstBirim::where('id', $id)->first();
        return View::make("yonetim.birimler",$veri);
    }

    public function birimhepsi($id=NULL){
        $veri["odalar"] = Oda::where('birim_id',$id)->where('depokontrol',"0")->orderBy("oda_no","ASC")->get();
        $veri["urunler"] = OdaUrun::where('birim_id',$id)->get();
        $veri["modeller"] = Model::orderBy("tur_id","ASC")->orderBy("marka_id","ASC")->get();
        $veri["birim"] = Birim::where('id',$id)->first();
        return View::make("yonetim.birim_hepsi",$veri);
    }


    public function bostaurunler()
    {
        $veri["urunler"] = Urun::where('kayit', 0)->get();
        return View::make("yonetim.bostaurunler",$veri);
    }





    // Anasayfadaki arıza kayıtları işlemleri
    public function kayitgir_post()
    {
        $kayit = new Kayit();
        $oda = Oda::where('oda_birlikte',Input::get("oda_no"))->first();
        if (count($oda)>0) {
           $kayit->oda_id = $oda->id;
        }
        $kayit->kayit = Input::get("kayit");
        $kayit->durum = 0;
        $kayit->save();

        return Redirect::route('index');
    }


    public function kayitsil($id)
    {
        $kayit = Kayit::findOrFail($id);
        $kayit->delete();

        return Redirect::route('index')->with("success", "Kayıt Silinmiştir.");
    }


    public function aciklamakaydet($id)
    {
        $kayit = Kayit::findOrFail($id);
        $kayit->aciklama = Input::get("aciklama");
        $kayit->durum = Input::get("durum");
        $kayit->save();
        return Redirect::route('index');
    }

    public function aciklamaduzenle($id)
    {
        $kayit = Kayit::findOrFail($id);
        $kayit->kayit = Input::get("kayit");
        $kayit->aciklama = Input::get("aciklama");
        $kayit->durum = Input::get("durum");
        $kayit->save();
        return Redirect::route('index');
    }


    // excel işlemleri
    public function excel()
    {
        return View::make("yonetim.excel");
    }


    public function zimmetFisiTarama()
    {
        $gecmis = OdaUrunGecmis::findOrFail(Input::get("gecmis_id"));
        if (Input::hasFile("zimmet_fisi")) {
           
           $file = Input::file("zimmet_fisi");
           $destinationPath = "assets/zimmet_fisleri/";
           $archivo = value(function() use ($file, $gecmis){
                $filename = $gecmis->id.".".$file->getClientOriginalExtension();
                return strtolower($filename);
           });

           Input::file("zimmet_fisi")->move($destinationPath,$archivo);
        }
        $gecmis->zimmetFisiTarama = $archivo;
        $gecmis->save();

        return Redirect::route('uruntiklama', $gecmis->urun->seri_no)->with("success", "Ürün Geçmişi Kaydına Fotoğraf Başarıyla EKLENDİ.");
    }

    public function zimmetFisiSil($id)
    {
        $gecmis = OdaUrunGecmis::findOrFail($id);
        $path = "assets/zimmet_fisleri/";
        File::delete($path.$gecmis->zimmetFisiTarama);
        $gecmis->zimmetFisiTarama = NULL;
        $gecmis->save();

        return Redirect::route('uruntiklama', $gecmis->urun->seri_no)->with("success", "Ürün Geçmişi Kaydına Ait Fotoğraf SİLİNDİ.");
    }

    public function urunGecmisSil($id)
    {
        $gecmis = OdaUrunGecmis::findOrFail($id);
        $path = "assets/zimmet_fisleri/";
        File::delete($path.$gecmis->zimmetFisiTarama);
        $gecmis->delete();

        return Redirect::route('uruntiklama', $gecmis->urun->seri_no)->with("success", "Ürün Geçmişi Kaydı SİLİNDİ.");
    }


    public function dusum_listesine_ekle_post()
    {

        $urun = Urun::where('seri_no',Input::get("seri_no"))->first();
        if (count($urun)>0) {
            $kayitlimi = DusumListesi::where('urun_id',$urun->id)->first();
            if (count($kayitlimi)>0) {
                return Redirect::route('dusum_listesine_ekle')->with("danger", $urun->seri_no." seri numaralı ürün daha önceden düşüm listesine eklenmiş.");
            }else{

                $odaurun = OdaUrun::where("urun_id", $urun->id)->first();

                $urun->kayit = 2;
                if (count($odaurun)>0) {

                    Log::debug('<b>'.$odaurun->urun->seri_no.'</b> seri numaralı ürün <b>'.$odaurun->oda->oda_birlikte.'</b> numaralı <b>'.$odaurun->oda->birim->birim_adi.' '.$odaurun->oda->aciklama.'</b> odasından <b>DÜŞÜM LİSTESİNE ALINDIĞI İÇİN SİLİNDİ</b>. Silen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');
                
                    $odaurun->delete();
                }

                $kayit = new DusumListesi();
                $kayit->urun_id = $urun->id;
                $kayit->aciklama = Input::get("aciklama");
                $kayit->save();

                $urun->durumu = 1;
                $urun->save();

                $oda_gecmis = new OdaUrunGecmis();
                $oda_gecmis->urun_id = $urun->id;
                $oda_gecmis->oda_birlikte = "Düşüm Listesi";
                $oda_gecmis->birim = "Ürün Düşüm Listesine Alınmıştır.";
                $oda_gecmis->save();

                return Redirect::route('dusum_listesine_ekle')->with("success", $urun->seri_no." Seri Numaralı Ürün Düşüm Listesine Eklendi.");
            } 
        }else{
            return Redirect::route('dusum_listesine_ekle')->with("danger", "Girdiğiniz seri numarası kayıtlı değil.");
        }
    }

    public function dusum_listesine_ekle()
    {
        $veri["kayitlar"] = DusumListesi::all();
        return View::make("yonetim.dusum_listesi",$veri);
    }

    public function dusum_sil($id)
    {
        $kayit = DusumListesi::findOrFail($id);
        $urun = Urun::where('id',$kayit->urun_id)->first();
        $urun->kayit = 0;
        $urun->save();
        $kayit->delete();

        return Redirect::route('dusum_listesine_ekle')->with("success", "Ürün Düşüm Listesinden Çıkarıldı.");
    }


    public function tum_ariza_kayitlari()
    {
        $veri["tumkayitlar"] = UrunAriza::orderBy("id","DESC")->get();
        return View::make("yonetim.tum_ariza_kayitlari",$veri);
    }


    public function tum_ariza_kayitlari_excel()
    {
        $veri["tumkayitlar"] = UrunAriza::orderBy("id","DESC")->get();

        Excel::create('TÜM ARIZA KAYITLARI', function($excel) use ($veri) {
            $excel->sheet('KAYITLAR', function($sheet) use ($veri) {
                $sheet->loadView('excel.tum_ariza_kayitlari_excel', $veri);
            });
        })->export('xls');
    }

}



