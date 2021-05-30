@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Kilit Aç - Kapa</li>
        </ul>
      </div>
<hr>
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >

    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i> Kilit Aç Kapa</h6></div>
        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Kilit: </label>
            <div class="col-sm-10">
              <select name="kilit" class="form-control" required>
                  <option disabled selected value="">Seçiniz</option>
                  <option value="0">KİLİTLE</option>
                  <option value="1">KİLİDİ KALDIR</option> 
              </select>
            </div>
          </div>

          <div class="form-actions text-right">
            <button type="submit" class="btn btn-primary">Kaydet</button>
          </div>
        </div>
    </div>
</form>

@stop