@extends('tys.master')

@section('breadcrumb')
> <a href="{{ route('tys_diger_numaralar') }}">DİĞER NUMARALAR</a>
@endsection


@if(auth()->user()->can('tys.diger_numara_islemleri'))
@section('sub_header')
<a href="{{route('tys_yeni_numara_ekle')}}" class="btn btn-label-brand btn-bold">
  YENİ NUMARA EKLE
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
            Sisteme Kayıtlı Diğer Numaralar
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
                  <th>Numara</th>
                  <th>Numara Tipi</th>
                  <th>Oda Bilgisi</th>
                  @if(auth()->user()->can('tys.diger_numara_islemleri'))
                  <th>İşlemler</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach($diger_numaralar as $numara)
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{$numara->no}}</td>
                  <td>{{$numara->tip}}</td>
                   @if($numara->oda_id <> null)
                  <td>{{$numara->oda->oda_kodu}}</td>
                  @else
                  <td>KAYITLI DEĞİL</td>
                  @endif
                  @if(auth()->user()->can('tys.diger_numara_islemleri'))
                  <td>
                    <div class="kt-widget2__actions">
                      <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                        <i class="flaticon-more-1"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                        <ul class="kt-nav">
                          <li class="kt-nav__item">
                            <a class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_{{$numara->id}}">
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
                <div class="modal fade" id="kt_modal_{{$numara->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Numara Sil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                      </div>
                      <div class="modal-body">
                        <p><b>Numara:</b> {{$numara->no}}</p>
                        <p><b>Numara Tipi:</b> {{$numara->tip}}</p>
                        <h4 style="color: red;">Silmek istediğinizden emin misiniz?</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        <form class="kt-form" method="POST" action="{{route('tys_diger_numara_sil', $numara->id)}}">
                          @csrf
                          <button class="btn btn-primary">Sil</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
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