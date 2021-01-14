@extends('bys.master')

@section('breadcrumb')
> <a href="{{ route('bys_odalar') }}">ODALAR</a>
@endsection

@if(auth()->user()->can('bys.yapi_islemleri'))
@section('sub_header')
<a href="{{route('bys_oda_ekle')}}" class="btn btn-label-brand btn-bold">
  ODA EKLE
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
            Odalar
          </h3>
        </div>
      </div>
      <div class="kt-portlet__body">
        <h6>{{ $odalar->links() }}</h6>
        <div class="kt-section">
          <div class="kt-section__content">
            <table class="table table-sm table-head-bg-brand">
              <thead class="thead-inverse">
                <tr>
                  <th>Blok Adı</th>
                  <th>Kat Adı</th>
                  <th>Oda Numarası</th>
                  <th>Oda Kodu</th>
                  @if(auth()->user()->can('bys.yapi_islemleri'))
                  <th>İşlemler</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @foreach($odalar as $oda)
                <tr>
                  <td>{{$oda->kat->blok->blok_adi}} BLOK</td>
                  <td>{{$oda->kat->kat_adi}}. KAT</td>
                  <td>{{$oda->oda_numarasi}} NUMARALI ODA</td>
                  <td>{{$oda->oda_kodu}}</td>
                  @if(auth()->user()->can('bys.yapi_islemleri'))
                  <td>
                    <div class="kt-widget2__actions">
                      <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                        <i class="flaticon-more-1"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                        <ul class="kt-nav">
                          <li class="kt-nav__item">
                            <a href="{{route('bys_oda_duzenle', $oda->id)}}" class="kt-nav__link">
                              <i class="kt-nav__link-icon flaticon-edit"></i>
                              <span class="kt-nav__link-text">Düzenle</span>
                            </a>
                          </li>
                          <li class="kt-nav__item">
                            <a class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_{{$oda->id}}">
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
                <div class="modal fade" id="kt_modal_{{$oda->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Oda Sil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                      </div>
                      <div class="modal-body">
                        <p><b>Blok Adı:</b> {{$oda->kat->blok->blok_adi}} BLOK</p>
                        <p><b>Kat Adı:</b> {{$oda->kat->kat_adi}}. KAT</p>
                        <p><b>Kat Adı:</b> {{$oda->oda_numarasi}}. NUMARALI ODA</p>
                        <h4 style="color: red;">Silmek istediğinizden emin misiniz?</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        <a href="{{route('bys_oda_sil', $oda->id)}}"  class="btn btn-primary">Sil</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <h6>{{ $odalar->links() }}</h6>
      </div>
    </div>
  </div>
</div>
@endsection