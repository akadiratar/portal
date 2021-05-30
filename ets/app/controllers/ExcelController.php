<?php

class ExcelController extends Controller {

    public function model_sayilari()
    {
        $veri["modeller"] = Urun::select('model_id', DB::raw('count(*) as toplam'))->groupBy('model_id')->get();
        $veri["urunler"] = OdaUrun::all();
        $veri["modellerinhepsi"] = Model::all();

        Excel::create('ETS Kayıtlı Model Sayıları', function($excel) use ($veri) {
            $excel->sheet('Modeller', function($sheet) use ($veri) {
                $sheet->loadView('excel.model_sayilari', $veri);
            });
        })->export('xls');
    }

    public function excel_oda_urunler($oda)
    {
        $girilenoda = Oda::where('oda_birlikte',$oda)->first();
        if (Auth::user()->yonetici_tip == "1") {
            $veri["urunler"] = OdaUrun::where('oda_id',$girilenoda->id)->get();
            $veri["girilenoda"] = Oda::where('oda_birlikte',$oda)->first();

            Excel::create($girilenoda->oda_birlikte.' Odasındaki Ürünler', function($excel) use ($veri) {
                $excel->sheet('Odadaki Ürünler', function($sheet) use ($veri) {
                    $sheet->loadView('excel.excel_oda_urunler', $veri);
                });
            })->export('xls');
        }else{
            return View::make("yonetim.403");
        }
    }

    public function excel_birim_urunler($birim)
    {
        $girilenbirim = Birim::where('id',$birim)->first();
        if (Auth::user()->yonetici_tip == "1") {
            $veri["odalar"] = Oda::where('birim_id',$birim)->where('depokontrol',"0")->get();
            $veri["urunler"] = OdaUrun::where('birim_id',$birim)->get();
            $veri["modeller"] = Model::orderBy("tur_id","ASC")->orderBy("marka_id","ASC")->get();
            $veri["birim"] = Birim::where('id',$birim)->first();

            Excel::create($girilenbirim->birim_adi.' Birimindeki Ürünler', function($excel) use ($veri) {
                $excel->sheet('Birimdeki Ürünler', function($sheet) use ($veri) {
                    $sheet->loadView('excel.excel_birim_urunler', $veri);
                });
            })->export('xls');
        }else{
            return View::make("yonetim.403");
        }
    }



    public function sistemyedegi()
    {
        if (Auth::user()->yonetici_tip == "1") {
            $veri["urunler"] = OdaUrun::orderBy("oda_id","ASC")->get();

            Excel::create('Envanter Takip Sistemi Tüm Kayıtlar', function($excel) use ($veri) {
                $excel->sheet('Sistem Yedeği', function($sheet) use ($veri) {
                    $sheet->loadView('excel.sistemyedegi', $veri);
                });
            })->export('xls');
        }else{
            return View::make("yonetim.403");
        }
    }


