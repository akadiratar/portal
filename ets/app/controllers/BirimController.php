<?php

class BirimController extends Controller {

    //BİRİM TİPİ İŞLEMLERİ
    public function birim_tipi_ekle()
    {
        return View::make("yonetim.birim_tip");
    }

    public function birim_tipi_ekle_post()
    {
        $birimtip = BirimTip::where('tip_adi',Input::get("tip_adi"))->first();

        if (count($birimtip)>0) {
            return Redirect::route('birim_tipi_ekle')->with("danger", $birimtip->tip_adi." adlı Birim Tipi daha önce kaydedilmiş.");
        }else{
            $birimtip = new BirimTip();
            $birimtip->tip_adi = Input::get("tip_adi");
            $birimtip->save();

            return Redirect::route('birim_tipi_ekle')->with("success",$birimtip->tip_adi." adlı Birim Tipi eklendi.");
        }  
    }

    public function birim_tipleri()
    {
        $veri["birimtipleri"] = BirimTip::orderBy("tip_adi","ASC")->get();
        return View::make("yonetim.birim_tipleri", $veri);
    }

    public function birimtip_duzenle($id=NULL)
    {
        $veri["birimtip"] = BirimTip::where('id',$id)->first();
        return View::make("yonetim.birimtip_duzenle", $veri);
    }

    public function birimtip_duzenle_post($id)
    {
        $birimtip = BirimTip::findOrFail($id);
        $varmi = BirimTip::where('tip_adi',Input::get("tip_adi"))->first();
        if (count($varmi)>0) {
            return Redirect::route("birim_tipleri")->with("info","Birim Tipi mevcut.");    
        }else{
            $birimtip->tip_adi = Input::get("tip_adi");
            $birimtip->save();

            return Redirect::route('birim_tipleri')->with("success",$birimtip->tip_adi." adlı Birim Tipi güncellendi.");
        }

    }

    public function birimtip_sil($id)
    {

        $birimtip = BirimTip::findOrFail($id);
        $ustbirimler = UstBirim::where("tip_id", $id)->get();

        foreach ($ustbirimler as $ustbirim) {

            $birimler = Birim::where("ust_birim_id", $ustbirim->id)->get();

            foreach ($birimler as $birim) {

                $odalar = Oda::where("birim_id", $birim->id)->get();

                foreach ($odalar as $oda) {
                    
                    $odadakikayitlar = Kayit::where("oda_id", $oda->id)->get();
                    foreach ($odadakikayitlar as $odadakikayit) {
                        $odadakikayit->delete();
                    }


                    $odadakiurunler = OdaUrun::where("oda_id", $oda->id)->get();
                    foreach ($odadakiurunler as $odadakiurun) {

                        $urun = Urun::where("id", $odadakiurun->urun_id)->first();
                        $urun->kayit = 0;   //odadaki kayıtlı ürün odanın silinmesinden dolayı kayit 0 olarak değiştiriliyor.
                        $urun->save();

                        Log::debug('<b>'.$urun->seri_no.'</b> seri numaralı ürün <b>'.$odadakiurun->oda->oda_birlikte.'</b> numaralı odadan <b>BİRİM TİPİ, ÜST BİRİM, BİRİM ve ODA SİLİNDİĞİ İÇİN SİLİNDİ</b>. Silen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');

                        $odadakiurun->delete();
                    }

                    Log::notice('<b>'.$oda->oda_birlikte.'</b> numaralı <b>'.$oda->birim->birim_adi.' '.$oda->aciklama.'</b> odası <b>BİRİM TİPİ, ÜST BİRİMİ ve BİRİMİ SİLİNDİĞİ İÇİN SİLİNDİ</b>. Silen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');

                    $oda->delete();
                }

                $odadakisarfmalzemeler = SmTakip::where("sm_birim_id", $birim->id)->get();
                foreach ($odadakisarfmalzemeler as $odadakisarfmalzeme) {
                    $odadakisarfmalzeme->sm_birim_id = 0;
                    $odadakisarfmalzeme->save();
                }

                $odadakisarfmalzemeler2 = SmUrun::where("sm_birim_id", $birim->id)->get();
                foreach ($odadakisarfmalzemeler2 as $odadakisarfmalzeme) {
                    $odadakisarfmalzeme->sm_birim_id = 1;
                    $odadakisarfmalzeme->save();
                }

                Log::alert('<b>'.$birim->birim_adi.'</b> isimli birim <b>BİRİM TİPİ ve ÜST BİRİMİ SİLİNDİĞİ İÇİN SİLİNDİ</b>. Silen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');

                $birim->delete();
            }

            $ustbirim->delete();
        }

        $birimtip->delete();

        return Redirect::route("birim_tipleri")->with("success","Birim Tipi ve tüm alt kategorileri (üst birimler, üst birimlere bağlı birimler ve odalar) silindi.");
    }








