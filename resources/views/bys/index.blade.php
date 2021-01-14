@extends('bys.master')

@section('icerik')
<div class="row">
  <div class="col-xl-12">
      <div class="kt-portlet">
        <div class="kt-portlet__body  kt-portlet__body--fit">
          <div class="row row-no-padding row-col-separator-lg">

            <div class="col-md-12 col-lg-6 col-xl-4">
              <!--begin::Total Profit-->
              <div class="kt-widget24">
                <div class="kt-widget24__details">
                  <div class="kt-widget24__info">
                    <h4 class="kt-widget24__title">
                      TOPLAM ODA SAYISI
                    </h4>
                  </div>
                  <span class="kt-widget24__stats kt-font-brand">
                    {{$toplam_oda_sayisi}}
                  </span>
                </div>
                <div class="progress progress--sm">
                  <div class="progress-bar kt-bg-brand" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="kt-widget24__action">
                  <span class="kt-widget24__change">
                    Oran
                  </span>
                  <span class="kt-widget24__number">
                    100%
                  </span>
                </div>
              </div>
              <!--end::Total Profit-->
            </div>

            <div class="col-md-12 col-lg-6 col-xl-4">
              <!--begin::New Users-->
              <div class="kt-widget24">
                <div class="kt-widget24__details">
                  <div class="kt-widget24__info">
                    <h4 class="kt-widget24__title">
                      TANIMLANMIŞ ODA SAYISI
                    </h4>
                  </div>
                  <span class="kt-widget24__stats kt-font-success">
                    {{$dolu_oda_sayisi}}
                  </span>
                </div>
                <div class="progress progress--sm">
                  <div class="progress-bar kt-bg-success" role="progressbar" style="width: {{$dolu_oda_orani}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="kt-widget24__action">
                  <span class="kt-widget24__change">
                    Oran
                  </span>
                  <span class="kt-widget24__number">
                    {{$dolu_oda_orani}}%
                  </span>
                </div>
              </div>
              <!--end::New Users-->
            </div>

            <div class="col-md-12 col-lg-6 col-xl-4">
              <!--begin::New Orders-->
              <div class="kt-widget24">
                <div class="kt-widget24__details">
                  <div class="kt-widget24__info">
                    <h4 class="kt-widget24__title">
                      BOŞ ODA SAYISI
                    </h4>
                    <span class="kt-widget24__desc">
                      <a href="{{route('bys_bos_odalar')}}">Odaları Gör</a>
                    </span>
                  </div>
                  <span class="kt-widget24__stats kt-font-danger">
                    {{$bos_oda_sayisi}}
                  </span>
                </div>
                <div class="progress progress--sm">
                  <div class="progress-bar kt-bg-danger" role="progressbar" style="width: {{$bos_oda_orani}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="kt-widget24__action">
                  <span class="kt-widget24__change">
                    Oran
                  </span>
                  <span class="kt-widget24__number">
                    {{$bos_oda_orani}}%
                  </span>
                </div>
              </div>
              <!--end::New Orders-->
            </div>

          </div>
        </div>
      </div>

      <div class="kt-portlet">
                <div class="kt-portlet__body kt-portlet__body--fit">
                  <div class="row row-no-padding row-col-separator-xl">

                    @foreach($oda_tipleri as $oda_tipi)
                    <div class="col-md-12 col-lg-12 col-xl-4">
                      <!--begin:: Widgets/Stats2-1 -->
                      <div class="kt-widget1">
                        <div class="kt-widget1__item">
                          <div class="kt-widget1__info">
                            <h3 class="kt-widget1__title"><?php echo \App\Models\OdaTipi::tip_adi_getir($oda_tipi->oda_tipi_id); ?></h3>
                            <span class="kt-widget1__desc"><a href="{{route('bys_oda_tipi_detay', $oda_tipi->oda_tipi_id)}}">Tümünü Gör</a></span>
                          </div>
                          <span class="kt-widget1__number kt-font-warning">{{$oda_tipi->toplam}} ADET</span>
                        </div>
                      </div>
                      <!--end:: Widgets/Stats2-1 -->
                    </div>
                    @endforeach

                  </div>
                </div>
              </div>
  </div>
</div>
@endsection