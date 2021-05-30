@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Model Düzenle</li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>
<!-- Form  -->
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >
  <!-- Basic inputs -->
    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i> Model Düzenleme Formu</h6></div>
        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Tür: </label>
            <div class="col-sm-10">
              <select name="tur_id" class="form-control" required>
                  <option disabled selected value="">Seçiniz</option>
                  @foreach ($turler as $tur)
                    <option value="{{ $tur->id }}" <?php if($tur->id == $model->tur_id) {echo "selected";} ?>>{{ $tur->tur_adi }}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Marka: </label>
            <div class="col-sm-10">
              <select name="marka_id" class="form-control" required>
                  <option disabled selected value="">Seçiniz</option>
                  @foreach ($markalar as $marka)
                    <option value="{{ $marka->id }}" <?php if($marka->id == $model->marka_id) {echo "selected";} ?>>{{ $marka->marka_adi }}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Model Adı: </label>
            <div class="col-sm-10">
              <input type="text" name="model_adi" class="form-control" value="{{ $model->model_adi }}" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Örnek Seri No: </label>
            <div class="col-sm-10">
              <input type="text" name="serino_ornek" class="form-control" value="" required autocomplete="off">
            </div>
          </div>
          
          <div class="form-actions text-right">
            <button type="submit" class="btn btn-primary">Kaydet</button>
          </div>
        </div>
    </div>
  <!-- /basic inputs -->
</form>
<!-- /Form  -->

@stop