    public function zimmet_fisi($oda)
    {
        $girilenoda = Oda::where('oda_birlikte',$oda)->first();
            $veri["urunler"] = OdaUrun::where('oda_id',$girilenoda->id)->get();
            $veri["girilenoda"] = Oda::where('oda_birlikte',$oda)->first();
            $say = OdaUrun::where('oda_id',$girilenoda->id)->count();

            Excel::create($girilenoda->oda_birlikte.' Zimmet Fişi', function($excel) use ($veri,$say) {
                $excel->sheet('Zimmet Fişi', function($sheet) use ($veri,$say) {
                    $sheet->setAllBorders('thin');
                    $sheet->cell('A1:J1', function($cell){
                        $cell->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->cell('A2:C2', function($cell){
                        $cell->setBorder('thin','thin','none','thin');
                    });
                    $sheet->cell('D2:J2', function($cell){
                        $cell->setBorder('thin','thin','none','thin');
                    });
                    $sheet->cell('A3:C3', function($cell){
                        $cell->setBorder('none','thin','thin','thin');
                    });
                    $sheet->cell('D3:J3', function($cell){
                        $cell->setBorder('none','thin','thin','thin');
                    });
                    $sheet->cell('A4:J4', function($cell){
                        $cell->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->cell('A5', function($cell){
                        $cell->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->cell('B5:D5', function($cell){
                        $cell->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->cell('E5:G5', function($cell){
                        $cell->setBorder('thin','thin','thin','thin');
                    });
                    $sheet->cell('H5:J5', function($cell){
                        $cell->setBorder('thin','thin','thin','thin');
                    });
                    $say1=$say+6;
                    $sheet->cell('A'.$say1.':J'.$say1, function($cell){
                        $cell->setBorder('none','thin','none','thin');
                    });
                    $say2=$say+7;
                    $sheet->cell('A'.$say2.':J'.$say2, function($cell){
                        $cell->setBorder('none','thin','none','thin');
                    });
                    $say3=$say+8;
                    $sheet->cell('A'.$say3.':H'.$say3, function($cell){
                        $cell->setBorder('none','none','none','thin');
                    });

                    $sheet->cell('I'.$say3.':J'.$say3, function($cell){
                        $cell->setBorder('none','thin','none','none');
                    });

                    $say4=$say+9;
                    $sheet->cell('A'.$say4.':J'.$say4, function($cell){
                        $cell->setBorder('none','thin','none','thin');
                    });

                    $say5=$say+10;
                    $sheet->cell('A'.$say5.':E'.$say5, function($cell){
                        $cell->setBorder('none','none','none','thin');
                    });

                    $sheet->cell('F'.$say5.':J'.$say5, function($cell){
                        $cell->setBorder('none','thin','none','none');
                    });

                    $say6=$say+11;
                    $sheet->cell('A'.$say6, function($cell){
                        $cell->setBorder('none','none','none','thin');
                    });

                    $sheet->cell('B'.$say6.':E'.$say6, function($cell){
                        $cell->setBorder('none','none','none','none');
                    });

                    $sheet->cell('F'.$say6, function($cell){
                        $cell->setBorder('none','none','none','none');
                    });

                    $sheet->cell('G'.$say6.':J'.$say6, function($cell){
                        $cell->setBorder('none','thin','none','none');
                    });

                    $say7=$say+12;
                    $sheet->cell('A'.$say7, function($cell){
                        $cell->setBorder('none','none','none','thin');
                    });

                    $sheet->cell('B'.$say7.':E'.$say7, function($cell){
                        $cell->setBorder('none','none','none','none');
                    });

                    $sheet->cell('F'.$say7, function($cell){
                        $cell->setBorder('none','none','none','none');
                    });

                    $sheet->cell('G'.$say7.':J'.$say7, function($cell){
                        $cell->setBorder('none','thin','none','none');
                    });

                    $say8=$say+13;
                    $sheet->cell('A'.$say8, function($cell){
                        $cell->setBorder('none','none','none','thin');
                    });

                    $sheet->cell('B'.$say8.':E'.$say8, function($cell){
                        $cell->setBorder('none','none','none','none');
                    });

                    $sheet->cell('F'.$say8, function($cell){
                        $cell->setBorder('none','none','none','none');
                    });

                    $sheet->cell('G'.$say8.':J'.$say8, function($cell){
                        $cell->setBorder('none','thin','none','none');
                    });

                    $say9=$say+14;
                    $sheet->cell('A'.$say9, function($cell){
                        $cell->setBorder('none','none','none','thin');
                    });

                    $sheet->cell('B'.$say9.':E'.$say9, function($cell){
                        $cell->setBorder('none','none','none','none');
                    });

                    $sheet->cell('F'.$say9, function($cell){
                        $cell->setBorder('none','none','none','none');
                    });

                    $sheet->cell('G'.$say9.':J'.$say9, function($cell){
                        $cell->setBorder('none','thin','none','none');
                    });

                    $say10=$say+15;
                    $sheet->cell('A'.$say10.':E'.$say10, function($cell){
                        $cell->setBorder('none','none','none','thin');
                    });

                    $sheet->cell('F'.$say10, function($cell){
                        $cell->setBorder('none','none','none','none');
                    });

                    $sheet->cell('G'.$say10.':J'.$say10, function($cell){
                        $cell->setBorder('none','thin','none','none');
                    });

                    $say11=$say+16;
                    $sheet->cell('A'.$say11.':J'.$say11, function($cell){
                        $cell->setBorder('none','thin','thin','thin');
                    });

                    $sheet->setpaperSize(1);
                    $sheet->sethorizontalCentered(true);
                    $sheet->setverticalCentered(true);

                    $sheet->loadView('excel.zimmet_fisi', $veri);
                });
            })->export('xls');
    }

}
