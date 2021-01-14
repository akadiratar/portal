@extends('tys.master')

@section('breadcrumb')
> ODA DETAY > {{$oda->oda_kodu}}
@endsection

@if(auth()->user()->can('tys.oda_numara_eslestirme'))
@section('sub_header')
<a href="{{route('tys_dahili_no_ekle', $oda->id)}}" class="btn btn-label-brand btn-bold">
  NUMARA EKLE
</a>
@endsection
@endif

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
              <span>{{$oda->oda_kodu}}</span><br><span class="kt-font-warning" style="font-size: 18px;">@if($oda->alan == null) Alan: Tanımlı Değil @else Alan: {{$oda->alan}} m² @endif <br> @if($oda->lokasyon == null) Lokasyon: Tanımlı Değil @else Lokasyon: {{$oda->lokasyon}} @endif <br> @if($oda->birim_id <> NULL) Oda Bilgisi: {{$oda->birim->birim_adi}} @else Oda Bilgisi: TANIMLI DEĞİL @endif @if($oda->oda_tipi_id <> NULL) {{$oda->tip->oda_tipi_adi}} @endif</span>
            </h3>
          </div>
          <div class="kt-widget27__container kt-portlet__space-x">
            <ul class="nav nav-pills nav-fill" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#kt_personal_income_quater_1">GÜNCEL NUMARA BİLGİLERİ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#kt_personal_income_quater_2">GEÇMİŞ NUMARA BİLGİLERİ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#kt_personal_income_quater_3">GEÇMİŞ BİRİM BİLGİLERİ</a>
              </li>
            </ul>
            <div class="tab-content">
              <div id="kt_personal_income_quater_1" class="tab-pane active">
                <div class="kt-widget11">
                  <div class="table-responsive">

                    @if(count($oda_numaralar)>0)
                    <!--begin::Table-->
                    <table class="table">

                      <!--begin::Thead-->
                      <thead>
                        <tr>
                          <td>Numara</td>
                          <td>Numara Tipi</td>
                          @if(auth()->user()->can('tys.oda_numara_eslestirme'))
                          <td class="kt-align-right">İşlemler</td>
                          @endif
                        </tr>
                      </thead>
                      <!--end::Thead-->

                      <!--begin::Tbody-->
                      <tbody>
                        @foreach($oda_numaralar as $numara)
                        <tr>
                          <td>
                            <span class="kt-widget11__title">{{$numara->no}}</span>
                          </td>
                          <td>
                            <span class="kt-widget11__title">{{$numara->tip}}</span>
                          </td>
                          @if(auth()->user()->can('tys.oda_numara_eslestirme'))
                          <td class="kt-align-right">
                                <div class="kt-portlet__head-toolbar">
                                  <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="flaticon-more-1"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right" style="">
                                      <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                          <span class="kt-nav__link">
                                            <span class="kt-nav__link-text" data-toggle="modal" data-target="#kt_modal_{{$numara->id}}">Odadan Sil</span>
                                          </span>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                <!--begin::Modal-->
                                  <div class="modal fade" id="kt_modal_{{$numara->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Numarayı Odadan Sil</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          </button>
                                        </div>
                                        <div class="text-left modal-body">
                                          <h5>{{$numara->no}} - {{$numara->tip}}</h5>
                                          <h5 style="color: red;">Numarayı odadan silmek istediğinizden emin misiniz?</h5>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                          <form class="kt-form" method="POST" action="{{ route('tys_numara_oda_sil', $numara->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Sil</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!--end::Modal-->
                          </td>
                          @endif
                        </tr>
                        
                        @endforeach
                      </tbody>
                      <!--end::Tbody-->
                    </table>
                    @else
                      Herhangi bir numara kayıtlı değil.
                    @endif
                    <!--end::Table-->
                  </div>
                </div>
              </div>
              <div id="kt_personal_income_quater_2" class="tab-pane fade">
                <div class="kt-widget11">
                  <div class="table-responsive">
                  @if(count($oda_numara_gecmis)>0)
                    <!--begin::Table-->
                    <table class="table">

                      <!--begin::Thead-->
                      <thead>
                        <tr>
                          <td>Numara</td>
                          <td>Numara Tipi</td>
                          <td>Ekleme Tarihi</td>
                        </tr>
                      </thead>

                      <!--end::Thead-->

                      <!--begin::Tbody-->
                      <tbody>
                        @foreach($oda_numara_gecmis as $gecmis)
                        <tr>
                          <td>
                            <span class="kt-widget11__title" @if($gecmis->numara->deleted_at <> null) style="color:red;" @endif>{{$gecmis->numara->no}}</span>
                          </td>
                          <td>
                            <span class="kt-widget11__title" @if($gecmis->numara->deleted_at <> null) style="color:red;" @endif>{{$gecmis->numara->tip}}</span>
                          </td>
                          <td>
                            <span class="kt-widget11__title">{{$gecmis->created_at}}</span>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>

                      <!--end::Tbody-->
                    </table>
                    @else
                      Geçmişte odada tanımlı numaralar listesinde herhangi bir kayıt bulunamadı.
                    @endif
                    <!--end::Table-->
                  </div>
                </div>
              </div>
              <div id="kt_personal_income_quater_3" class="tab-pane fade">
                <div class="kt-widget11">
                  <div class="table-responsive">
                  @if(count($oda_gecmis)>0)
                    <!--begin::Table-->
                    <table class="table">

                      <!--begin::Thead-->
                      <thead>
                        <tr>
                          <td>Üst Birim</td>
                          <td>Birim Adı</td>
                          <td>Oda Tipi</td>
                          <td>Ekleme Tarihi</td>
                        </tr>
                      </thead>

                      <!--end::Thead-->

                      <!--begin::Tbody-->
                      <tbody>
                        @foreach($oda_gecmis as $gecmis)
                        <tr>
                          <td>
                            <span class="kt-widget11__title">{{$gecmis->ust_birim_adi}}</span>
                          </td>
                          <td>
                            <span class="kt-widget11__title">{{$gecmis->birim_adi}}</span>
                          </td>
                          <td>
                            <span class="kt-widget11__title">{{$gecmis->oda_tipi_adi}}</span>
                          </td>
                          <td>
                            <span class="kt-widget11__title">{{$gecmis->created_at}}</span>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>

                      <!--end::Tbody-->
                    </table>
                    @else
                      Geçmişte odayı kullanan birimler listesinde herhangi bir kayıt bulunamadı.
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