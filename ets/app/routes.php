<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('giris',array('as' => 'giris' , 'uses' => 'YonetimController@giris' ));
Route::post('giris',array('as' => 'giris_post' , 'uses' => 'YonetimController@giris_post' ));


Route::group(array("before" => "auth"), function(){

	//sadece teknisyenin gireceği yerler buraya

	//Yönetim İşlemleri
	Route::get('/',array('as' => '/' , 'uses' => 'YonetimController@index' ));
	Route::get('index',array('as' => 'index' , 'uses' => 'YonetimController@index' ));
	Route::get('cikis',array('as' => 'cikis' , 'uses' => 'YonetimController@cikis' ));
	Route::get('sifredegistirme',array('as' => 'sifredegistirme' , 'uses' => 'YonetimController@sifredegistirme' ));
	Route::post('sifredegistirme',array('as' => 'sifredegistirme_post' , 'uses' => 'YonetimController@sifredegistirme_post' ));
	Route::get('arizakayit',array('as' => 'arizakayit' , 'uses' => 'YonetimController@arizakayit' ));
	Route::post('arizakayit',array('as' => 'arizakayit_post' , 'uses' => 'YonetimController@arizakayit_post' ));
	Route::get('urunariza_sil/{oda}',array('as' => 'urunariza_sil' , 'uses' => 'YonetimController@urunariza_sil' )); 

	Route::get('ara',array('as' => 'ara' , 'uses' => 'YonetimController@index' ));
	Route::post('ara',array('as' => 'ara' , 'uses' => 'YonetimController@ara' ));

	Route::get('uruntiklama/{id}',array('as' => 'uruntiklama' , 'uses' => 'YonetimController@uruntiklama' ));
	Route::get('urunler/{oda}',array('as' => 'urunler' , 'uses' => 'YonetimController@urunler' ));
	Route::get('urundetay',array('as' => 'urundetay' , 'uses' => 'YonetimController@urundetay' ));


	Route::group(array("before" => "ziyaretci"), function(){

		//sadece ziyaretçilerin gireceği yerler buraya

		Route::get('kat/{blok}/{kat}',array('as' => 'kat' , 'uses' => 'YonetimController@kat' ));
		Route::get('birim/{id}',array('as' => 'birim' , 'uses' => 'YonetimController@birim' ));
		Route::get('birimler/{id}',array('as' => 'birimler' , 'uses' => 'YonetimController@birimler' ));
		Route::get('birimhepsi/{id}',array('as' => 'birimhepsi' , 'uses' => 'YonetimController@birimhepsi' ));
		
	});


	Route::group(array("before" => "gecici"), function(){

		//sadece geçici yöneticilerin gireceği yerler buraya

		//Odaya Ürün Ekleme
		Route::get('oda_urun',array('as' => 'oda_urun' , 'uses' => 'YonetimController@oda_urun' ));
		Route::post('oda_urun',array('as' => 'oda_urun_post' , 'uses' => 'YonetimController@oda_urun_post' ));

		Route::get('oda_ekle',array('as' => 'oda_ekle' , 'uses' => 'BirimController@oda_ekle' ));
		Route::post('oda_ekle',array('as' => 'oda_ekle_post' , 'uses' => 'BirimController@oda_ekle_post' ));
		Route::get('odalargenel',array('as' => 'odalargenel' , 'uses' => 'BirimController@odalargenel' ));

		Route::get('urun_ekle',array('as' => 'urun_ekle' , 'uses' => 'UrunController@urun_ekle' ));
		Route::post('urun_ekle',array('as' => 'urun_ekle_post' , 'uses' => 'UrunController@urun_ekle_post' ));
		Route::get('urunlergenel',array('as' => 'urunlergenel' , 'uses' => 'UrunController@urunlergenel' ));

		Route::get('seciliustbirim/{id}',array('as' => 'seciliustbirim' , 'uses' => 'BirimController@seciliustbirim' ));
		Route::get('zimmet_fisi/{oda}',array('as' => 'zimmet_fisi' , 'uses' => 'ExcelController@zimmet_fisi' ));

	});


	Route::group(array("before" => "yonetici"), function(){

		//sadece üst yöneticilerin gireceği yerler buraya

		Route::group(array("before" => "kilit"), function(){

			//sadece kilit açıkken yapılacak işlemler buraya
			
			//Marka eklemeyi kilit açıkken üst yönetici yapabilir
			Route::get('marka_ekle',array('as' => 'marka_ekle' , 'uses' => 'UrunController@marka_ekle' ));
			Route::post('marka_ekle',array('as' => 'marka_ekle_post' , 'uses' => 'UrunController@marka_ekle_post' ));
			Route::get('marka_duzenle/{id}',array('as' => 'marka_duzenle' , 'uses' => 'UrunController@marka_duzenle' ));
			Route::post('marka_duzenle/{id}',array('as' => 'marka_duzenle_post' , 'uses' => 'UrunController@marka_duzenle_post' ));
			Route::get('marka_sil/{id}',array('as' => 'marka_sil' , 'uses' => 'UrunController@marka_sil' ));
			

			//Tür eklemeyi kilit açıkken üst yönetici yapabilir
			Route::get('tur_ekle',array('as' => 'tur_ekle' , 'uses' => 'UrunController@tur_ekle' ));
			Route::post('tur_ekle',array('as' => 'tur_ekle_post' , 'uses' => 'UrunController@tur_ekle_post' ));
			Route::get('tur_duzenle/{id}',array('as' => 'tur_duzenle' , 'uses' => 'UrunController@tur_duzenle' ));
			Route::post('tur_duzenle/{id}',array('as' => 'tur_duzenle_post' , 'uses' => 'UrunController@tur_duzenle_post' ));
			Route::get('tur_sil/{id}',array('as' => 'tur_sil' , 'uses' => 'UrunController@tur_sil' ));
			

			//Model eklemeyi kilit açıkken üst yönetici yapabilir
			Route::get('model_ekle',array('as' => 'model_ekle' , 'uses' => 'UrunController@model_ekle' ));
			Route::post('model_ekle',array('as' => 'model_ekle_post' , 'uses' => 'UrunController@model_ekle_post' ));
			Route::get('model_duzenle/{id}',array('as' => 'model_duzenle' , 'uses' => 'UrunController@model_duzenle' ));
			Route::post('model_duzenle/{id}',array('as' => 'model_duzenle_post' , 'uses' => 'UrunController@model_duzenle_post' ));
			Route::get('model_sil/{id}',array('as' => 'model_sil' , 'uses' => 'UrunController@model_sil' ));
			

			//Birim Tipi ekle, sil ve düzenle işlemlirini kilit açıkken üst yönetici yapabilir
			Route::get('birim_tipi_ekle',array('as' => 'birim_tipi_ekle' , 'uses' => 'BirimController@birim_tipi_ekle' ));
			Route::post('birim_tipi_ekle',array('as' => 'birim_tipi_ekle_post' , 'uses' => 'BirimController@birim_tipi_ekle_post' ));
			Route::get('birimtip_duzenle/{id}',array('as' => 'birimtip_duzenle' , 'uses' => 'BirimController@birimtip_duzenle' ));
			Route::post('birimtip_duzenle/{id}',array('as' => 'birimtip_duzenle_post' , 'uses' => 'BirimController@birimtip_duzenle_post' ));
			Route::get('birimtip_sil/{id}',array('as' => 'birimtip_sil' , 'uses' => 'BirimController@birimtip_sil' ));


			//Üst Birim ekle, sil ve düzenle işlemlirini kilit açıkken üst yönetici yapabilir
			Route::get('ust_birim_ekle',array('as' => 'ust_birim_ekle' , 'uses' => 'BirimController@ust_birim_ekle' ));
			Route::post('ust_birim_ekle',array('as' => 'ust_birim_ekle_post' , 'uses' => 'BirimController@ust_birim_ekle_post' ));
			Route::get('ustbirim_duzenle/{id}',array('as' => 'ustbirim_duzenle' , 'uses' => 'BirimController@ustbirim_duzenle' ));
			Route::post('ustbirim_duzenle/{id}',array('as' => 'ustbirim_duzenle_post' , 'uses' => 'BirimController@ustbirim_duzenle_post' ));
			Route::get('ustbirim_sil/{id}',array('as' => 'ustbirim_sil' , 'uses' => 'BirimController@ustbirim_sil' ));


			//Birim ekle, sil ve düzenle işlemlirini kilit açıkken üst yönetici yapabilir
			Route::get('birim_ekle',array('as' => 'birim_ekle' , 'uses' => 'BirimController@birim_ekle' ));
			Route::post('birim_ekle',array('as' => 'birim_ekle_post' , 'uses' => 'BirimController@birim_ekle_post' ));
			Route::get('birim_duzenle/{id}',array('as' => 'birim_duzenle' , 'uses' => 'BirimController@birim_duzenle' ));
			Route::post('birim_duzenle/{id}',array('as' => 'birim_duzenle_post' , 'uses' => 'BirimController@birim_duzenle_post' ));
			Route::get('birim_sil/{id}',array('as' => 'birim_sil' , 'uses' => 'BirimController@birim_sil' ));


			//Yönetici silmeyi kilit açıkken sadece üst yönetici yapabilir
			Route::get('yonetici_sil/{id}',array('as' => 'yonetici_sil' , 'uses' => 'YonetimController@yonetici_sil' ));

			Route::get('oda_depo/{id}',array('as' => 'oda_depo' , 'uses' => 'BirimController@oda_depo' ));

		});

		Route::get('markalar',array('as' => 'markalar' , 'uses' => 'UrunController@markalar' ));
		Route::get('turler',array('as' => 'turler' , 'uses' => 'UrunController@turler' ));
		Route::get('modeller',array('as' => 'modeller' , 'uses' => 'UrunController@modeller' ));
		Route::get('birim_tipleri',array('as' => 'birim_tipleri' , 'uses' => 'BirimController@birim_tipleri' ));
		Route::get('ust_birimler',array('as' => 'ust_birimler' , 'uses' => 'BirimController@ust_birimler' ));
		Route::get('birimlergenel',array('as' => 'birimlergenel' , 'uses' => 'BirimController@birimlergenel' ));


		//Yönetici ekleyip düzenleme işlemlerini üst yönetici yapabilir
		Route::get('yonetici_ekle',array('as' => 'yonetici_ekle' , 'uses' => 'YonetimController@yonetici_ekle' ));
		Route::post('yonetici_ekle',array('as' => 'yonetici_ekle_post' , 'uses' => 'YonetimController@yonetici_ekle_post' ));
		Route::get('yoneticiler',array('as' => 'yoneticiler' , 'uses' => 'YonetimController@yoneticiler' ));
		Route::get('yonetici_duzenle/{id}',array('as' => 'yonetici_duzenle' , 'uses' => 'YonetimController@yonetici_duzenle' ));
		Route::post('yonetici_duzenle/{id}',array('as' => 'yonetici_duzenle_post' , 'uses' => 'YonetimController@yonetici_duzenle_post' ));


		//Kilidi sadece üst yönetici açıp kapatabilir.
		Route::get('kilit',array('as' => 'kilit' , 'uses' => 'YonetimController@kilit' ));
		Route::post('kilit',array('as' => 'kilit_post' , 'uses' => 'YonetimController@kilit_post' ));

		//log kayıtlarını ve herhangi bir odaya kayıtlı olmayan ürünleri sadece üst yönetici görebilir
		Route::get('log',array('as' => 'log' , 'uses' => 'YonetimController@log' ));
		Route::get('bostaurunler',array('as' => 'bostaurunler' , 'uses' => 'YonetimController@bostaurunler' ));


		//kayit girme, silme, düzenleme ve kapatma işlemlerini sadece üst yönetici yapabilir
		Route::get('kayitgir',array('as' => 'kayitgir' , 'uses' => 'YonetimController@kayitgir'));
		Route::post('kayitgir',array('as' => 'kayitgir_post' , 'uses' => 'YonetimController@kayitgir_post' ));
		Route::get('kayitsil/{id}',array('as' => 'kayitsil' , 'uses' => 'YonetimController@kayitsil'));
		Route::post('aciklamakaydet/{id}',array('as' => 'aciklamakaydet' , 'uses' => 'YonetimController@aciklamakaydet' ));
		Route::post('aciklamaduzenle/{id}',array('as' => 'aciklamaduzenle' , 'uses' => 'YonetimController@aciklamaduzenle' ));


		//oda ekle sil ve düzenleyi sadece üst yönetici yapabilir
		Route::get('oda_sil/{id}',array('as' => 'oda_sil' , 'uses' => 'BirimController@oda_sil' ));
		Route::get('oda_duzenle/{id}',array('as' => 'oda_duzenle' , 'uses' => 'BirimController@oda_duzenle' ));
		Route::post('oda_duzenle/{id}',array('as' => 'oda_duzenle_post' , 'uses' => 'BirimController@oda_duzenle_post' ));


		//ürün düzenlemeyi ve silmeyi sadece üst yönetici yapabilir
		Route::get('urun_duzenle/{id}',array('as' => 'urun_duzenle' , 'uses' => 'UrunController@urun_duzenle' ));
		Route::post('urun_duzenle/{id}',array('as' => 'urun_duzenle_post' , 'uses' => 'UrunController@urun_duzenle_post' ));
		Route::get('urun_sil/{id}',array('as' => 'urun_sil' , 'uses' => 'UrunController@urun_sil' ));


		//Ürün oda değiştirmeyi onaylamayı sadece üst yönetici yapabilir
		Route::get('onay',array('as' => 'onay' , 'uses' => 'YonetimController@onay' ));
		Route::post('onay',array('as' => 'onay_post' , 'uses' => 'YonetimController@onay_post' ));
		Route::get('iptal',array('as' => 'iptal' , 'uses' => 'YonetimController@iptal' ));

		Route::get('odaurun_sil/{id}/{birim}',array('as' => 'odaurun_sil' , 'uses' => 'YonetimController@odaurun_sil' ));



		
		//EXCEL ile ilgili her şer burada
		Route::get('model_sayilari',array('as' => 'model_sayilari' , 'uses' => 'ExcelController@model_sayilari' ));
		Route::get('excel_oda_urunler/{oda}',array('as' => 'excel_oda_urunler' , 'uses' => 'ExcelController@excel_oda_urunler' ));
		Route::get('sistemyedegi',array('as' => 'sistemyedegi' , 'uses' => 'ExcelController@sistemyedegi' ));
		Route::get('excel',array('as' => 'excel' , 'uses' => 'YonetimController@excel' ));
		Route::get('excel_birim_urunler/{birim}',array('as' => 'excel_birim_urunler' , 'uses' => 'ExcelController@excel_birim_urunler' ));

		
		//Sorgu İşlemleri
		Route::get('sorgu',array('as' => 'sorgu' , 'uses' => 'YonetimController@sorgu' ));
		Route::post('sorgu',array('as' => 'sorgu_post' , 'uses' => 'YonetimController@sorgu_post' ));
		Route::get('secilitur/{id}',array('as' => 'secilitur' , 'uses' => 'YonetimController@secilitur' ));



		//Not İşlemleri
		Route::get('notlar',array('as' => 'notlar' , 'uses' => 'YonetimController@notlar' ));
		Route::post('notlar',array('as' => 'notlar_post' , 'uses' => 'YonetimController@notlar_post' ));
		Route::get('notuTamamla/{id}',array('as' => 'notuTamamla' , 'uses' => 'YonetimController@notuTamamla' ));
		Route::get('notuArsivle/{id}',array('as' => 'notuArsivle' , 'uses' => 'YonetimController@notuArsivle' ));
		Route::get('notuSil/{id}',array('as' => 'notuSil' , 'uses' => 'YonetimController@notuSil' ));
		Route::post('notuDuzenle/{id}',array('as' => 'notuDuzenle' , 'uses' => 'YonetimController@notuDuzenle' ));
		Route::get('notArsivi',array('as' => 'notArsivi' , 'uses' => 'YonetimController@notArsivi' ));




		//Sarf Malzeme İşlemleri
		Route::get('sm_tur_ekle',array('as' => 'sm_tur_ekle' , 'uses' => 'SmController@sm_tur_ekle' ));
		Route::post('sm_tur_ekle',array('as' => 'sm_tur_ekle_post' , 'uses' => 'SmController@sm_tur_ekle_post' ));
		Route::get('sm_turler',array('as' => 'sm_turler' , 'uses' => 'SmController@sm_turler' ));
		Route::get('sm_tur_duzenle/{id}',array('as' => 'sm_tur_duzenle' , 'uses' => 'SmController@sm_tur_duzenle' ));
		Route::post('sm_tur_duzenle/{id}',array('as' => 'sm_tur_duzenle_post' , 'uses' => 'SmController@sm_tur_duzenle_post' ));
		Route::get('sm_tur_sil/{id}',array('as' => 'sm_tur_sil' , 'uses' => 'SmController@sm_tur_sil' ));

		Route::get('sm_alttur_ekle',array('as' => 'sm_alttur_ekle' , 'uses' => 'SmController@sm_alttur_ekle' ));
		Route::post('sm_alttur_ekle',array('as' => 'sm_alttur_ekle_post' , 'uses' => 'SmController@sm_alttur_ekle_post' ));
		Route::get('sm_altturler',array('as' => 'sm_altturler' , 'uses' => 'SmController@sm_altturler' ));
		Route::get('sm_alttur_duzenle/{id}',array('as' => 'sm_alttur_duzenle' , 'uses' => 'SmController@sm_alttur_duzenle' ));
		Route::post('sm_alttur_duzenle/{id}',array('as' => 'sm_alttur_duzenle_post' , 'uses' => 'SmController@sm_alttur_duzenle_post' ));
		Route::get('sm_alttur_sil/{id}',array('as' => 'sm_alttur_sil' , 'uses' => 'SmController@sm_alttur_sil' ));

		Route::get('sm_urun_ekle',array('as' => 'sm_urun_ekle' , 'uses' => 'SmController@sm_urun_ekle' ));
		Route::post('sm_urun_ekle',array('as' => 'sm_urun_ekle_post' , 'uses' => 'SmController@sm_urun_ekle_post' ));
		Route::get('sm_urunler',array('as' => 'sm_urunler' , 'uses' => 'SmController@sm_urunler' ));
		Route::get('sm_urun_duzenle/{id}',array('as' => 'sm_urun_duzenle' , 'uses' => 'SmController@sm_urun_duzenle' ));
		Route::post('sm_urun_duzenle/{id}',array('as' => 'sm_urun_duzenle_post' , 'uses' => 'SmController@sm_urun_duzenle_post' ));
		Route::get('sm_urun_sil/{id}',array('as' => 'sm_urun_sil' , 'uses' => 'SmController@sm_urun_sil' ));

		Route::get('sm_kayit_ekle',array('as' => 'sm_kayit_ekle' , 'uses' => 'SmController@sm_kayit_ekle' ));
		Route::post('sm_kayit_ekle',array('as' => 'sm_kayit_ekle_post' , 'uses' => 'SmController@sm_kayit_ekle_post' ));
		Route::get('secili_ust_birim/{id}',array('as' => 'secili_ust_birim' , 'uses' => 'SmController@secili_ust_birim' ));
		Route::get('sm_tum_kayitlar',array('as' => 'sm_tum_kayitlar' , 'uses' => 'SmController@sm_tum_kayitlar' ));
		Route::get('sm_kayit_sil/{id}',array('as' => 'sm_kayit_sil' , 'uses' => 'SmController@sm_kayit_sil' ));

		Route::get('sm_urun_ara',array('as' => 'sm_urun_ara' , 'uses' => 'SmController@sm_urun_ara' ));
		Route::post('sm_urun_ara',array('as' => 'sm_urun_ara_post' , 'uses' => 'SmController@sm_urun_ara_post' ));
		Route::get('sm_urun_tiklama/{serino}',array('as' => 'sm_urun_tiklama' , 'uses' => 'SmController@sm_urun_tiklama' ));

		Route::get('sm_sorgu',array('as' => 'sm_sorgu' , 'uses' => 'SmController@sm_sorgu' ));
		Route::get('sm_birim_sorgula',array('as' => 'sm_birim_sorgula' , 'uses' => 'SmController@sm_birim_sorgula' ));
		Route::post('sm_birim_sorgula',array('as' => 'sm_birim_sorgula_post' , 'uses' => 'SmController@sm_birim_sorgula_post' ));
		Route::get('sm_birimde_sorgulama/{id}',array('as' => 'sm_birimde_sorgulama' , 'uses' => 'SmController@sm_birimde_sorgulama' ));
		Route::get('sm_depo_durumu',array('as' => 'sm_depo_durumu' , 'uses' => 'SmController@sm_depo_durumu' ));
		Route::get('sm_model_sorgula',array('as' => 'sm_model_sorgula' , 'uses' => 'SmController@sm_model_sorgula' ));
		Route::post('sm_model_sorgula',array('as' => 'sm_model_sorgula_post' , 'uses' => 'SmController@sm_model_sorgula_post' ));
		Route::get('sm_secili_tur/{id}',array('as' => 'sm_secili_tur' , 'uses' => 'SmController@sm_secili_tur' ));
		Route::get('sm_birim_sayilari',array('as' => 'sm_birim_sayilari' , 'uses' => 'SmController@sm_birim_sayilari' ));
		Route::get('smexcel',array('as' => 'smexcel' , 'uses' => 'SmController@smexcel' ));
		Route::get('smexcelkayitlar',array('as' => 'smexcelkayitlar' , 'uses' => 'SmController@smexcelkayitlar' ));


		Route::post('zimmetFisiTarama',array('as' => 'zimmetFisiTarama' , 'uses' => 'YonetimController@zimmetFisiTarama' ));
		Route::get('zimmetFisiSil/{id}',array('as' => 'zimmetFisiSil' , 'uses' => 'YonetimController@zimmetFisiSil' ));
		Route::get('urunGecmisSil/{id}',array('as' => 'urunGecmisSil' , 'uses' => 'YonetimController@urunGecmisSil' ));



		Route::post('urun_tasi',array('as' => 'urun_tasi' , 'uses' => 'YonetimController@urun_tasi' ));
		Route::post('urun_tasi_onayla',array('as' => 'urun_tasi_onayla' , 'uses' => 'YonetimController@urun_tasi_onayla' ));

		Route::post('dusum_listesine_ekle',array('as' => 'dusum_listesine_ekle_post' , 'uses' => 'YonetimController@dusum_listesine_ekle_post' ));
		Route::get('dusum_listesine_ekle',array('as' => 'dusum_listesine_ekle' , 'uses' => 'YonetimController@dusum_listesine_ekle' ));
		Route::get('dusum_sil/{id}',array('as' => 'dusum_sil' , 'uses' => 'YonetimController@dusum_sil' ));


		Route::get('tum_ariza_kayitlari',array('as' => 'tum_ariza_kayitlari' , 'uses' => 'YonetimController@tum_ariza_kayitlari' ));
		Route::get('tum_ariza_kayitlari_excel',array('as' => 'tum_ariza_kayitlari_excel' , 'uses' => 'YonetimController@tum_ariza_kayitlari_excel' ));

	});

});
