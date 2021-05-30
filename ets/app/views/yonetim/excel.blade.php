@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Excel Rapor</li>
        </ul>
      </div>
<hr>

<div class="col-md-6">
  <a href="{{route('sistemyedegi')}}"><button type="button" class="btn btn-block btn-primary">Sistem Yedeği Al (Envanter Takip Sistemindeki odaya kayıtlı bütün ürünler.)</button></a>
</div>

<div class="col-md-6">
  <a href="{{route('model_sayilari')}}"><button type="button" class="btn btn-block btn-primary col-md-4">Sistemdeki Modeller ve Sayıları</button></a>
</div>

@stop