@extends('yonetim.kalip')

@section('icerik')

<div class="breadcrumb-line" style="margin: 0;">
  <ul class="breadcrumb">
    <li><a href="{{route('index')}}">Anasayfa</a></li>
    <li>Ürün Arıza Kayıt</li>
  </ul>
  <div class="visible-xs breadcrumb-toggle">
              <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
          </div>

          <ul class="breadcrumb-buttons collapse">
              <li class="language">
                  <a href="{{route('tum_ariza_kayitlari')}}" ><span>TÜM KAYITLAR</span></a>
              </li>
          </ul>
</div>
<hr>

<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >

    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i> Ürün Arıza Kayıt Formu</h6></div>
        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Bulunduğu Birim: </label>
            <div class="col-sm-10">
              <input type="text" name="birim" class="form-control" value="" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Seri No: </label>
            <div class="col-sm-10">
              <input type="text" name="seri_no" class="form-control" value="" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Arıza Açıklaması: </label>
            <div class="col-sm-10">
              <input type="text" name="aciklama" class="form-control" value="" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Yapılan İşlem: </label>
            <div class="col-sm-10">
              <input type="text" name="islem" class="form-control" value="" required autocomplete="off">
            </div>
          </div>           
          
          <div class="form-actions text-right">
            <button type="submit" class="btn btn-primary">Kaydet</button>
          </div>
        </div>
    </div>
</form>

@stop