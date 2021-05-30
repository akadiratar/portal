@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Yönetici Düzenle</li>
        </ul>
      </div>
<hr>
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >

    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i>Yönetici Düzenleme Formu</h6></div>
        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Yönetici Tipi: </label>
            <div class="col-sm-10">
              <select name="yonetici_tip" class="form-control" required>
                  <option disabled value="">Seçiniz</option>
                    <option value="1" <?php if($yonetici->yonetici_tip == 1) {echo "selected";} ?> >Üst Yönetici</option>
                    <option value="0" <?php if($yonetici->yonetici_tip == 0) {echo "selected";} ?> >Normal Yönetici</option>
                    <option value="2" <?php if($yonetici->yonetici_tip == 2) {echo "selected";} ?> >Ziyaretçi</option>
                    <option value="3" <?php if($yonetici->yonetici_tip == 3) {echo "selected";} ?> >Teknisyen</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Adı Soyadı: </label>
            <div class="col-sm-10">
              <input type="text" name="yonetici_adi" class="form-control" value="{{ $yonetici->yonetici_adi }}" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Sicili: </label>
            <div class="col-sm-10">
              <input type="text" name="yonetici_sicili" class="form-control" value="{{ $yonetici->yonetici_sicili }}" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Ünvanı: </label>
            <div class="col-sm-10">
              <input type="text" name="yonetici_unvani" class="form-control" value="{{ $yonetici->yonetici_unvani }}" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Şifresi: </label>
            <div class="col-sm-10">
              <input type="password" name="sifre" class="form-control" value="" autocomplete="off">
            </div>
          </div>

          <div class="form-actions text-right">
            <button type="submit" class="btn btn-primary">Kaydet</button>
          </div>
        </div>
    </div>
</form>

@stop
