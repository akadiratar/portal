<?php

use Illuminate\Support\Facades\Route;

Route::get('giris', 'GirisController@giris')->name('giris');
Route::post('giris', 'GirisController@giris_post');
Route::get('cikis', 'PortalController@cikis')->name('cikis');
Route::get('/', 'PortalController@anasayfa')->name('/');
Route::get('parola_degistir', 'PortalController@parola_degistir')->name('parola_degistir');
Route::post('parola_degistir', 'PortalController@parola_degistir_post');


Route::group(['prefix' => 'dts'], function() {
	Route::get('/', 'DtsController@anasayfa')->name('dts');



});


Route::group(['prefix' => 'ets'], function() {
	Route::group(['middleware' => ['permission:ets.goster']], function() {
		Route::get('/', 'EtsController@anasayfa')->name('ets');



	});
});


Route::group(['prefix' => 'riy'], function() {
	Route::group(['middleware' => ['permission:riy.goster']], function() {

		Route::get('/', 'RiyController@anasayfa')->name('riy');

		Route::group(['middleware' => ['permission:riy.rol_ve_izin_islemleri']], function() {
			Route::get('roller', 'RiyController@roller')->name('riy_roller');
			Route::get('rol_olustur', 'RiyController@rol_olustur')->name('riy_rol_olustur');
			Route::post('rol_olustur', 'RiyController@rol_olustur_post');
			Route::get('rol_duzenle/{rol}', 'RiyController@rol_duzenle')->name('riy_rol_duzenle');
			Route::post('rol_duzenle/{rol}', 'RiyController@rol_duzenle_post');
			Route::get('rol_sil/{rol}', 'RiyController@rol_sil')->name('riy_rol_sil');
			Route::get('rol_izin_ekle/{rol}', 'RiyController@rol_izin_ekle')->name('riy_rol_izin_ekle');
			Route::post('rol_izin_ekle/{rol}', 'RiyController@rol_izin_ekle_post');
			Route::get('izinler', 'RiyController@izinler')->name('riy_izinler');
		});


		Route::get('unvanlar', 'RiyController@unvanlar')->name('riy_unvanlar');
		Route::get('unvan_sil/{unvan}', 'RiyController@unvan_sil')->name('riy_unvan_sil');
		Route::get('unvan_ekle', 'RiyController@unvan_ekle')->name('riy_unvan_ekle');
		Route::post('unvan_ekle', 'RiyController@unvan_ekle_post');
		Route::get('unvan_duzenle/{unvan}', 'RiyController@unvan_duzenle')->name('riy_unvan_duzenle');
		Route::post('unvan_duzenle/{unvan}', 'RiyController@unvan_duzenle_post');

		Route::get('kullanici_ekle', 'RiyController@kullanici_ekle')->name('riy_kullanici_ekle');
		Route::post('kullanici_ekle', 'RiyController@kullanici_ekle_post');

		Route::get('kullanici_duzenle/{kullanici}', 'RiyController@kullanici_duzenle')->name('riy_kullanici_duzenle');
		Route::post('kullanici_duzenle/{kullanici}', 'RiyController@kullanici_duzenle_post');

		Route::get('kullanici_ara', 'RiyController@kullanici_ara')->name('riy_kullanici_ara');
		Route::post('kullanici_ara', 'RiyController@kullanici_ara_post');

		Route::get('kullanicilar', 'RiyController@kullanicilar')->name('riy_kullanicilar');
		
		Route::get('kullanici_detay/{kullanici}', 'RiyController@kullanici_detay')->name('riy_kullanici_detay');

		Route::get('rol_tanimla/{kullanici}', 'RiyController@rol_tanimla')->name('riy_rol_tanimla');
		Route::get('direkt_izin_tanimla/{kullanici}', 'RiyController@direkt_izin_tanimla')->name('riy_direkt_izin_tanimla');

		Route::get('rol_kullanicilar/{rol}', 'RiyController@rol_kullanicilar')->name('riy_rol_kullanicilar');
		Route::get('izin_kullanicilar/{izin}', 'RiyController@izin_kullanicilar')->name('riy_izin_kullanicilar');

		Route::get('kullanici_sil/{kullanici}', 'RiyController@kullanici_sil')->name('riy_kullanici_sil');

		Route::get('kullanici_birim_degistir/{kullanici}', 'RiyController@kullanici_birim_degistir')->name('riy_kullanici_birim_degistir');
		// Route::post('kullanici_birim_degistir/{kullanici}', 'RiyController@kullanici_birim_degistir_post');
		
	});
});


Route::group(['prefix' => 'segbis'], function() {
	Route::group(['middleware' => ['permission:segbis.goster']], function() {
		Route::get('/', 'SegbisController@anasayfa')->name('segbis');



	});
});


Route::group(['prefix' => 'buro'], function() {
	Route::group(['middleware' => ['permission:buro.goster']], function() {
		Route::get('/', 'BuroController@anasayfa')->name('buro');



	});
});


Route::group(['prefix' => 'bys'], function() {
	Route::group(['middleware' => ['permission:bys.goster']], function() {

		Route::get('/', 'BysController@anasayfa')->name('bys');
		Route::get('birim_detay/{birim}', 'BysController@birim_detay')->name('bys_birim_detay');
		Route::get('blok_detay/{blok}', 'BysController@blok_detay')->name('bys_blok_detay');
		Route::get('kat_detay/{kat}', 'BysController@kat_detay')->name('bys_kat_detay');
		Route::get('oda_ara/{oda_kodu}', 'BysController@oda_ara')->name('bys_oda_ara');
		Route::post('oda_ara_post', 'BysController@oda_ara_post')->name('bys_oda_ara_post');
		Route::post('oda_bilgi_guncelle/{oda}', 'BysController@oda_bilgi_guncelle')->name('bys_oda_bilgi_guncelle');
		Route::get('bos_odalar', 'BysController@bos_odalar')->name('bys_bos_odalar');
		Route::get('oda_tipi_detay/{oda_tipi}', 'BysController@oda_tipi_detay')->name('bys_oda_tipi_detay');

		Route::group(['middleware' => ['permission:bys.yapi_islemleri']], function() {
			Route::get('blok_ekle', 'BysController@blok_ekle')->name('bys_blok_ekle');
			Route::post('blok_ekle', 'BysController@blok_ekle_post');
			Route::get('blok_duzenle/{blok}', 'BysController@blok_duzenle')->name('bys_blok_duzenle');
			Route::post('blok_duzenle/{blok}', 'BysController@blok_duzenle_post');
			Route::get('blok_sil/{blok}', 'BysController@blok_sil')->name('bys_blok_sil');

			Route::get('kat_ekle', 'BysController@kat_ekle')->name('bys_kat_ekle');
			Route::post('kat_ekle', 'BysController@kat_ekle_post');
			Route::get('kat_duzenle/{kat}', 'BysController@kat_duzenle')->name('bys_kat_duzenle');
			Route::post('kat_duzenle/{kat}', 'BysController@kat_duzenle_post');
			Route::get('kat_sil/{kat}', 'BysController@kat_sil')->name('bys_kat_sil');

			Route::get('oda_ekle', 'BysController@oda_ekle')->name('bys_oda_ekle');
			Route::post('oda_ekle', 'BysController@oda_ekle_post');
			Route::get('oda_duzenle/{oda}', 'BysController@oda_duzenle')->name('bys_oda_duzenle');
			Route::post('oda_duzenle/{oda}', 'BysController@oda_duzenle_post');
			Route::get('oda_sil/{oda}', 'BysController@oda_sil')->name('bys_oda_sil');

			Route::get('oda_tipi_ekle', 'BysController@oda_tipi_ekle')->name('bys_oda_tipi_ekle');
			Route::post('oda_tipi_ekle', 'BysController@oda_tipi_ekle_post');
			Route::get('oda_tipi_duzenle/{oda_tipi}', 'BysController@oda_tipi_duzenle')->name('bys_oda_tipi_duzenle');
			Route::post('oda_tipi_duzenle/{oda_tipi}', 'BysController@oda_tipi_duzenle_post');
			Route::get('oda_tipi_sil/{oda_tipi}', 'BysController@oda_tipi_sil')->name('bys_oda_tipi_sil');
		});

		Route::group(['middleware' => ['permission:bys.yapi_listesi_gorme']], function() {
			Route::get('bloklar', 'BysController@bloklar')->name('bys_bloklar');
			Route::get('katlar', 'BysController@katlar')->name('bys_katlar');
			Route::get('odalar', 'BysController@odalar')->name('bys_odalar');
			Route::get('oda_tipleri', 'BysController@oda_tipleri')->name('bys_oda_tipleri');
		});

		Route::group(['middleware' => ['permission:bys.birim_islemleri']], function() {
			Route::get('birim_ekle', 'BysController@birim_ekle')->name('bys_birim_ekle');
			Route::post('birim_ekle', 'BysController@birim_ekle_post');
			Route::get('birim_duzenle/{birim}', 'BysController@birim_duzenle')->name('bys_birim_duzenle');
			Route::post('birim_duzenle/{birim}', 'BysController@birim_duzenle_post');
			Route::get('birim_sil/{birim}', 'BysController@birim_sil')->name('bys_birim_sil');
		});

		Route::group(['middleware' => ['permission:bys.birim_listesi_gorme']], function() {
			Route::get('birimler', 'BysController@birimler')->name('bys_birimler');
			Route::get('birim_yapisi', 'BysController@birim_yapisi')->name('bys_birim_yapisi');
		});

		Route::group(['middleware' => ['permission:bys.silinenler']], function() {
			Route::get('birimler_silinenler', 'BysController@birimler_silinenler')->name('bys_birimler_silinenler');
			Route::get('birim_kalici_sil/{birim}', 'BysController@birim_kalici_sil')->name('bys_birim_kalici_sil');
			Route::get('birim_geri_yukle/{birim}', 'BysController@birim_geri_yukle')->name('bys_birim_geri_yukle');

			Route::get('bloklar_silinenler', 'BysController@bloklar_silinenler')->name('bys_bloklar_silinenler');
			Route::get('blok_kalici_sil/{blok}', 'BysController@blok_kalici_sil')->name('bys_blok_kalici_sil');
			Route::get('blok_geri_yukle/{blok}', 'BysController@blok_geri_yukle')->name('bys_blok_geri_yukle');

			Route::get('katlar_silinenler', 'BysController@katlar_silinenler')->name('bys_katlar_silinenler');
			Route::get('kat_kalici_sil/{kat}', 'BysController@kat_kalici_sil')->name('bys_kat_kalici_sil');
			Route::get('kat_geri_yukle/{kat}', 'BysController@kat_geri_yukle')->name('bys_kat_geri_yukle');

			Route::get('odalar_silinenler', 'BysController@odalar_silinenler')->name('bys_odalar_silinenler');
			Route::get('oda_kalici_sil/{oda}', 'BysController@oda_kalici_sil')->name('bys_oda_kalici_sil');
			Route::get('oda_geri_yukle/{oda}', 'BysController@oda_geri_yukle')->name('bys_oda_geri_yukle');

			Route::get('oda_tipleri_silinenler', 'BysController@oda_tipleri_silinenler')->name('bys_oda_tipleri_silinenler');
			Route::get('oda_tipi_kalici_sil/{oda_tipi}', 'BysController@oda_tipi_kalici_sil')->name('bys_oda_tipi_kalici_sil');
			Route::get('oda_tipi_geri_yukle/{oda_tipi}', 'BysController@oda_tipi_geri_yukle')->name('bys_oda_tipi_geri_yukle');
		});
		
		Route::group(['middleware' => ['permission:bys.birim_oda_eslestirme']], function() {
			Route::get('birim_oda_eslestir', 'BysController@birim_oda_eslestir')->name('bys_birim_oda_eslestir');
			Route::post('birim_oda_eslestir', 'BysController@birim_oda_eslestir_post');
			Route::get('birim_oda_guncelle/{oda}', 'BysController@birim_oda_guncelle')->name('bys_birim_oda_guncelle');
			Route::post('birim_oda_guncelle/{oda}', 'BysController@birim_oda_guncelle_post');
			Route::post('oda_birim_sil/{oda}', 'BysController@oda_birim_sil')->name('bys_oda_birim_sil');
		});
	});
});




Route::group(['prefix' => 'tys'], function() {
	Route::group(['middleware' => ['permission:tys.goster']], function() {

		Route::get('/', 'TysController@anasayfa')->name('tys');
		Route::get('birim_detay/{birim}', 'TysController@birim_detay')->name('tys_birim_detay');
		Route::get('blok_detay/{blok}', 'TysController@blok_detay')->name('tys_blok_detay');
		Route::get('kat_detay/{kat}', 'TysController@kat_detay')->name('tys_kat_detay');
		Route::get('ara/{kodu}', 'TysController@ara')->name('tys_ara');
		Route::post('ara_post', 'TysController@ara_post')->name('tys_ara_post');

		Route::get('birimler', 'TysController@birimler')->name('tys_birimler');
		Route::get('birim_yapisi', 'TysController@birim_yapisi')->name('tys_birim_yapisi');
		Route::get('bloklar', 'TysController@bloklar')->name('tys_bloklar');
		Route::get('katlar', 'TysController@katlar')->name('tys_katlar');
		Route::get('odalar', 'TysController@odalar')->name('tys_odalar');
		Route::get('oda_tipleri', 'TysController@oda_tipleri')->name('tys_oda_tipleri');

		Route::get('diger_numaralar', 'TysController@diger_numaralar')->name('tys_diger_numaralar');

		Route::get('numara_tipi_detay/{numara_tipi}', 'TysController@numara_tipi_detay')->name('tys_numara_tipi_detay');

		Route::group(['middleware' => ['permission:tys.oda_numara_eslestirme']], function() {
			Route::get('dahili_no_ekle/{oda}', 'TysController@dahili_no_ekle')->name('tys_dahili_no_ekle');
			Route::post('dahili_no_ekle/{oda}', 'TysController@dahili_no_ekle_post')->name('tys_dahili_no_ekle_post');
			Route::post('onayla_tasi/{oda}', 'TysController@onayla_tasi_post')->name('tys_onayla_tasi_post');
			Route::post('numara_sil/{numara}', 'TysController@numara_sil_post')->name('tys_numara_oda_sil');
		});

		
		Route::group(['middleware' => ['permission:tys.diger_numara_islemleri']], function() {
			Route::post('diger_numara_sil/{numara}', 'TysController@diger_numara_sil_post')->name('tys_diger_numara_sil');
			Route::get('yeni_numara_ekle', 'TysController@yeni_numara_ekle')->name('tys_yeni_numara_ekle');
			Route::post('yeni_numara_ekle', 'TysController@yeni_numara_ekle_post');
		});


		Route::group(['middleware' => ['permission:tys.silinenler']], function() {
			Route::get('numaralar_silinenler', 'TysController@numaralar_silinenler')->name('tys_numaralar_silinenler');
			Route::get('numara_geri_yukle/{numara}', 'TysController@numara_geri_yukle')->name('tys_numara_geri_yukle');
		});

	});

});