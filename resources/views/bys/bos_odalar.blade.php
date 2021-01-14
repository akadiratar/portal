@extends('bys.master')

@section('breadcrumb')
> BOŞ ODALAR
@endsection

@section('icerik')

<div class="kt-portlet">
  <div class="kt-portlet__head">
    <div class="kt-portlet__head-label">
      <h3 class="kt-portlet__head-title">
        TÜM BLOKLARDAKİ BOŞ ODALAR
      </h3>
    </div>
  </div>
  <div class="kt-portlet__body">
        <div class="row">
          @foreach($bos_odalar as $oda)
          <div class="col-xl-3 col-lg-3 order-lg-2 order-xl-1 text-center">
                <div class="alert alert-dark" role="alert">
                  <div class="alert-text"><a href="{{route('bys_oda_ara', $oda->oda_kodu)}}"><h4><span style="color: white;" href="">{{$oda->oda_kodu}}</span></h4></a></div>
                </div>
          </div>
          @endforeach
        </div>
  </div>
</div>

@endsection