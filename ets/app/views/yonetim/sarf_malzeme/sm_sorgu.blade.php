@extends('yonetim.kalip')

@section('icerik')

<!-- Breadcrumbs line -->
<div class="breadcrumb-line" style="margin: 0;">
  <ul class="breadcrumb">
    <li><a href="{{route('index')}}">Anasayfa</a></li>
      <li>Sarf Malzeme Sorgu İşlemleri</li>
  </ul>
</div>
<!-- /breadcrumbs line -->
<hr>
<!-- Button justified -->
<div class="block">
  <span class="subtitle">Sarf Malzeme Sorgu İşlemleri</span>
  <div class="well text-center block">
    <div class="btn-group btn-group-justified">
      <div class="btn-group">
        <a class="btn btn-primary" href="{{route('sm_birim_sorgula')}}">Birim Sorgula</a>
      </div>
      <div class="btn-group">
        <a class="btn btn-success" href="{{route('sm_model_sorgula')}}">Model Sorgula</a>
      </div>
      <div class="btn-group">
        <a class="btn btn-danger" href="{{route('sm_depo_durumu')}}">Depo Durumu</a>
      </div>
      <div class="btn-group">
        <a class="btn btn-primary" href="{{route('sm_birim_sayilari')}}">Birim SM Sayıları</a>
      </div>
    </div>
  </div>
</div>
<!-- /button justified -->
@stop