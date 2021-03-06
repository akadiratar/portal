@extends('bys.master')

@section('breadcrumb')
> <a href="{{ route('bys_oda_tipleri') }}">ODA TİPLERİ</a>
@endsection

@if(auth()->user()->can('bys.yapi_islemleri'))
@section('sub_header')
<a href="{{route('bys_oda_tipi_ekle')}}" class="btn btn-label-brand btn-bold">
  ODA TİPİ EKLE
</a>
@endsection
@endif

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Oda Tipleri
          </h3>
        </div>
      </div>
      <div class="kt-portlet__body">
        <div class="kt-section">
          <div class="kt-section__content">
            <table class="table table-sm table-head-bg-brand">
              <thead class="thead-inverse">
                <tr>
                  <th>#</th>
                  <th>Oda Tipi Adı</th>
                  @if(auth()->user()->can('bys.yapi_islemleri'))
                  <th>İşlemler</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach($oda_tipleri as $oda_tipi)
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{$oda_tipi->oda_tipi_adi}}</td>
                  @if(auth()->user()->can('bys.yapi_islemleri'))
                  <td>
                    <div class="kt-widget2__actions">
                      <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                        <i class="flaticon-more-1"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                        <ul class="kt-nav">
                          <li class="kt-nav__item">
                            <a href="{{route('bys_oda_tipi_duzenle', $oda_tipi->id)}}" class="kt-nav__link">
                              <i class="kt-nav__link-icon flaticon-edit"></i>
                              <span class="kt-nav__link-text">Düzenle</span>
                            </a>
                          </li>
                          <li class="kt-nav__item">
                            <a class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_{{$oda_tipi->id}}">
                              <i class="kt-nav__link-icon flaticon-delete"></i>
                              <span class="kt-nav__link-text">Sil</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </td>
                  @endif
                </tr>
                @if(auth()->user()->can('bys.yapi_islemleri'))
                <div class="modal fade" id="kt_modal_{{$oda_tipi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Oda Tipi Sil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                      </div>
                      <div class="modal-body">
                        <p><b>Oda Tipi Adı:</b> {{$oda_tipi->oda_tipi_adi}}</p>
                        <h4 style="color: red;">Silmek istediğinizden emin misiniz?</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        <a href="{{route('bys_oda_tipi_sil', $oda_tipi->id)}}"  class="btn btn-primary">Sil</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
                <?php $i = $i + 1; ?>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection