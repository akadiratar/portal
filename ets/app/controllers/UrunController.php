<?php

class UrunController extends Controller {

    //marka işlemleri
    public function marka_ekle()
    {
        return View::make("yonetim.urun.marka_ekle");
    }

    public function marka_ekle_post()
    {
        $markakontrol = Marka::where('marka_adi',Input::get("marka_adi"))->first();

        if (count($markakontrol)>0) {
            return Redirect::route('marka_ekle')->with("danger", $markakontrol->marka_adi." adlı marka daha önce kaydedilmiş.");
        }else{
            $marka = new Marka();
            $marka->marka_adi = Input::get("marka_adi");
            $marka->save();

            return Redirect::route('marka_ekle')->with("success",$marka->marka_adi." adlı marka eklendi.");
        }  
    }

    public function markalar()
    {
        $veri["markalar"] = Marka::orderBy("marka_adi","ASC")->get();
        return View::make("yonetim.urun.markalar",$veri);
    }

    public function marka_duzenle($id=NULL)
    {
        $veri["marka"] = Marka::where('id',$id)->first();
        return View::make("yonetim.urun.marka_duzenle", $veri);
    }

    public function marka_duzenle_post($id)
    {
        $marka = Marka::findOrFail($id);
        $varmi = Marka::where('marka_adi',Input::get("marka_adi"))->first();
        if (count($varmi)>0) {
            return Redirect::route("markalar")->with("info","Marka mevcut.");    
        }else{
            $marka->marka_adi = Input::get("marka_adi");
            $marka->save();

            return Redirect::route('markalar')->with("success",$marka->marka_adi." adlı Marka güncellendi.");
        }

    }

    public function marka_sil($id)
    {
        $marka = Marka::findOrFail($id);
        $modeller = Model::where("marka_id", $id)->get();

        foreach ($modeller as $model) {

            $urunler = Urun::where("model_id", $model->id)->get();

            foreach ($urunler as $urun) {

                $odasi = OdaUrun::where("urun_id", $urun->id)->get();

                foreach ($odasi as $oda) {

                    Log::debug('<b>'.$urun->seri_no.'</b> seri numaralı Ürün <b> MARKASI ve MODELİ SİLİNDİĞİ İÇİN '.$oda->oda->oda_birlikte.'</b> numaralı odadan <b>SİLİNDİ.</b> Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');
                    
                    $oda->delete();
                }

                $urungecmisi = OdaUrunGecmis::where("urun_id", $urun->id)->get();
                foreach ($urungecmisi as $gecmis) {
               
                    $gecmis->delete();
                }

                $kayit = DusumListesi::where("urun_id", $urun->id)->first();
                if (count($kayit)>0) {
                    $kayit->delete();
                }

                $arizakayitlari = UrunAriza::where("urun_id", $urun->id)->get();
                foreach ($arizakayitlari as $arizakayit) {
               
                    $arizakayit->delete();
                }

                Log::emergency('<b>'.$urun->seri_no.'</b> seri numaralı Ürün <b>MARKASI ve MODELİ SİLİNDİĞİ İÇİN SİLİNDİ</b>. Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');
                $urun->delete();
            }

            $model->delete();
        }

        $marka->delete();

        return Redirect::route("markalar")->with("success","Marka ve tüm alt kategorileri (modeller ve ürünler) silindi.");
    }


    //tür işlemleri
    public function tur_ekle()
    {
        return View::make("yonetim.urun.tur_ekle");
    }

    public function tur_ekle_post()
    {
        $turkontrol = Tur::where('tur_adi',Input::get("tur_adi"))->first();

        if (count($turkontrol)>0) {
            return Redirect::route('tur_ekle')->with("danger", $turkontrol->tur_adi." adlı tür daha önce kaydedilmiş.");
        }else{
            $tur = new Tur();
            $tur->tur_adi = Input::get("tur_adi");
            $tur->save();

            return Redirect::route('tur_ekle')->with("success",$tur->tur_adi." adlı tür eklendi.");
        }
    }

    public function turler()
    {
        $veri["turler"] = Tur::orderBy("tur_adi","ASC")->get();
        return View::make("yonetim.urun.turler",$veri);
    }

    public function tur_duzenle($id=NULL)
    {
        $veri["tur"] = Tur::where('id',$id)->first();
        return View::make("yonetim.urun.tur_duzenle", $veri);
    }

    public function tur_duzenle_post($id)
    {
        $tur = Tur::findOrFail($id);
        $varmi = Tur::where('tur_adi',Input::get("tur_adi"))->first();
        if (count($varmi)>0) {
            return Redirect::route("turler")->with("info","Tür mevcut.");    
        }else{
            $tur->tur_adi = Input::get("tur_adi");
            $tur->save();

            return Redirect::route('turler')->with("success",$tur->tur_adi." adlı Tür güncellendi.");
        }

    }

