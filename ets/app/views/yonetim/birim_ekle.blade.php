@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Birim Ekle</li>
        </ul>
      </div>
<hr>

<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >

    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i> Birim Ekleme Formu</h6></div>
        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Üst Birim: </label>
            <div class="col-sm-10">
              <select name="ust_birim_id" class="form-control" required>
                  <option disabled selected value="">Seçiniz</option>
                  @foreach ($ustbirimler as $ustbirim)
                    <option value="{{ $ustbirim->id }}">{{ $ustbirim->ust_birim_adi }}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Birim Adı: </label>
            <div class="col-sm-10">
              <input type="text" name="birim_adi" class="form-control" value="" required autocomplete="off">
            </div>
          </div>
          
          <div class="form-actions text-right">
            <button type="submit" class="btn btn-primary">Ekle</button>
          </div>
        </div>
    </div>
</form>

@stop