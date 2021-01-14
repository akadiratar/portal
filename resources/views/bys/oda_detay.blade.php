@extends('bys.master')

@section('breadcrumb')
> ODA DETAY > {{$oda->oda_kodu}}
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
              <span>{{$oda->oda_kodu}}</span><br><span class="kt-font-warning" style="font-size: 18px;">@if($oda->alan == null) Alan: Tanımlı Değil @else Alan: {{$oda->alan}} m² @endif <br> @if($oda->lokasyon == null) Lokasyon: Tanımlı Değil @else Lokasyon: {{$oda->lokasyon}} @endif</span> <br>
              -
              @foreach($oda_numaralar as $numara)
              {{$numara->no}} -
              @endforeach
            </h3>
            @if($oda->alan == null || $oda->lokasyon == null || auth()->user()->can('bys.oda_bilgi_guncelle'))
            <div class="kt-widget27__btn">
              <span class="btn btn-pill btn-light btn-elevate btn-bold" data-toggle="modal" data-target="#kt_modal_2">Bilgileri Güncelle</span>
            </div>
              <!--begin::Modal-->
              <div class="modal fade" id="kt_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">{{$oda->oda_kodu}} >> Bilgileri Güncelle</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      </button>
                    </div>
                    <form class="kt-form" method="POST" action="{{ route('bys_oda_bilgi_guncelle', $oda->id) }}">
                        @csrf
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="recipient-name" class="form-control-label">Alan:</label>
                          <input type="number" name="alan" value="{{$oda->alan}}" class="form-control" id="recipient-name">
                          <span class="form-text text-muted">Lütfen odanın kaç m² olduğunu yazın.</span>
                          @error('alan')
                            <div class="error" style="color: red;">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleSelect1">Lokasyon</label>
                          <select class="form-control" name="lokasyon" id="exampleSelect1">
                            <option disabled="disabled" selected="selected">Seçiniz!</option>
                            <option value="Kuzey Doğu" @if($oda->lokasyon == 'Kuzey Doğu') selected="selected" @endif>Kuzey Doğu</option>
                            <option value="Kuzey Batı" @if($oda->lokasyon == 'Kuzey Batı') selected="selected" @endif>Kuzey Batı</option>
                            <option value="Güney Doğu" @if($oda->lokasyon == 'Güney Doğu') selected="selected" @endif>Güney Doğu</option>
                            <option value="Güney Batı" @if($oda->lokasyon == 'Güney Batı') selected="selected" @endif>Güney Batı</option>
                            <option value="C BLOK" @if($oda->lokasyon == 'C BLOK') selected="selected" @endif>C BLOK</option>
                            <option value="D BLOK" @if($oda->lokasyon == 'D BLOK') selected="selected" @endif>D BLOK</option>
                            <option value="E BLOK" @if($oda->lokasyon == 'E BLOK') selected="selected" @endif>E BLOK</option>
                          </select>
                          <span class="form-text text-muted">Lütfen odanın bulunduğu lokasyonu seçin.</span>
                          @error('lokasyon')
                            <div class="error" style="color: red;">{{ $message }}</div>
                          @enderror
                        </div>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                      <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <!--end::Modal-->
              @endif
          </div>
          <div class="kt-widget27__container kt-portlet__space-x">
            <ul class="nav nav-pills nav-fill" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#kt_personal_income_quater_1">GÜNCEL BİRİM BİLGİSİ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#kt_personal_income_quater_2">GEÇMİŞ BİRİM BİLGİLERİ</a>
              </li>
            </ul>
            <div class="tab-content">
              <div id="kt_personal_income_quater_1" class="tab-pane active">
                <div class="kt-widget11">
                  <div class="table-responsive">

                    <!--begin::Table-->
                    <table class="table">

                      <!--begin::Thead-->
                      <thead>
                        <tr>
                          <td>Üst Birim</td>
                          <td>Birim Adı</td>
                          <td>Oda Tipi</td>
                          @if(auth()->user()->can('bys.birim_oda_eslestirme'))
                          <td class="kt-align-right">İşlemler</td>
                          @endif
                        </tr>
                      </thead>

                      <!--end::Thead-->

                      <!--begin::Tbody-->
                      <tbody>
                        <tr>
                          <td>
                            <span class="kt-widget11__title">@if($oda->birim_id <> NULL) @if($oda->birim->ust_birim_id == 0) TEMEL BİRİM @else {{$oda->birim->birim->birim_adi}} @endif @else TANIMLI DEĞİL @endif</span>
                          </td>
                          <td>
                            <span class="kt-widget11__title">@if($oda->birim_id <> NULL) <a href="{{route('bys_birim_detay', $oda->birim->id)}}">{{$oda->birim->birim_adi}}</a> @else TANIMLI DEĞİL @endif</span>
                          </td>
                          <td><span class="kt-widget11__title">@if($oda->oda_tipi_id <> NULL) {{$oda->tip->oda_tipi_adi}} @else TANIMLI DEĞİL @endif</span></td>
                          @if(auth()->user()->can('bys.birim_oda_eslestirme'))
                          <td class="kt-align-right">

                            @if($oda->birim_id == NULL)
                                <div class="kt-portlet__head-toolbar">
                                  <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="flaticon-more-1"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right" style="">
                                      <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                          <a href="{{route('bys_birim_oda_guncelle', $oda->id)}}" class="kt-nav__link">
                                            <span class="kt-nav__link-text">Birime Tanımla</span>
                                          </a>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                            @else
                                <div class="kt-portlet__head-toolbar">
                                  <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="flaticon-more-1"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right" style="">
                                      <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                          <a href="{{route('bys_birim_oda_guncelle', $oda->id)}}" class="kt-nav__link">
                                            <span class="kt-nav__link-text">Birimi Güncelle</span>
                                          </a>
                                        </li>
                                        <li class="kt-nav__item">
                                          <span class="kt-nav__link">
                                            <span class="kt-nav__link-text" data-toggle="modal" data-target="#kt_modal_1">Birimi Sil</span>
                                          </span>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                <!--begin::Modal-->
                                  <div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Odadan Tanımlı Birimi Sil</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          </button>
                                        </div>
                                        <div class="text-left modal-body">
                                          <h5>{{$oda->oda_kodu}} >> {{$oda->birim->birim_adi}} {{$oda->tip->oda_tipi_adi}}</h5>
                                          <h5 style="color: red;">Birimi silip odayı boş bırakmak istediğinizden emin misiniz?</h5>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                          <form class="kt-form" method="POST" action="{{ route('bys_oda_birim_sil', $oda->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Sil</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!--end::Modal-->
                            @endif

                          </td>
                          @endif
                        </tr>
                      </tbody>
                      <!--end::Tbody-->
                    </table>
                    <!--end::Table-->
                  </div>
                </div>
              </div>
              <div id="kt_personal_income_quater_2" class="tab-pane fade">
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