<?php

class SmController extends Controller {

    //Sarf Malzeme Tür İşlemleri
    public function sm_tur_ekle()
    {
        return View::make("yonetim.sarf_malzeme.sm_tur_ekle");
    }

    public function sm_tur_ekle_post()
    {
        $smturkontrol = SmTur::where('sm_tur_adi',Input::get("sm_tur_adi"))->first();

        if (count($smturkontrol)>0) {
            return Redirect::route('sm_tur_ekle')->with("danger", $smturkontrol->sm_tur_adi." adlı Sarf Malzeme Türü daha önce kaydedilmiş.");
        }else{
            $smtur = new SmTur();
            $smtur->sm_tur_adi = Input::get("sm_tur_adi");
            $smtur->save();

            return Redirect::route('sm_tur_ekle')->with("success",$smtur->sm_tur_adi." adlı Sarf Malzeme Türü eklendi.");
        }  
    }

    public function sm_turler()
    {
        $veri["sm_turler"] = SmTur::orderBy("sm_tur_adi","ASC")->get();
        return View::make("yonetim.sarf_malzeme.sm_turler",$veri);
    }

    public function sm_tur_duzenle($id=NULL)
    {
        $veri["sm_tur"] = SmTur::where('id',$id)->first();
        return View::make("yonetim.sarf_malzeme.sm_tur_duzenle", $veri);
    }

    public function sm_tur_duzenle_post($id)
    {
        $sm_tur = SmTur::findOrFail($id);
        $varmi = SmTur::where('sm_tur_adi',Input::get("sm_tur_adi"))->first();
        if (count($varmi)>0) {
            return Redirect::route("sm_turler")->with("info","Sarf Malzeme Türü mevcut.");    
        }else{
            $sm_tur->sm_tur_adi = Input::get("sm_tur_adi");
            $sm_tur->save();

            return Redirect::route('sm_turler')->with("success",$sm_tur->sm_tur_adi." adlı Sarf Malzeme Türü güncellendi.");
        }
    }

    public function sm_tur_sil($id)
    {
        $sm_tur = SmTur::findOrFail($id);
        $sm_altturler = SmAlttur::where("sm_tur_id", $id)->get();

        foreach ($sm_altturler as $sm_alttur) {

            $smurunler = SmUrun::where("sm_alttur_id", $sm_alttur->id)->get();

            foreach ($smurunler as $smurun) {

                $kayitlar = SmTakip::where('sm_gelen_id', $smurun->id)->orWhere('sm_giden_id', $smurun->id)->get();

                foreach ($kayitlar as $kayit) {
                    $kayit->delete();
                }
                $smurun->delete();
            }

            $sm_alttur->delete();
        }

        $sm_tur->delete();

        return Redirect::route("sm_turler")->with("success","Sarf Malzeme Türü, alttürü, bağlı ürünler ve kayıtlar başarıyla silindi.");
    }



    //Sarf Malzeme Alttür İşlemleri
    public function sm_alttur_ekle()
    {
        $veri["sm_turler"] = SmTur::orderBy("sm_tur_adi","ASC")->get();
        return View::make("yonetim.sarf_malzeme.sm_alttur_ekle",$veri);
    }
    
    public function sm_alttur_ekle_post()
    {
        $sm_alttur_kontrol = SmAlttur::where('sm_alttur_adi',Input::get("sm_alttur_adi"))->first();

        if (count($sm_alttur_kontrol)>0) {
            return Redirect::route('sm_alttur_ekle')->with("danger", $sm_alttur_kontrol->sm_alttur_adi." adlı Sarf Malzeme Alttürü daha önce kaydedilmiş.");
        }else{
            $sm_alttur = new SmAlttur();
            $sm_alttur->sm_tur_id = Input::get("sm_tur_id");
            $sm_alttur->sm_alttur_adi = Input::get("sm_alttur_adi");
            $sm_alttur->save();

            return Redirect::route('sm_alttur_ekle')->with("success",$sm_alttur->sm_alttur_adi." adlı Sarf Malzeme Alttürü eklendi.");
        }
    }

    public function sm_altturler()
    {
        $veri["sm_altturler"] = SmAlttur::orderBy("sm_tur_id","ASC")->orderBy("sm_alttur_adi","ASC")->get();
        return View::make("yonetim.sarf_malzeme.sm_altturler",$veri);
    }


    public function sm_alttur_duzenle($id=NULL)
    {
        $veri["sm_turler"] = SmTur::orderBy("sm_tur_adi","ASC")->get();
        $veri["sm_alttur"] = SmAlttur::where('id',$id)->first();
        return View::make("yonetim.sarf_malzeme.sm_alttur_duzenle", $veri);
    }

