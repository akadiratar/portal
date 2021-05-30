@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Sarf Malzeme Alttürü Düzenle</li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>
<!-- Form  -->
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >
  <!-- Basic inputs -->
    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i> Sarf Malzeme Alttürü Düzenleme Formu</h6></div>
        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Tür: </label>
            <div class="col-sm-10">
              <select name="sm_tur_id" class="form-control" required>
                  <option disabled selected value="">Seçiniz</option>
                  @foreach ($sm_turler as $sm_tur)
                    <option value="{{ $sm_tur->id }}" <?php if($sm_tur->id == $sm_alttur->sm_tur_id) {echo "selected";} ?>>{{ $sm_tur->sm_tur_adi }}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Sarf Malzeme Alttür Adı: </label>
            <div class="col-sm-10">
              <input type="text" name="sm_alttur_adi" class="form-control" value="{{ $sm_alttur->sm_alttur_adi }}" required autocomplete="off">
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