@extends('tys.master')

@section('breadcrumb')
> NUMARA TİPİ DETAY
@endsection

@section('icerik')
  
            <div class="kt-portlet">
                
              <div class="col-xl-12">

                  <div class="kt-portlet kt-portlet--bordered-semi kt-portlet--space kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                          {{$tip}} TİPİ DETAY
                        </h3>
                      </div>
                    </div>
                    <div class="kt-portlet__body">
                      <div class="kt-widget25">
                        <div class="kt-widget25__items">
                          <div class="kt-widget25__item">
                            <span class="kt-widget25__number">
                              {{$toplam_numara_sayisi}} ADET
                            </span>
                            <div class="progress m-progress--sm">
                              <div class="progress-bar kt-bg-info" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="kt-widget25__desc">
                              TOPLAM SAYI
                            </span>
                          </div>
                          <div class="kt-widget25__item">
                            <span class="kt-widget25__number">
                              {{$dolu_numara_sayisi}} ADET
                            </span>
                            <div class="progress m-progress--sm">
                              <div class="progress-bar kt-bg-success" role="progressbar" style="width: {{$dolu_numara_orani}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="kt-widget25__desc">
                              TANIMLANMIŞ NUMARA SAYISI
                            </span>
                          </div>
                          <div class="kt-widget25__item">
                            <span class="kt-widget25__number">
                              {{$bos_numara_sayisi}} ADET
                            </span>
                            <div class="progress kt-progress--sm">
                              <div class="progress-bar kt-bg-danger" role="progressbar" style="width: {{$bos_numara_orani}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="kt-widget25__desc">
                              TANIMLANMAMIŞ NUMARA SAYISI
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
<h6>{{ $numaralar->links() }}</h6>
<div class="kt-portlet">
  <div class="kt-portlet__head">
    <div class="kt-portlet__head-label">
      <h3 class="kt-portlet__head-title">
        {{$tip}} TİPİ NUMARALAR
      </h3>
    </div>
  </div>
  <div class="kt-portlet__body">
        <div class="row">
          @foreach($numaralar as $numara)
              @if($numara->oda_id == NULL)
                <div class="col-xl-4 col-lg-4 order-lg-2 order-xl-1 text-center">
                      <div class="alert alert-dark" role="alert">
                        <div class="alert-text"><h4><span style="color: white;" href="">{{$numara->no}}</span></h4></div>
                      </div>
                </div>
              @else
                <div class="col-xl-4 col-lg-4 order-lg-2 order-xl-1 text-center">
                    <div class="alert alert-success" role="alert">
                      <div class="alert-text"><h4><span style="color: white;" href="">{{$numara->no}} >> {{$numara->oda->oda_kodu}} </span></h4></div>
                    </div>
              </div>
              @endif
          
          @endforeach
        </div>
  </div>
</div>
<h6>{{ $numaralar->links() }}</h6>
@endsection