    public function sm_alttur_duzenle_post($id)
    {
        $sm_alttur = SmAlttur::findOrFail($id);
        $varmi = SmAlttur::where('sm_alttur_adi',Input::get("sm_alttur_adi"))->first();
        if (count($varmi)>0) {
            if ($varmi->id == $sm_alttur->id) {
                $sm_alttur->sm_tur_id = Input::get("sm_tur_id");
                $sm_alttur->save();
                return Redirect::route("sm_altturler")->with("success",Input::get("sm_alttur_adi")." isimli Sarf Malzeme Alttürün, Türü Güncellendi.");
            }else{
                return Redirect::route("sm_altturler")->with("danger",Input::get("sm_alttur_adi")." isimli Sarf Malzeme Alttürü zaten kayıtlı.");
            }    
        }else{
            $sm_alttur->sm_alttur_adi = Input::get("sm_alttur_adi");
            $sm_alttur->sm_tur_id = Input::get("sm_tur_id");
            $sm_alttur->save();

            return Redirect::route('sm_altturler')->with("success",$sm_alttur->sm_alttur_adi." isimli Sarf Malzeme Alttürü güncellendi.");
        }

    }

    public function sm_alttur_sil($id)
    {
        $smalttur = SmAlttur::findOrFail($id);

        $smurunler = SmUrun::where("sm_alttur_id", $smalttur->id)->get();

        foreach ($smurunler as $smurun) {

            $kayitlar = SmTakip::where('sm_gelen_id', $smurun->id)->orWhere('sm_giden_id', $smurun->id)->get();

            foreach ($kayitlar as $kayit) {
                $kayit->delete();
            }
            $smurun->delete();
        }

        $smalttur->delete();

        return Redirect::route("sm_altturler")->with("success","Sarf Malzeme Alttürü, bağlı ürünler ve kayıtlar başarıyla silindi.");
    }




    //Sarf Malzeme Ürün İşlemleri
    public function sm_urun_ekle()
    {
        $veri["sm_altturler"] = SmAlttur::orderBy("sm_tur_id","DESC")->get();
        return View::make("yonetim.sarf_malzeme.sm_urun_ekle",$veri);
    }

    public function sm_urun_ekle_post()
    {
        $urunkontrol = SmUrun::where('sm_urun_serino',Input::get("sm_urun_serino"))->first();

        if (count($urunkontrol)>0) {
            return Redirect::route('sm_urun_ekle')->with("danger", $urunkontrol->sm_urun_serino." seri nolu sarf malzeme daha önce kaydedilmiş.");
        }else{
            $sm_urun = new SmUrun();
            $sm_urun->sm_urun_serino = Input::get("sm_urun_serino");
            $sm_urun->sm_alttur_id = Input::get("sm_alttur_id");
            $sm_urun->sm_urun_durumu = Input::get("sm_urun_durumu");
            $sm_urun->sm_birim_id = 0;
            $sm_urun->save();

            return Redirect::route('sm_urun_ekle')->with("success",$sm_urun->sm_urun_serino." seri numaralı sarf malzeme kaydedildi.");
        }
    }

    public function sm_urunler()
    {
        $veri["sm_urunler"] = SmUrun::orderBy("sm_alttur_id","ASC")->get();
        return View::make("yonetim.sarf_malzeme.sm_urunler",$veri);
    }

    public function sm_urun_duzenle($id=NULL)
    {
        $veri["sm_altturler"] = SmAlttur::orderBy("sm_tur_id","DESC")->get();
        $veri["sm_urun"] = SmUrun::where('id',$id)->first();
        return View::make("yonetim.sarf_malzeme.sm_urun_duzenle", $veri);
    }

    public function sm_urun_duzenle_post($id)
    {
        $urun = SmUrun::findOrFail($id);
        $varmi = SmUrun::where('sm_urun_serino',Input::get("sm_urun_serino"))->first();
        if (count($varmi)>0) {
            if ($varmi->id == $urun->id) {
                $urun->sm_alttur_id = Input::get("sm_alttur_id");
                $urun->sm_urun_durumu = Input::get("sm_urun_durumu");
                $urun->save();
                return Redirect::route("sm_urunler")->with("success",Input::get("sm_urun_serino")." seri numaralı Sarf Malzeme Güncellendi.");
            }else{
                return Redirect::route("sm_urunler")->with("danger",Input::get("sm_urun_serino")." seri numaralı Sarf Malzeme zaten kayıtlı.");
            }    
        }else{
            $urun->sm_urun_serino = Input::get("sm_urun_serino");
            $urun->sm_alttur_id = Input::get("sm_alttur_id");
            $urun->sm_urun_durumu = Input::get("sm_urun_durumu");
            $urun->save();

            return Redirect::route('sm_urunler')->with("success",$urun->sm_urun_serino." seri numaralı Sarf Malzeme güncellendi.");
        }
    }

