@extends('yonetim.kalip')

@section('icerik')

<div class="breadcrumb-line" style="margin: 0;">
  <ul class="breadcrumb">
    <li><a href="{{route('index')}}">Anasayfa</a></li>
    <li>Odaya Ürün Ekle</li>
  </ul>
</div>
<hr>
<?php if(!empty($serino)){ ?>
<div class="bg-info with-padding block-inner">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <?php echo $serino." seri numaralı ürünü odaya kaydedebilirsiniz."; ?>
</div>
<?php } ?>

<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >

    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i> Odaya Ürün Ekleme Formu</h6></div>
        <div class="panel-body">
          
          <div class="form-group">
            <label class="col-sm-2 control-label">Oda No: </label>
            <div class="col-sm-10">
              <input type="text" name="oda_no" class="form-control" value="" required placeholder="B4BA-14" autocomplete="off" autofocus>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Seri No: </label>
            <div class="col-sm-10">
              <input type="text" name="seri_no" class="form-control" @if(Session::has('serinumarasi')) value="{{ Session::get('serinumarasi') }}" @endif required autocomplete="off">
            </div>
          </div>
          
          <div class="form-actions text-right">
            <button type="submit" class="btn btn-primary">Ekle</button>
          </div>
        </div>
    </div>
</form>

@stop