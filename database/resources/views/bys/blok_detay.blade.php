@extends('bys.master')

@section('breadcrumb')
> {{$blok->blok_adi}} BLOK
@endsection

@section('icerik')
<div class="kt-portlet">
  <div class="kt-portlet__head">
    <div class="kt-portlet__head-label">
      <h3 class="kt-portlet__head-title">
        {{$blok->blok_adi}} BLOK
      </h3>
    </div>
  </div>
  <div class="kt-portlet__body">

        <div class="row">
          @foreach($katlar as $kat)
          <div class="col-xl-6 col-lg-6 order-lg-2 order-xl-1">
            <div class="alert alert-dark" role="alert">
              <div class="alert-text"><h4><a style="color: white;" href="{{route('bys_kat_detay', $kat->id)}}">{{$kat->kat_adi}}. KAT</a></h4></div>
            </div>
          </div>
          @endforeach
        </div>
  </div>
</div>
@endsection