    public function sm_urun_sil($id)
    {
        $sm_urun = SmUrun::findOrFail($id);
        $kayitlar = SmTakip::where('sm_gelen_id', $sm_urun->id)->orWhere('sm_giden_id', $sm_urun->id)->get();

        foreach ($kayitlar as $kayit) {
            $kayit->delete();
        }
        $sm_urun->delete();
        
        return Redirect::route("sm_urunler")->with("success","Sarf Malzeme ve bağlı kayıtlar başarıyla silindi.");
    }





    public function sm_urun_ara()
    {
        return View::make("yonetim.sarf_malzeme.sm_urun_ara");
    }

    public function sm_urun_ara_post()
    {
        $sm_urun = SmUrun::where('sm_urun_serino', Input::get("sm_urun_serino"))->first();
        if (count($sm_urun)>0) {
            $veri["sm_urun"] = $sm_urun;
            $veri["sm_urun_kayitlar"] = SmTakip::where('sm_gelen_id', $sm_urun->id)->orWhere('sm_giden_id', $sm_urun->id)->orderBy("id","DESC")->get();
            return View::make("yonetim.sarf_malzeme.sm_urun_detay",$veri);
        }else {
            return Redirect::route('sm_urun_ara')->with("danger", "ARADIĞINIZ SARF MALZEME BULUNAMAMIŞTIR.");
        }
    }

    public function sm_urun_tiklama($serino)
    {
        $sm_urun = SmUrun::where('sm_urun_serino', $serino)->first();
        if (count($sm_urun)>0) {
            $veri["sm_urun"] = $sm_urun;
            $veri["sm_urun_kayitlar"] = SmTakip::where('sm_gelen_id', $sm_urun->id)->orWhere('sm_giden_id', $sm_urun->id)->orderBy("id","DESC")->get();
            return View::make("yonetim.sarf_malzeme.sm_urun_detay",$veri);
        }else {
            return Redirect::route('sm_urun_ara')->with("danger", "ARADIĞINIZ SARF MALZEME BULUNAMAMIŞTIR.");
        }
    }

    public function sm_kayit_ekle()
    {
        $veri["ustbirimler"] = UstBirim::orderBy("ust_birim_adi","ASC")->get();
        return View::make("yonetim.sarf_malzeme.sm_kayit_ekle",$veri);
    }

    public function sm_kayit_ekle_post()
    {
        $sm_gelen = SmUrun::where('sm_urun_serino', Input::get("sm_gelen_serino"))->first();
        $sm_giden = SmUrun::where('sm_urun_serino', Input::get("sm_giden_serino"))->first();

        if (count($sm_gelen) > 0) {
            if (count($sm_giden) > 0) {

                    $sm_kayit = new SmTakip();
                    $sm_kayit->sm_gelen_id = $sm_gelen->id;
                    $sm_kayit->sm_giden_id = $sm_giden->id;
                    $sm_kayit->sm_birim_id = Input::get("sm_birim_id");
                    $sm_kayit->sm_bagli_serino = Input::get("sm_bagli_serino");
                    $sm_kayit->sm_bagli_sayfasayisi = Input::get("sm_bagli_sayfasayisi");

                    $gelenurun = SmUrun::findOrFail($sm_gelen->id);
                    $gelenurun->sm_birim_id = 0;
                    $gelenurun->sm_urun_durumu = 1;
                    $gelenurun->save();

                    $gidenurun = SmUrun::findOrFail($sm_giden->id);
                    $gidenurun->sm_birim_id = Input::get("sm_birim_id");
                    $gidenurun->sm_urun_durumu = 0;
                    $gidenurun->save();

                    $sm_kayit->save();

                    return Redirect::route('sm_kayit_ekle')->with("success", "KAYIT BAŞARIYLA OLUŞTURULDU.");
                
            }else{
                return Redirect::route('sm_kayit_ekle')->with("danger", "GİDEN Seri Numaralı Sarf Malzeme Kayıtlı Değil. Önce Kaydedin.");
            }
        }else{
            return Redirect::route('sm_kayit_ekle')->with("danger", "GELEN Seri Numaralı Sarf Malzeme Kayıtlı Değil. Önce Kaydedin.");
        }
    }

    public function sm_tum_kayitlar()
    {
        $veri["sm_tum_kayitlar"] = SmTakip::orderBy("created_at","DESC")->get();
        return View::make("yonetim.sarf_malzeme.sm_tum_kayitlar",$veri);
    }

    public function sm_kayit_sil($id)
    {
        $kayit = SmTakip::findOrFail($id);
        $kayit->delete();
        
        return Redirect::route("sm_tum_kayitlar")->with("success","Kayıt Başarıyla Silindi.");
    }