    //üst birim işlemleri
    public function ust_birim_ekle()
    {
        $veri["tipler"] = BirimTip::orderBy("tip_adi","ASC")->get();
        return View::make("yonetim.ust_birim_ekle", $veri);
    }

    public function ust_birim_ekle_post()
    {
        $ustbirim = UstBirim::where('ust_birim_adi',Input::get("ust_birim_adi"))->where('tip_id',Input::get("tip_id"))->first();

        if (count($ustbirim)>0) {
            return Redirect::route('ust_birim_ekle')->with("danger", $ustbirim->ust_birim_adi." adlı üst birim daha önce kaydedilmiş.");
        }else{
            $ust_birim = new UstBirim();
            $ust_birim->tip_id = Input::get("tip_id");
            $ust_birim->ust_birim_adi = Input::get("ust_birim_adi");
            $ust_birim->save();

            return Redirect::route('ust_birim_ekle')->with("success",$ust_birim->ust_birim_adi." adlı üst birim eklendi.");
        }  
    }

    public function ust_birimler()
    {
        $veri["ustbirimler"] = UstBirim::orderBy("tip_id", "ASC")->orderBy("ust_birim_adi","ASC")->get();
        return View::make("yonetim.ust_birimler", $veri);
    }

    public function ustbirim_duzenle($id=NULL)
    {
        $veri["ustbirim"] = UstBirim::where('id',$id)->first();
        $veri["tipler"] = BirimTip::orderBy("tip_adi","ASC")->get();
        return View::make("yonetim.ustbirim_duzenle", $veri);
    }

    public function ustbirim_duzenle_post($id)
    {
        $ustbirim = UstBirim::findOrFail($id);
        $varmi = UstBirim::where('ust_birim_adi',Input::get("ust_birim_adi"))->where('tip_id',Input::get("tip_id"))->first();
        if (count($varmi)>0) {
            if ($varmi->id == $ustbirim->id) {
                $ustbirim->tip_id = Input::get("tip_id");
                $ustbirim->save();
                return Redirect::route("ust_birimler")->with("success","Üst birim güncellendi.");
            }else{
                return Redirect::route("ust_birimler")->with("info","Üst birim mevcut. Değişiklik yapılmadı.");
            }    
        }else{
            $ustbirim->tip_id = Input::get("tip_id");
            $ustbirim->ust_birim_adi = Input::get("ust_birim_adi");
            $ustbirim->save();

            return Redirect::route('ust_birimler')->with("success",$ustbirim->ust_birim_adi." adlı üst birim güncellendi.");
        }

    }

