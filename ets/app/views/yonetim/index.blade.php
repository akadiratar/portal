@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
        </ul>
      </div>
<hr>
@if(Auth::user()->yonetici_tip == 1)
<div class="block">
  <ul class="statistics">

@foreach ($turler as $tur)
    <?php $sayi = 0; $modeller = Tur::modelGetir($tur->id); ?>
    @foreach ($modeller as $model)
    <?php $urunsayisi = Urun::urunSay($model->id); ?>
        @if ($urunsayisi > 0)
            <?php $sayi = $sayi + $urunsayisi; ?>
        @endif
    @endforeach
    <li>
      
         @if ($tur->id % 4 == 0)
            <div class="statistics-info">
            <strong>{{ $sayi }}</strong>
          </div>
          <div class="progress progress-micro">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
            </div>
          </div>
          @elseif ($tur->id % 4 == 1)
            <div class="statistics-info">
            <strong>{{ $sayi }}</strong>
          </div>
          <div class="progress progress-micro">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
            </div>
          </div>
          @elseif ($tur->id % 4 == 2)
            <div class="statistics-info">
            <strong>{{ $sayi }}</strong>
          </div>
          <div class="progress progress-micro">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
            </div>
          </div>
          @elseif ($tur->id % 4 == 3)
          <div class="statistics-info">
            <strong>{{ $sayi }}</strong>
          </div>
          <div class="progress progress-micro">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
            </div>
          </div>
          @endif   
      <span>{{$tur->tur_adi}}</span>
    </li>
@endforeach
  </ul>
</div>
    <form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{route('kayitgir')}}" method="post">
        <div class="panel panel-default">
          <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i> Kayıt Gir</h6></div>
              <div class="panel-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Oda No: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="oda_no" placeholder="B4BA-14" autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Açıklama: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kayit" required autocomplete="off">
                  </div>
                </div>
                <div class="form-actions text-right">
                  <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
              </div>
        </div>
    </form>
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