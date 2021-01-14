@extends('tys.master')

@section('breadcrumb')
> SİLİNEN NUMARALAR
@endsection

@section('icerik')

<div class="row">
  <div class="col-lg-12">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Silinen Numaralar
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
                  <th>İşlemler</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach($silinen_numaralar as $numara)
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td><b style="color: red;">{{$numara->no}}</b></td>
                  <td><b style="color: red;">{{$numara->tip}}</b></td>
                  <td>
                    <div class="kt-widget2__actions">
                      <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                        <i class="flaticon-more-1"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                        <ul class="kt-nav">
                          <li class="kt-nav__item">
                            <a class="kt-nav__link" data-toggle="modal" data-target="#kt_modal2_{{$numara->id}}">
                              <i class="kt-nav__link-icon flaticon-reply"></i>
                              <span class="kt-nav__link-text">Geri Yükle</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>

                <div class="modal fade" id="kt_modal2_{{$numara->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Silinen Numarayı Geri Yükle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                      </div>
                      <div class="modal-body">
                        <p><b>Numara:</b> {{$numara->no}}</p>
                        <p><b>Numara Tipi:</b> {{$numara->tip}}</p>
                        <h4 style="color: red;">Numarayı geri yüklemek istediğinizden emin misiniz?</h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        <a href="{{route('tys_numara_geri_yukle', $numara->id)}}"  class="btn btn-success">Geri Yükle</a>
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