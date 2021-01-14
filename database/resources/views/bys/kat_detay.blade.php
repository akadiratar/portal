@extends('bys.master')

@section('breadcrumb')
> <a href="{{route('bys_blok_detay', $kat->blok->id)}}">{{$kat->blok->blok_adi}} BLOK</a> > {{$kat->kat_adi}}. KAT
@endsection

@section('icerik')
<div class="kt-portlet">
  <div class="kt-portlet__head">
    <div class="kt-portlet__head-label">
      <h3 class="kt-portlet__head-title">
        {{$kat->blok->blok_adi}}. BLOK {{$kat->kat_adi}}. KAT
      </h3>
    </div>
  </div>
  <div class="kt-portlet__body">
        <div class="row">
          @foreach($odalar as $oda)
          <div class="col-xl-6 col-lg-6 order-lg-2 order-xl-1">
              @if($oda->birim_id == NULL)
                <div class="alert alert-dark" role="alert">
                  <div class="alert-text"><a href="{{route('bys_oda_ara', $oda->oda_kodu)}}"><h4><span style="color: white;" href="">{{$oda->oda_kodu}} >> Kayıtlı Değil</span></h4></a></div>
                </div>
              @else
                <div class="alert alert-success" role="alert">
                  <div class="alert-text"><a href="{{route('bys_oda_ara', $oda->oda_kodu)}}"><h4><span style="color: white;" href="">{{$oda->oda_kodu}} >> {{$oda->birim->birim_adi}} {{$oda->tip->oda_tipi_adi}}</span></h4></a></div>
                </div>
              @endif
          </div>
          @endforeach
        </div>
  </div>
</div>
@endsection