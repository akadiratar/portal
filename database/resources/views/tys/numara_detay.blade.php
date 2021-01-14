@extends('tys.master')

@section('breadcrumb')
> NUMARA DETAY
@endsection

@section('icerik')
<div class="row">
  <div class="col-xl-12">

    <!--begin:: Widgets/Personal Income-->
    <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--height-fluid">
      <div class="kt-portlet__head kt-portlet__space-x">
        <div class="kt-portlet__head-label">
          
        </div>
      </div>
      <div class="kt-portlet__body">
        <div class="kt-widget27">
          <div class="kt-widget27__visual">
            <img src="{{asset('assets/media/bg/bg-4.jpg')}}" alt="">
            <h3 class="kt-widget27__title text-center">
              <span>{{$numara->no}}</span><br>Tipi: {{$numara->tip}}<br><span class="kt-font-warning" style="font-size: 18px;">
                @if($numara->oda_id == null) 
                Oda Bilgisi: Tanımlı Değil 
                @else 
                Oda Bilgisi: {{$numara->oda->oda_kodu}}
                  <br> 
                  @if($numara->oda->birim_id <> NULL) 
                  Oda Bilgisi: {{$numara->oda->birim->birim_adi}} 
                  @else 
                  Oda Bilgisi: TANIMLI DEĞİL 
                  @endif 
                  @if($numara->oda->oda_tipi_id <> NULL) 
                  {{$numara->oda->tip->oda_tipi_adi}} 
                  @endif 
                @endif
                
              </span>
            </h3>
          </div>
          <div class="kt-widget27__container kt-portlet__space-x">
            <ul class="nav nav-pills nav-fill" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#kt_personal_income_quater_1">NUMARA ODA GEÇMİŞ BİLGİLERİ</a>
              </li>
            </ul>
            <div class="tab-content">
              <div id="kt_personal_income_quater_1" class="tab-pane active">
                <div class="kt-widget11">
                  <div class="table-responsive">

                    @if(count($numara_odalar)>0)
                    <!--begin::Table-->
                    <table class="table">

                      <!--begin::Thead-->
                      <thead>
                        <tr>
                          <td>Oda Numarası</td>
                          <td>Eklenme Tarihi</td>
                        </tr>
                      </thead>
                      <!--end::Thead-->

                      <!--begin::Tbody-->
                      <tbody>
                        @foreach($numara_odalar as $kayit)
                        <tr>
                          <td>
                            <span class="kt-widget11__title">{{$kayit->oda->oda_kodu}}</span>
                          </td>
                          <td>
                            <span class="kt-widget11__title">{{$kayit->created_at}}</span>
                          </td>
                        </tr>
                        
                        @endforeach
                      </tbody>
                      <!--end::Tbody-->
                    </table>
                    @else
                      Herhangi bir odaya kayıtlı olmamış.
                    @endif
                    <!--end::Table-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--end:: Widgets/Personal Income-->
  </div>
</div>
@endsection