@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Birim Tipi Düzenle</li>
        </ul>
      </div>
<hr>
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >
    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i>Tip Düzenleme Formu</h6></div>
        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Tip Adı: </label>
            <div class="col-sm-10">
              <input type="text" name="tip_adi" class="form-control" value="{{ $birimtip->tip_adi }}" required autocomplete="off">
            </div>
          </div>

          <div class="form-actions text-right">
            <button type="submit" class="btn btn-primary">Kaydet</button>
          </div>
        </div>
    </div>
</form>

@stop
