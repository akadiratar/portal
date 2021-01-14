@extends('tys.master')

@section('breadcrumb')
> {!! $secili_birim !!}
@endsection

@section('icerik')
<div class="kt-portlet">
  <div class="kt-portlet__head">
    <div class="kt-portlet__head-label">
      <h3 class="kt-portlet__head-title">
        {{$birim->birim_adi}}
      </h3>
    </div>
  </div>
  <div class="kt-portlet__body">
    <ul class="nav nav-tabs" role="tablist">
      @if(!is_null($alt_birimler) && count($alt_birimler)>0)
      <li class="nav-item">
        <a class="nav-link <?php if(!is_null($alt_birimler) && count($alt_birimler)>0) { echo 'active'; }?>" data-toggle="tab" href="#kt_tabs_1_1">BAĞLI BİRİMLER</a>
      </li>
      @endif
      @if(!is_null($odalar) && count($odalar)>0)
      <li class="nav-item">
        <a class="nav-link <?php if(!is_null($odalar) && count($alt_birimler)==0 && count($odalar)>0) { echo 'active'; }?>" data-toggle="tab" href="#kt_tabs_1_2">BAĞLI ODALAR</a>
      </li>
      @endif
    </ul>
    <div class="tab-content">
      @if(!is_null($alt_birimler) && count($alt_birimler)>0)
      <div class="tab-pane <?php if(!is_null($alt_birimler) && count($alt_birimler)>0) { echo 'active'; }?>" id="kt_tabs_1_1" role="tabpanel">
        <div class="row">
          @foreach($alt_birimler as $alt_birim)
          <div class="col-xl-6 col-lg-6 order-lg-2 order-xl-1">
            <div class="alert alert-dark" role="alert">
              <div class="alert-text"><h4><a style="color: white;" href="{{route('tys_birim_detay', $alt_birim->id)}}">{{$alt_birim->birim_adi}}</a></h4></div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @endif
      @if(!is_null($odalar) && count($odalar)>0)
      <div class="tab-pane <?php if(!is_null($odalar) && count($alt_birimler)==0 && count($odalar)>0) { echo 'active'; }?>" id="kt_tabs_1_2" role="tabpanel">
        <div class="row">
          @foreach($odalar as $oda)
          <div class="col-xl-6 col-lg-6 order-lg-2 order-xl-1">
            <div class="alert alert-dark" role="alert">
              <div class="alert-text"><a href="{{route('tys_ara', $oda->oda_kodu)}}"><h4><span style="color: white;" href="">{{$oda->oda_kodu}} >> {{$oda->tip->oda_tipi_adi}}</span></h4></a></div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection