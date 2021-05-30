@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
            <li><a href="{{route('birimler',$girilenoda->birim->ustbirim->id)}}">{{ $girilenoda->birim->ustbirim->ust_birim_adi }}</a></li>
            <li><a href="{{route('birimhepsi',$girilenoda->birim->id)}}">{{ $girilenoda->birim->birim_adi }}</a></li>
        </ul>

      <div class="visible-xs breadcrumb-toggle">
            <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
        </div>

        <ul class="breadcrumb-buttons collapse">
            <li class="language">
                <a href="{{route('zimmet_fisi',$girilenoda->oda_birlikte)}}" ><span>ZİMMET FİŞİ</span></a>
            </li>
            @if(Auth::user()->yonetici_tip == 1)
            <li class="language">
              <a data-toggle="modal" href="#oda_depo">
                @if ($girilenoda->depokontrol == 0)
                ODAYI DEPOYA EKLE
                @else
                ODAYI DEPODAN ÇIKAR
                @endif
              </a>
            </li>
            <li class="language">
                <a href="{{route('excel_oda_urunler',$girilenoda->oda_birlikte)}}" ><span>EXCELE AKTAR</span></a>
            </li>
            @endif
        </ul>
      </div>
      <div id="oda_depo" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">
                      @if ($girilenoda->depokontrol == 0)
                      ODAYI DEPOYA EKLE
                      @else
                      ODAYI DEPODAN ÇIKAR
                      @endif
                      </h4>
                  </div>

                  <div class="modal-body with-padding">
                      <h6>
                      @if ($girilenoda->depokontrol == 0)
                      ODAYI DEPOYA EKLEMEK İSTEDİĞİNİZDEN EMİN MİSİNİZ?
                      @else
                      ODAYI DEPODAN ÇIKARMAK İSTEDİĞİNİZDEN EMİN MİSİNİZ?
                      @endif
                    </h6>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                      <a type="button" class="btn btn-primary" href="{{ route('oda_depo',$girilenoda->id) }}">ONAYLA</a>
                  </div>
              </div>
          </div>
      </div>
<hr>


  <div class="callout callout-danger fade in">
      <h5>{{ $girilenoda->birim->birim_adi }} {{ $girilenoda->aciklama }} ({{ $girilenoda->oda_birlikte }})</h5>
  </div>
  <div class="tabbable page-tabs">
      <ul class="nav nav-tabs">
          <li><a href="#list_model" data-toggle="tab"><i class="icon-yelp"></i>Model Sayıları</a></li>
          <li class="active"><a href="#list_oda" data-toggle="tab"><i class="icon-yelp"></i>{{$girilenoda->oda_birlikte}} - {{$girilenoda->aciklama}}</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade" id="list_model">
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i>{{$girilenoda->birim->birim_adi}} Model Sayıları</h6></div>
                <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Tür</th>
                              <th>Marka</th>
                              <th>Model</th>
                              <th>Adet</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $k = 1; ?>
                        @foreach ($modeller as $model)
                            <?php $m = 0; $arizali = 0; ?>
                            @foreach ($urunler as $urun)
                                @if ($urun->urun->model->id == $model->id)
                                    <?php $m = $m + 1; if ($urun->urun->durumu == 1) {
                                      $arizali = $arizali + 1;
                                    }?>

                                @endif
                            @endforeach
                            @if ($m > 0)
                         <tr>
                            <td>{{ $k; }}</td>
                            <td>{{ $model->tur->tur_adi }}</td>
                            <td>{{$model->marka->marka_adi}}</td>
                            <td>{{$model->model_adi}}</td>
                            <td>{{ $m }} Adet ( {{$m-$arizali}} ÇALIŞIYOR - {{$arizali}} ARIZALI )</td>
                        </tr>
                        <?php $k= $k+1; ?>
                        @endif
                        @endforeach
                      </tbody>
                  </table>
                </div>
          </div>
        </div>
        <div class="tab-pane active fade in" id="list_oda">
          <form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{route('urun_tasi')}}" method="post" >
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table2"></i>{{$girilenoda->birim->birim_adi}} {{$girilenoda->aciklama}}</h6></div>
                <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Tür</th>
                              <th>Markası</th>
                              <th>Modeli</th>
                              <th>Seç</th>
                              <th>Seri No</th>
                              <th>Durumu</th>
                              <th>Kontrol</th>
                          </tr>
                      </thead>
                      <tbody>
                         <?php $i = 1; ?>
                        @foreach ($urunler as $urun)
                            @if ($urun->oda_id == $girilenoda->id)  
                                <tr class="success">
                                    <td>{{ $i; }}</td>
                                    <td>{{ $urun->urun->model->tur->tur_adi }}</td>
                                    <td>{{ $urun->urun->model->marka->marka_adi }}</td>
                                    <td>{{ $urun->urun->model->model_adi }}</td>
                                    <td><input type="checkbox" name="seciliurunler[]" value="{{ $urun->urun->seri_no }}"></td>
                                    <td><a href="{{route('uruntiklama',$urun->urun->seri_no)}}" >{{ $urun->urun->seri_no }}</a></td>
                                    <td>
                                      <?php if ($urun->urun->durumu == 0) {
                                      echo "ÇALIŞIYOR";
                                    }else {
                                      echo "ARIZALI";
                                    } ?>
                                    </td>
                                    <td>
                                      <a data-toggle="modal" role="button" href="#default_modal{{ $urun->id; }}" class="btn btn-link btn-icon btn-xs tip" title="Sil"><i class="icon-remove3"></i></a>
                                    </td>
                                </tr>
                                <!-- Default modal -->
                                <div id="default_modal{{ $urun->id; }}" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Odadan Ürün Sil</h4>
                                            </div>

                                            <div class="modal-body with-padding">
                                                <h6>Ürünü silmek istedeğinizden emin misiniz?</h6>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                                <a type="button" class="btn btn-primary" href="{{ route('odaurun_sil',array($urun->id, $girilenoda->birim->id)) }}">Sil</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i= $i+1; ?>
                            @endif
                        @endforeach
                      </tbody>
                  </table>
                </div>
          </div>
          <div class="col-sm-6 text-right">
            <button type="submit" class="btn btn-primary">Seçilenleri Taşı</button>
          </div>
          <br>
          <hr>

        </form>
        </div>
    </div>
