@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Sarf Malzeme Ürün Ekle</li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>
<!-- Form  -->
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >
  <!-- Basic inputs -->
    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i> Sarf Malzeme Ürün Ekleme Formu</h6></div>
        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Sarf Malzeme Türü: </label>
            <div class="col-sm-10">
              <select name="sm_alttur_id" class="form-control" required>
                  <option disabled selected value="">Seçiniz</option>
                  @foreach ($sm_altturler as $sm_alttur)
                    <option value="{{ $sm_alttur->id }}">{{ $sm_alttur->smtur->sm_tur_adi }} - {{ $sm_alttur->sm_alttur_adi }}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Sarf Malzeme Seri No: </label>
            <div class="col-sm-10">
              <input type="text" name="sm_urun_serino" class="form-control" value="" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Durumu: </label>
            <div class="col-sm-10">
              <label class="radio-inline radio-primary">
                <input type="radio" name="sm_urun_durumu" class="styled" value="0" checked>
                ÇALIŞIYOR
              </label>
              <label class="radio-inline radio-primary">
                <input type="radio" name="sm_urun_durumu" class="styled" value="1">
                ARIZALI
              </label>
            </div>
          </div>
          
          <div class="form-actions text-right">
            <button type="submit" class="btn btn-primary">Ekle</button>
          </div>
        </div>
    </div>
  <!-- /basic inputs -->
</form>
<!-- /Form  -->

@stop