    public function sm_sorgu()
    {
        return View::make("yonetim.sarf_malzeme.sm_sorgu");
    }

    public function sm_birim_sorgula()
    {
        $veri["ustbirimler"] = UstBirim::orderBy("ust_birim_adi","ASC")->get();
        return View::make("yonetim.sarf_malzeme.sm_birim_sorgula",$veri);
    }

    public function sm_birim_sorgula_post()
    {
        $veri['tumkayitlar'] = SmTakip::where('sm_birim_id', Input::get("sm_birim_id"))->orderBy("created_at","DESC")->get();
        $veri['birimdekismler'] = SmUrun::where('sm_birim_id', Input::get("sm_birim_id"))->orderBy("created_at","DESC")->get();
        $veri['birim'] = Birim::where('id', Input::get("sm_birim_id"))->first();
        return View::make("yonetim.sarf_malzeme.sm_birim_sorgula_sonucu",$veri);
    }

    public function sm_birimde_sorgulama($id)
    {
        $veri['tumkayitlar'] = SmTakip::where('sm_birim_id', $id)->orderBy("created_at","DESC")->get();
        $veri['birimdekismler'] = SmUrun::where('sm_birim_id', $id)->orderBy("created_at","DESC")->get();
        $veri['birim'] = Birim::where('id', $id)->first();
        return View::make("yonetim.sarf_malzeme.sm_birim_sorgula_sonucu",$veri);
    }

    public function sm_depo_durumu()
    {
        $veri["calisansm"] = SmUrun::where('sm_birim_id', "0")->where('sm_urun_durumu', "0")->orderBy("sm_alttur_id","ASC")->get();
        $veri["arizalism"] = SmUrun::where('sm_birim_id', "0")->where('sm_urun_durumu', "1")->orderBy("sm_alttur_id","ASC")->get();
        return View::make("yonetim.sarf_malzeme.sm_depo_durumu",$veri);
    }

    public function sm_model_sorgula()
    {
        $veri["smturler"] = SmTur::orderBy("sm_tur_adi","ASC")->get();
        return View::make("yonetim.sarf_malzeme.sm_model_sorgula",$veri);
    }

    public function sm_model_sorgula_post()
    {
        $veri['modelurunler'] = SmUrun::where('sm_alttur_id', Input::get("sm_alttur_id"))->orderBy("created_at","DESC")->get();
        $veri['alttur'] = SmAlttur::where('id', Input::get("sm_alttur_id"))->first();
        return View::make("yonetim.sarf_malzeme.sm_model_sorgula_sonucu",$veri);
    }

    public function sm_secili_tur($id=NULL){
        $veri['altturler'] = SmAlttur::where("sm_tur_id",$id)->get();
        return View::make("yonetim.sarf_malzeme.altturler",$veri);
    }

    public function secili_ust_birim($id=NULL){
        $veri['birimler'] = Birim::where("ust_birim_id",$id)->get();
        return View::make("yonetim.sarf_malzeme.birimler",$veri);
    }

    public function sm_birim_sayilari()
    {
        $veri["smbirimsayilari"] = SmTakip::where("sm_birim_id", "<>" , "0")->select('sm_birim_id', DB::raw('count(*) as toplam'))->groupBy('sm_birim_id')->orderBy("toplam","DESC")->get();
        return View::make("yonetim.sarf_malzeme.sm_birim_sayilari",$veri);
    }



    public function smexcel()
    {
        if (Auth::user()->yonetici_tip == "1") {
            $veri["urunler"] = SmUrun::orderBy("sm_alttur_id","ASC")->get();

            Excel::create('Envanter Takip Sistemi Sarf Malzemeler', function($excel) use ($veri) {
                $excel->sheet('Sarf Malzemeler', function($sheet) use ($veri) {
                    $sheet->loadView('yonetim.sarf_malzeme.excel.sm_tum_urunler', $veri);
                });
            })->export('xls');
        }else{
            return View::make("yonetim.403");
        }
    }

    public function smexcelkayitlar()
    {
        if (Auth::user()->yonetici_tip == "1") {
            $veri["kayitlar"] = SmTakip::orderBy("created_at","DESC")->get();

            Excel::create('Envanter Takip Sistemi Tüm Sarf Malzeme Kayıtları', function($excel) use ($veri) {
                $excel->sheet('Tüm Sarf Malzeme Kayıtları', function($sheet) use ($veri) {
                    $sheet->loadView('yonetim.sarf_malzeme.excel.sm_tum_kayitlar', $veri);
                });
            })->export('xls');
        }else{
            return View::make("yonetim.403");
        }
    }

}