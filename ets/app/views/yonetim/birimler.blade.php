@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
            <li>{{ $ustbirim->birimtip->tip_adi }}</li>
            <li><a href="{{route('birimler',$ustbirim->id)}}">{{ $ustbirim->ust_birim_adi }}</a></li>
        </ul>
      </div>
<hr>
<div class="block">
  <div class="list-group">

  @foreach ($birimler as $birim)
  <div class="list-group col-md-6">
    <div class="bg-primary with-padding block-inner"><a href="{{route('birimhepsi', $birim->id)}}">{{ $birim->birim_adi }}</a></div>
    </div>
  @endforeach
  </div>
</div>

@stop