    public function tur_sil($id)
    {
        $tur = Tur::findOrFail($id);
        $modeller = Model::where("tur_id", $id)->get();

        foreach ($modeller as $model) {

            $urunler = Urun::where("model_id", $model->id)->get();

            foreach ($urunler as $urun) {

                $odasi = OdaUrun::where("urun_id", $urun->id)->get();

                foreach ($odasi as $oda) {

                    Log::debug('<b>'.$urun->seri_no.'</b> seri numaralı Ürün <b> TÜRÜ ve MODELİ SİLİNDİĞİ İÇİN '.$oda->oda->oda_birlikte.'</b> numaralı odadan <b>SİLİNDİ.</b> Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');
                    
                    $oda->delete();
                }

                $urungecmisi = OdaUrunGecmis::where("urun_id", $urun->id)->get();
                foreach ($urungecmisi as $gecmis) {
               
                    $gecmis->delete();
                }

                $kayit = DusumListesi::where("urun_id", $urun->id)->first();
                if (count($kayit)>0) {
                    $kayit->delete();
                }

                $arizakayitlari = UrunAriza::where("urun_id", $urun->id)->get();
                foreach ($arizakayitlari as $arizakayit) {
               
                    $arizakayit->delete();
                }

                Log::emergency('<b>'.$urun->seri_no.'</b> seri numaralı Ürün <b>TÜRÜ ve MODELİ SİLİNDİĞİ İÇİN SİLİNDİ</b>. Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');
                $urun->delete();
            }

            $model->delete();
        }

        $tur->delete();

        return Redirect::route("turler")->with("success","Tür ve tüm alt kategorileri (modeller ve ürünler) silindi.");
    }



    //model işlemleri
    public function model_ekle()
    {
        $veri["markalar"] = Marka::orderBy("marka_adi","ASC")->get();
        $veri["turler"] = Tur::orderBy("tur_adi","ASC")->get();
        return View::make("yonetim.urun.model_ekle",$veri);
    }
    
    public function model_ekle_post()
    {
        $modelkontrol = Model::where('model_adi',Input::get("model_adi"))->first();

        if (count($modelkontrol)>0) {
            return Redirect::route('model_ekle')->with("danger", $modelkontrol->model_adi." adlı model daha önce kaydedilmiş.");
        }else{
            $model = new Model();
            $model->marka_id = Input::get("marka_id");
            $model->tur_id = Input::get("tur_id");
            $model->model_adi = Input::get("model_adi");
            $model->serino_ornek = Input::get("serino_ornek");
            $model->save();

            return Redirect::route('model_ekle')->with("success",$model->model_adi." adlı Model eklendi.");
        }
    }

    public function modeller()
    {
        $veri["modeller"] = Model::orderBy("tur_id","ASC")->orderBy("marka_id","ASC")->orderBy("model_adi","ASC")->get();
        return View::make("yonetim.urun.modeller",$veri);
    }


    public function model_duzenle($id=NULL)
    {
        $veri["markalar"] = Marka::orderBy("marka_adi","ASC")->get();
        $veri["turler"] = Tur::orderBy("tur_adi","ASC")->get();
        $veri["model"] = Model::where('id',$id)->first();
        return View::make("yonetim.urun.model_duzenle", $veri);
    }

    public function model_duzenle_post($id)
    {
        $model = Model::findOrFail($id);
        $varmi = Model::where('model_adi',Input::get("model_adi"))->first();
        if (count($varmi)>0) {
            if ($varmi->id == $model->id) {
                $model->tur_id = Input::get("tur_id");
                $model->marka_id = Input::get("marka_id");
                $model->serino_ornek = Input::get("serino_ornek");
                $model->save();
                return Redirect::route("modeller")->with("success",Input::get("model_adi")." isimli modelin Markası ve Türü Güncellendi.");
            }else{
                return Redirect::route("modeller")->with("danger",Input::get("model_adi")." isimli Model zaten kayıtlı.");
            }    
        }else{
            $model->model_adi = Input::get("model_adi");
            $model->tur_id = Input::get("tur_id");
            $model->marka_id = Input::get("marka_id");
            $model->serino_ornek = Input::get("serino_ornek");
            $model->save();

            return Redirect::route('modeller')->with("success",$model->model_adi." seri numaralı Ürün güncellendi.");
        }

    }