    public function ustbirim_sil($id)
    {
        $ustbirim = UstBirim::findOrFail($id);
        $birimler = Birim::where("ust_birim_id", $ustbirim->id)->get();

        foreach ($birimler as $birim) {

            $odalar = Oda::where("birim_id", $birim->id)->get();

            foreach ($odalar as $oda) {

                $odadakikayitlar = Kayit::where("oda_id", $oda->id)->get();
                foreach ($odadakikayitlar as $odadakikayit) {
                    $odadakikayit->delete();
                }

                $odadakiurunler = OdaUrun::where("oda_id", $oda->id)->get();
                foreach ($odadakiurunler as $odadakiurun) {

                    $urun = Urun::where("id", $odadakiurun->urun_id)->first();
                    $urun->kayit = 0;
                    $urun->save();

                    Log::debug('<b>'.$urun->seri_no.'</b> seri numaralı ürün <b>'.$odadakiurun->oda->oda_birlikte.'</b> numaralı odadan <b>ÜST BİRİM, BİRİM ve ODA SİLİNDİĞİ İÇİN SİLİNDİ</b>. Silen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');

                    $odadakiurun->delete();
                }

                Log::notice('<b>'.$oda->oda_birlikte.'</b> numaralı <b>'.$oda->birim->birim_adi.' '.$oda->aciklama.'</b> odası <b>ÜST BİRİMİ ve BİRİMİ SİLİNDİĞİ İÇİN SİLİNDİ</b>. Silen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');

                $oda->delete();
            }

            Log::alert('<b>'.$birim->birim_adi.'</b> isimli birim <b>ÜST BİRİMİ SİLİNDİĞİ İÇİN SİLİNDİ</b>. Silen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');

            $odadakisarfmalzemeler = SmTakip::where("sm_birim_id", $birim->id)->get();
            foreach ($odadakisarfmalzemeler as $odadakisarfmalzeme) {
                $odadakisarfmalzeme->sm_birim_id = 0;
                $odadakisarfmalzeme->save();
            }

            $odadakisarfmalzemeler2 = SmUrun::where("sm_birim_id", $birim->id)->get();
            foreach ($odadakisarfmalzemeler2 as $odadakisarfmalzeme) {
                $odadakisarfmalzeme->sm_birim_id = 1;
                $odadakisarfmalzeme->save();
            }

            $birim->delete();
        }

        $ustbirim->delete();

        return Redirect::route("ust_birimler")->with("success","Üst birim ve tüm alt kategorileri (üst birime bağlı birimler ve birimlere bağlı odalar) silindi.");
    }







    //birim işlemleri
    public function birim_ekle()
    {
        $veri["ustbirimler"] = UstBirim::orderBy("ust_birim_adi","ASC")->get();
        return View::make("yonetim.birim_ekle",$veri);
    }
    
    public function birim_ekle_post()
    {
        $birimkontrol = Birim::where('birim_adi',Input::get("birim_adi"))->first();

        if (count($birimkontrol)>0) {
            return Redirect::route('birim_ekle')->with("danger", $birimkontrol->birim_adi." adlı birim daha önce kaydedilmiş.");
        }else{
            $birim = new Birim();
            $birim->ust_birim_id = Input::get("ust_birim_id");
            $birim->birim_adi = Input::get("birim_adi");
            $birim->save();

            return Redirect::route('birim_ekle')->with("success",$birim->birim_adi." adlı birim eklendi.");
        } 
    }

    public function birimlergenel()
    {
        $veri["birimler"] = Birim::orderBy("ust_birim_id","ASC")->orderBy("id","ASC")->get();
        return View::make("yonetim.birimler_genel",$veri);
    }

    public function birim_duzenle($id=NULL)
    {
        $veri["ustbirimler"] = UstBirim::orderBy("ust_birim_adi","ASC")->get();
        $veri["birim"] = Birim::where('id',$id)->first();
        return View::make("yonetim.birim_duzenle", $veri);
    }