</div>

@if(Auth::user()->yonetici_tip == 1)
<?php $i=1; ?>
@foreach ($kayitlar as $kayit)
  @if ($kayit->durum == 0)
    <div class="bg-info with-padding">
    @if($kayit->oda_id <> NULL)
    {{$kayit->oda->oda_birlikte}} - 
    @endif
    {{$kayit->kayit}}
    <div class="col-sm-2" style="float: right;">{{date("d.m.Y H:i:s", strtotime($kayit->created_at))}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a data-toggle="modal" role="button" href="#default_modal{{ $i; }}"><i class="icon-remove3"></i></a>&nbsp;&nbsp;&nbsp;<a data-toggle="modal" role="button" href="#duzenle{{$i}}"><i class="icon-pencil"></i></a>&nbsp;&nbsp;&nbsp;<a data-toggle="modal" role="button" href="#form_modal{{$i}}"><i class="icon-checkmark3"></i></a></div></div>
      <div id="form_modal{{$i}}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> Açıklama</h4>
            </div>

            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{route('aciklamakaydet', $kayit->id)}}" method="post">

              <div class="modal-body with-padding">
                <div class="block-inner text-danger">
                  <h6 class="heading-hr">Açıklama</h6>
                </div>
               {{$kayit->kayit}}<br><br>
                <div class="form-group">
                  <div class="row">
                  <div class="col-sm-12">
                    <input type="text" name="aciklama" class="form-control" required>
                  </div>
                  </div>
                </div>

                <label class="radio-inline radio-primary">
                  <input type="radio" name="durum" class="styled" value="1" required>
                  İşlem Yapıldı
                </label>
                <label class="radio-inline radio-primary">
                  <input type="radio" name="durum" class="styled" value="2">
                  İşlem Yapılmadı
                </label>
                
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary">Kaydet</button>
              </div>

            </form>
          </div>
        </div>
      </div>
      <div id="duzenle{{$i}}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> Düzenle</h4>
            </div>

            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{route('aciklamaduzenle', $kayit->id)}}" method="post">

              <div class="modal-body with-padding">
                <div class="block-inner text-danger">
                  <h6 class="heading-hr">Düzenle</h6>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-12">
                      <input type="text" name="kayit" class="form-control" value="{{$kayit->kayit}}" required>
                      <input type="hidden" name="aciklama" class="form-control">
                        <input type="radio" name="durum" class="styled" value="0" style="display: none;" checked>
                        <input type="radio" name="durum" class="styled" value="1" style="display: none;">
                        <input type="radio" name="durum" class="styled" value="2" style="display: none;">
                    </div>
                  </div>
                </div>
                
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary">Kaydet</button>
              </div>

            </form>
          </div>
        </div>
      </div>
                <div id="default_modal{{ $i; }}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Kayıt Silinsin mi?</h4>
                            </div>

                            <div class="modal-body with-padding">
                                <h6>{{$kayit->kayit}}</h6>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                <a type="button" class="btn btn-primary" href="{{ route('kayitsil', $kayit->id) }}">Sil</a>
                            </div>
                        </div>
                    </div>
                </div>
      <?php $i=$i+1; ?>
  @elseif ($kayit->durum == 1)
    <div class="bg-primary with-padding"><a data-toggle="modal" role="button" href="#default_modal{{$i}}">
    @if($kayit->oda_id <> NULL)
    {{$kayit->oda->oda_birlikte}} - 
    @endif
    {{$kayit->kayit}}</a><div class="col-sm-2" style="float: right;">{{date("d.m.Y H:i:s", strtotime($kayit->created_at))}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a data-toggle="modal" role="button" href="#silmodal{{ $i; }}"><i class="icon-remove3"></i></a>&nbsp;&nbsp;&nbsp;<a data-toggle="modal" role="button" href="#duzenle{{$i}}"><i class="icon-pencil"></i></a></div></div>

      <div id="default_modal{{$i}}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Açıklama</h4>
            </div>

            <div class="modal-body with-padding">
              <h5 class="text-error">Açılan Kayıt</h5>
              <p>{{$kayit->kayit}}</p>

              <hr>

              <h5 class="text-error">Yapılan İşlem</h5>
              <p>{{$kayit->aciklama}}</p>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
            </div>
          </div>
        </div>
      </div>
      <div id="duzenle{{$i}}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> Düzenle</h4>
            </div>

            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{route('aciklamaduzenle', $kayit->id)}}" method="post">

              <div class="modal-body with-padding">
                <div class="block-inner text-danger">
                  <h6 class="heading-hr">Düzenle</h6>
                </div>

                <div class="form-group">
                  <div class="row">
                  <div class="col-sm-12">
                    <input type="text" name="kayit" class="form-control" value="{{$kayit->kayit}}" required>
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                  <div class="col-sm-12">
                    <input type="text" name="aciklama" class="form-control" value="{{$kayit->aciklama}}" required>
                  </div>
                  </div>
                </div>

                <label class="radio-inline radio-primary">
                  <input type="radio" name="durum" class="styled" value="1" <?php if($kayit->durum == 1) { echo "checked"; }?>>
                  İşlem Yapıldı
                </label>
                <label class="radio-inline radio-primary">
                  <input type="radio" name="durum" class="styled" value="2" <?php if($kayit->durum == 2) { echo "checked"; }?>>
                  İşlem Yapılmadı
                </label>
                
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary">Kaydet</button>
              </div>

            </form>
          </div>
        </div>
      </div>
                <div id="silmodal{{ $i; }}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Kayıt Silinsin mi?</h4>
                            </div>

                            <div class="modal-body with-padding">
                                <h6>{{$kayit->kayit}}</h6>
                            </div>

                            <div class="modal-body with-padding">
                                <h6>{{$kayit->aciklama}}</h6>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                <a type="button" class="btn btn-primary" href="{{ route('kayitsil', $kayit->id) }}">Sil</a>
                            </div>
                        </div>
                    </div>
                </div>
      <?php $i=$i+1; ?>
  @elseif ($kayit->durum == 2)
    <div class="bg-danger with-padding"><a data-toggle="modal" role="button" href="#default_modal{{$i}}">
      @if($kayit->oda_id <> NULL)
    {{$kayit->oda->oda_birlikte}} - 
    @endif
    {{$kayit->kayit}}</a><div class="col-sm-2" style="float: right;">{{date("d.m.Y H:i:s", strtotime($kayit->created_at))}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a data-toggle="modal" role="button" href="#silmodal{{ $i; }}"><i class="icon-remove3"></i></a>&nbsp;&nbsp;&nbsp;<a data-toggle="modal" role="button" href="#duzenle{{$i}}"><i class="icon-pencil"></i></a></div></div>

      <div id="default_modal{{$i}}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Açıklama</h4>
            </div>

            <div class="modal-body with-padding">
              <h5 class="text-error">Açılan Kayıt</h5>
              <p>{{$kayit->kayit}}</p>

              <hr>

              <h5 class="text-error">Yapılan İşlem</h5>
              <p>{{$kayit->aciklama}}</p>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
            </div>
          </div>
        </div>
      </div>
      <div id="duzenle{{$i}}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> Düzenle</h4>
            </div>

            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{route('aciklamaduzenle', $kayit->id)}}" method="post">

              <div class="modal-body with-padding">
                <div class="block-inner text-danger">
                  <h6 class="heading-hr">Düzenle</h6>
                </div>

                <div class="form-group">
                  <div class="row">
                  <div class="col-sm-12">
                    <input type="text" name="kayit" class="form-control" value="{{$kayit->kayit}}" required>
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                  <div class="col-sm-12">
                    <input type="text" name="aciklama" class="form-control" value="{{$kayit->aciklama}}" required>
                  </div>
                  </div>
                </div>

                <label class="radio-inline radio-primary">
                  <input type="radio" name="durum" class="styled" value="1" <?php if($kayit->durum == 1) { echo "checked"; }?>>
                  İşlem Yapıldı
                </label>
                <label class="radio-inline radio-primary">
                  <input type="radio" name="durum" class="styled" value="2" <?php if($kayit->durum == 2) { echo "checked"; }?>>
                  İşlem Yapılmadı
                </label>
                
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary">Kaydet</button>
              </div>

            </form>
          </div>
        </div>
      </div>
                <div id="silmodal{{ $i; }}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Kayıt Silinsin mi?</h4>
                            </div>

                            <div class="modal-body with-padding">
                                <h6>{{$kayit->kayit}}</h6>
                            </div>

                            <div class="modal-body with-padding">
                                <h6>{{$kayit->aciklama}}</h6>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                <a type="button" class="btn btn-primary" href="{{ route('kayitsil', $kayit->id) }}">Sil</a>
                            </div>
                        </div>
                    </div>
                </div>
      <?php $i=$i+1; ?>
  @endif
@endforeach
@endif

@stop