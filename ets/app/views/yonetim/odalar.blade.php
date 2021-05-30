@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          @if (!empty($ustmenu))
            <li>{{ $ustmenu }}</li>
          @endif
          @if (!empty($menu))
            <li>{{ $menu }}</li>
          @endif
        </ul>
      </div>
<hr>


<div class="block">
@foreach ($odalar as $oda)
    <div class="list-group col-md-4">
        <div class="bg-primary with-padding block-inner" style="height: 50px;"><a href="{{ route('urunler', $oda->oda_birlikte) }}">{{ $oda->oda_birlikte }} - {{ $oda->birim->birim_adi }} {{ $oda->aciklama }}</a></div>                          
    </div>
@endforeach
</div>
<br><br>
<br>
<br>
<hr>



@stop