    public function birim_duzenle_post($id)
    {
        $birim = Birim::findOrFail($id);
        $varmi = Birim::where('birim_adi',Input::get("birim_adi"))->first();
        if (count($varmi)>0) {
            if ($varmi->id == $birim->id) {
                $birim->ust_birim_id = Input::get("ust_birim_id");
                $birim->save();
                return Redirect::route("birimlergenel")->with("success","Birim güncellendi.");
            }else{
                return Redirect::route("birimlergenel")->with("info","Birim mevcut. Değişiklik yapılmadı.");
            }
        }else{
            $birim->ust_birim_id = Input::get("ust_birim_id");
            $birim->birim_adi = Input::get("birim_adi");
            $birim->save();

            return Redirect::route('birimlergenel')->with("success",$birim->birim_adi." isimli birim güncellendi.");
        }

    }

    public function birim_sil($id)
    {
        $birim = Birim::findOrFail($id);
        $odalar = Oda::where("birim_id", $birim->id)->get();

        foreach ($odalar as $oda) {

            $odadakikayitlar = Kayit::where("oda_id", $oda->id)->get();
            foreach ($odadakikayitlar as $odadakikayit) {
                $odadakikayit->delete();
            }


            $odadakiurunler = OdaUrun::where("oda_id", $oda->id)->get();
            foreach ($odadakiurunler as $odadakiurun) {

                $urun = Urun::where("id", $odadakiurun->urun_id)->first();
                $urun->kayit = 0;
                $urun->save();

                Log::debug('<b>'.$urun->seri_no.'</b> seri numaralı ürün <b>'.$odadakiurun->oda->oda_birlikte.'</b> numaralı odadan <b>BİRİM ve ODA SİLİNDİĞİ İÇİN SİLİNDİ</b>. Silen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');

                $odadakiurun->delete();
            }

            Log::notice('<b>'.$oda->oda_birlikte.'</b> numaralı <b>'.$oda->birim->birim_adi.' '.$oda->aciklama.'</b> odası <b>BİRİMİ SİLİNDİĞİ İÇİN SİLİNDİ</b>. Silen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');

            $oda->delete();
        }

        Log::alert('<b>'.$birim->birim_adi.'</b> isimli birim <b>SİLİNDİ</b>. Silen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');

        $odadakisarfmalzemeler = SmTakip::where("sm_birim_id", $birim->id)->get();
        foreach ($odadakisarfmalzemeler as $odadakisarfmalzeme) {
            $odadakisarfmalzeme->sm_birim_id = 0;
            $odadakisarfmalzeme->save();
        }

        $odadakisarfmalzemeler2 = SmUrun::where("sm_birim_id", $birim->id)->get();
        foreach ($odadakisarfmalzemeler2 as $odadakisarfmalzeme) {
            $odadakisarfmalzeme->sm_birim_id = 1;
            $odadakisarfmalzeme->save();
        }

        $birim->delete();

        return Redirect::route("birimlergenel")->with("success","Birim ve birime bağlı odalar silindi.");
    }



    //oda işlemleri
    public function oda_ekle()
    {
        $veri["ustbirimler"] = UstBirim::orderBy("ust_birim_adi","ASC")->get();
        return View::make("yonetim.oda_ekle",$veri);
    }
    
    public function oda_ekle_post()
    {
        $odakontrol = Oda::where('oda_birlikte',Input::get("blok").Input::get("kat")."-".Input::get("oda_no"))->first();

        if (count($odakontrol)>0) {
            return Redirect::route('oda_ekle')->with("danger", $odakontrol->oda_birlikte." numaralı oda daha önce kaydedilmiş.");
        }else{
            $oda = new Oda();
            $oda->blok = Input::get("blok");
            $oda->kat = Input::get("kat");
            $oda->birim_id = Input::get("birim_id");
            $oda->oda_no = Input::get("oda_no");
            $oda->aciklama = Input::get("aciklama");
            $oda->oda_birlikte = Input::get("blok").Input::get("kat")."-".Input::get("oda_no");
            $oda->depokontrol = 0;
            $oda->save();

            return Redirect::route('oda_ekle')->with("success",$oda->oda_birlikte." numaralı oda kaydedildi.");
        } 
    }


