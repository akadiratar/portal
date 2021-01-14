@extends('tys.master')

@section('breadcrumb')
> ONAYLA
@endsection

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <form class="kt-form" id="kt_form" method="POST" action="{{ route('tys_onayla_tasi_post', $oda->id) }}">
      @csrf
    <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" style="color:white; background: #263238; !important" id="kt_page_portlet">
      <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
          <h3 style="color:#22B9FF;"><code style="font-size: 24px;">
              @if($oda->birim_id == NULL)
                  {{$oda->oda_kodu}} >> Kayıtlı Değil odasına eklemek istediğiniz numaralardan;
              @else
                {{$oda->oda_kodu}} >> {{$oda->birim->birim_adi}} {{$oda->tip->oda_tipi_adi}} odasına eklemek istediğiniz numaralardan;
              @endif 
            </code></h3>
        </div>
      </div>
      <div class="kt-portlet__body">
          <div class="row">
            <div class="col-xl-2"></div>
            <div class="col-xl-12">
              @if(count($tasinanlar)>0)
              <div class="kt-section">
                <div class="kt-section__body">
                  <div class="form-group row">
                    <div class="col-12">
                      <h3 class="kt-section__title kt-section__title-lg" style="color:white;">Başarıyla eklenen numaralar;</h3>
                    </div>
                  </div>
                  <div class="form-group row">
                    @foreach($tasinanlar as $key)
                    <div class="col-4">
                      <label class="kt-font-success">{{$key}}</label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              @endif
              @if(count($tanimlilar)>0)
              <div class="kt-section">
                <div class="kt-section__body">
                  <div class="form-group row">
                    <div class="col-12">
                      <h3 class="kt-section__title kt-section__title-lg" style="color:white;">Başka odada tanımlı olan numaralara işlem yapılmadı; Taşımak istediğinizi seçin!</h3>
                    </div>
                  </div>
                  <div class="form-group row">
                    @foreach($tanimlilar as $key)
                    <div class="col-4">
                      <label class="kt-checkbox kt-checkbox--bold kt-checkbox--warning">
                        <input type="checkbox" name="tanimlilar[]" value="{{ $key->id }}"> {{$key->no}} / @if($key->oda->birim_id == NULL)
                                                                                            {{$key->oda->oda_kodu}}
                                                                                        @else
                                                                                          {{$key->oda->oda_kodu}} >> {{$key->oda->birim->birim_adi}} {{$key->oda->tip->oda_tipi_adi}}
                                                                                        @endif
                        <span></span>
                      </label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              @endif
              @if(count($kayitsizlar)>0)
              <div class="kt-section">
                <div class="kt-section__body">
                  <div class="form-group row">
                    <div class="col-12">
                      <h3 class="kt-section__title kt-section__title-lg" style="color:white;">Sisteme kayıtlı olmaması sebebiyle işlem yapılmayan numaralar;</h3>
                    </div>
                  </div>
                  <div class="form-group row">
                    @foreach($kayitsizlar as $key)
                    <div class="col-4">
                      <label class="kt-font-danger">{{$key}}</label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              @endif

              <div class="btn-group">
                <a href="{{route('tys_ara', $oda->oda_kodu)}}" class="btn btn-twitter">Odaya Git
                </a>
              </div>
              @if(count($tanimlilar)>0)
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="btn-group">
                <button type="submit" class="btn btn-twitter">
                  <i class="la la-check"></i>
                  <span class="kt-hidden-mobile">Seçilenleri Taşı</span>
                </button>
              </div>
              @endif

            </div>
            <div class="col-xl-2"></div>
          </div>
      </div>
    </div>

    </form>
  </div>
</div>

@endsection