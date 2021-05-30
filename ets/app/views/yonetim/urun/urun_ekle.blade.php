@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Ürün Ekle</li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>
<!-- Form  -->
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >
  <!-- Basic inputs -->
    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i> Ürün Ekleme Formu</h6></div>
        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Model: </label>
            <div class="col-sm-10">
              <select name="model_id" class="form-control" required>
                  <option disabled selected value="">Seçiniz</option>
                  @foreach ($modeller as $model)
                    <option value="{{ $model->id }}">{{ $model->tur->tur_adi }} - {{ $model->marka->marka_adi }} - {{ $model->model_adi }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;({{ $model->serino_ornek }})</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Seri No: </label>
            <div class="col-sm-10">
              <input type="text" name="seri_no" class="form-control" value="" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Durumu: </label>
            <div class="col-sm-10">
              <label class="radio-inline radio-primary">
                <input type="radio" name="durum" class="styled" value="0" required>
                ÇALIŞIYOR
              </label>
              <label class="radio-inline radio-primary">
                <input type="radio" name="durum" class="styled" value="1" required>
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