    public function seciliustbirim($id=NULL){
        $veri['birimler'] = Birim::where("ust_birim_id",$id)->get();
        return View::make("ajax.birimler",$veri);
    }

    public function odalargenel()
    {
        $veri["odalar"] = Oda::orderBy("blok","ASC")->orderBy("kat","ASC")->orderBy("oda_no","ASC")->get();
        return View::make("yonetim.odalar_genel",$veri);
    }

    public function oda_duzenle($id=NULL)
    {  
        $secilioda = Oda::where('id',$id)->first();
        $secilibirim = Birim::where('id',$secilioda->birim_id)->first();
        $ustbirim = UstBirim::where('id',$secilibirim->ust_birim_id)->first();
        $veri["ustbirimler"] = UstBirim::orderBy("ust_birim_adi","ASC")->get();
        $veri["oda"] = Oda::where('id',$id)->first();
        $veri["birimler"] = Birim::where("ust_birim_id", $ustbirim->id)->get();
        return View::make("yonetim.oda_duzenle", $veri);
    }

    public function oda_duzenle_post($id)
    {
        $oda = Oda::findOrFail($id);
        $odadakiurunler = OdaUrun::where("oda_id", $oda->id)->get();
        $eskibirim = $oda->birim->birim_adi.' '.$oda->aciklama;
        $oda->birim_id = Input::get("birim_id");
        $oda->aciklama = Input::get("aciklama");
        $oda->save();


        foreach ($odadakiurunler as $odadakiurun) {

            $urun = OdaUrun::where("id", $odadakiurun->id)->first();
            $urun->birim_id = $oda->birim_id;
            $urun->save();
        }


        $son = Oda::findOrFail($oda->id);

        Log::warning('<b>'.$son->oda_birlikte.'</b> numaralı odanın <b>'.$eskibirim.'</b> olan birimi <b>'.$son->birim->birim_adi.' '.$son->aciklama.'</b> olarak <b>GÜNCELLENDİ</b>. Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');

        return Redirect::route('odalargenel')->with("success",$son->oda_birlikte." numaralı oda güncellendi.");
    }

    public function oda_sil($id)
    {
        $oda = Oda::findOrFail($id);

        $odadakikayitlar = Kayit::where("oda_id", $oda->id)->get();
        foreach ($odadakikayitlar as $odadakikayit) {
            $odadakikayit->delete();
        }

        $odadakiurunler = OdaUrun::where("oda_id", $oda->id)->get();
        foreach ($odadakiurunler as $odadakiurun) {

            $urun = Urun::where("id", $odadakiurun->urun_id)->first();
            $urun->kayit = 0;
            $urun->save();

            Log::debug('<b>'.$urun->seri_no.'</b> seri numaralı ürün <b>'.$odadakiurun->oda->oda_birlikte.'</b> numaralı <b>'.$odadakiurun->oda->birim->birim_adi.' '.$odadakiurun->oda->aciklama.'</b> odasından <b>ODA SİLİNDİĞİ İÇİN SİLİNDİ</b>. Silen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');

            $odadakiurun->delete();
        }

        Log::notice('<b>'.$oda->oda_birlikte.'</b> numaralı <b>'.$oda->birim->birim_adi.' '.$oda->aciklama.'</b> odası <b>SİLİNDİ</b>. Silen Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');

        $oda->delete();

        return Redirect::route("odalargenel")->with("success","Oda ve odadaki tüm kayıtlar silindi.");
    }

    public function oda_depo($id)
    {
        $oda = Oda::findOrFail($id);
        if ($oda->depokontrol == 0) {
            $oda->depokontrol=1;
        }elseif ($oda->depokontrol == 1) {
            $oda->depokontrol=0;
        }
        $oda->save();

        return Redirect::route('urunler',$oda->oda_birlikte)->with("success",$oda->oda_birlikte." numaralı oda depoya eklendi.");
    }

}