    public function model_sil($id)
    {
        $model = Model::findOrFail($id);

        $urunler = Urun::where("model_id", $model->id)->get();

        foreach ($urunler as $urun) {

            $odasi = OdaUrun::where("urun_id", $urun->id)->get();

            foreach ($odasi as $oda) {

                Log::debug('<b>'.$urun->seri_no.'</b> seri numaralı Ürün <b>MODELİ SİLİNDİĞİ İÇİN '.$oda->oda->oda_birlikte.'</b> numaralı odadan <b>SİLİNDİ.</b> Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');
                
                $oda->delete();
            }

            $urungecmisi = OdaUrunGecmis::where("urun_id", $urun->id)->get();
            foreach ($urungecmisi as $gecmis) {
           
                $gecmis->delete();
            }

            $kayit = DusumListesi::where("urun_id", $urun->id)->first();
            if (count($kayit)>0) {
                $kayit->delete();
            }

            $arizakayitlari = UrunAriza::where("urun_id", $urun->id)->get();
            foreach ($arizakayitlari as $arizakayit) {
           
                $arizakayit->delete();
            }

            Log::emergency('<b>'.$urun->seri_no.'</b> seri numaralı Ürün <b>MODELİ SİLİNDİĞİ İÇİN SİLİNDİ</b>. Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');
            $urun->delete();
        }

        $model->delete();

        return Redirect::route("modeller")->with("success","Model ve tüm alt kategorileri (ürünler) silindi.");
    }




    //ürün işlemleri
    public function urun_ekle()
    {
        $veri["modeller"] = Model::orderBy("tur_id","DESC")->orderBy("marka_id","DESC")->get();
        return View::make("yonetim.urun.urun_ekle",$veri);
    }

    public function urun_ekle_post()
    {
        $urunkontrol = Urun::where('seri_no',Input::get("seri_no"))->first();

        if (count($urunkontrol)>0) {
            return Redirect::route('urun_ekle')->with("danger", $urunkontrol->seri_no." seri nolu ürün daha önce kaydedilmiş.");
        }else{
            $urun = new Urun();
            $urun->kayit = 0;
            $urun->seri_no = Input::get("seri_no");
            $urun->model_id = Input::get("model_id");
            $urun->durumu = Input::get("durum");
            $urun->save();

            return Redirect::route('oda_urun')->with("info",$urun->seri_no." seri numaralı ürün eklendi. Odaya kaydını yapabilirsiniz.")->with("serinumarasi",$urun->seri_no);
        }
    }

    public function urunlergenel()
    {
        $veri["urunler"] = Urun::orderBy("model_id","ASC")->orderBy("seri_no","ASC")->get();
        return View::make("yonetim.urun.urunler_genel",$veri);
    }

    public function urun_duzenle($id=NULL)
    {
        $veri["modeller"] = Model::orderBy("tur_id","DESC")->orderBy("marka_id","DESC")->get();
        $veri["urun"] = Urun::where('id',$id)->first();
        return View::make("yonetim.urun.urun_duzenle", $veri);
    }

    public function urun_duzenle_post($id)
    {
        $urun = Urun::findOrFail($id);
        $varmi = Urun::where('seri_no',Input::get("seri_no"))->first();
        if (count($varmi)>0) {
            if ($varmi->id == $urun->id) {
                $urun->model_id = Input::get("model_id");
                $urun->durumu = Input::get("durum");
                $urun->save();
                return Redirect::route("urunlergenel")->with("success",Input::get("seri_no")." seri numaralı ürün Güncellendi.");
            }else{
                return Redirect::route("urunlergenel")->with("danger",Input::get("seri_no")." seri numaralı Ürün zaten kayıtlı.");
            }    
        }else{
            $urun->seri_no = Input::get("seri_no");
            $urun->model_id = Input::get("model_id");
            $urun->durumu = Input::get("durum");
            $urun->save();

            return Redirect::route('urunlergenel')->with("success",$urun->seri_no." seri numaralı Ürün güncellendi.");
        }

    }

    public function urun_sil($id)
    {
        $urun = Urun::findOrFail($id);
        $odasi = OdaUrun::where("urun_id", $urun->id)->get();
        

        foreach ($odasi as $oda) {

            Log::emergency('<b>'.$urun->seri_no.'</b> seri numaralı Ürün <b>SİLİNDİ. '.$oda->oda->oda_birlikte.'</b> numaralı odadaydı. Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');
            
            $oda->delete();
        }

        $urungecmisi = OdaUrunGecmis::where("urun_id", $urun->id)->get();
        foreach ($urungecmisi as $gecmis) {
       
            $gecmis->delete();
        }

        $kayit = DusumListesi::where("urun_id", $urun->id)->first();
        if (count($kayit)>0) {
            $kayit->delete();
        }

        $arizakayitlari = UrunAriza::where("urun_id", $urun->id)->get();
        foreach ($arizakayitlari as $arizakayit) {
       
            $arizakayit->delete();
        }
       

        if (count($odasi)>0) {
            $urun->delete();
        }else{
            Log::emergency('<b>'.$urun->seri_no.'</b> seri numaralı Ürün <b>SİLİNDİ</b>. Yönetici: <b>'.Auth::User()->yonetici_adi.'</b>');
            $urun->delete();
        }
        
        return Redirect::route("urunlergenel")->with("success","Ürün Silindi.");
    }

}