@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Üst Birim Düzenle</li>
        </ul>
      </div>
<hr>

<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >

    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i>Üst Birim Düzenleme Formu</h6></div>
        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Birim Tipi: </label>
            <div class="col-sm-10">
              <select name="tip_id" class="form-control" required>
                  @foreach ($tipler as $tip)
                    <option value="{{ $tip->id }}" <?php if($ustbirim->tip_id == $tip->id) {echo "selected";} ?>>{{ $tip->tip_adi }}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Üst Birim Adı: </label>
            <div class="col-sm-10">
              <input type="text" name="ust_birim_adi" class="form-control" value="{{ $ustbirim->ust_birim_adi }}" required autocomplete="off">
            </div>
          </div>

          <div class="form-actions text-right">
            <button type="submit" class="btn btn-primary">Kaydet</button>
          </div>
        </div>
    </div>
</form>

@stop