@extends('yonetim.kalip')

@section('icerik')

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Sarf Malzeme Ürün Ara</li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>

<!-- Search line -->
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >
  <span class="subtitle"><i class="icon-search3"></i> Sarf Malzeme Ürün Ara</span>
  <div class="input-group">
    <div class="search-control">
      <input type="text" placeholder="Gelen Sarf Malzeme Seri No" name="sm_urun_serino" class="form-control" required autocomplete="off">
    </div>
    <span class="input-group-btn">
      <button class="btn btn-primary" type="submit">Ara</button>
    </span>
  </div>
</form> 
<!-- /search line -->

@stop