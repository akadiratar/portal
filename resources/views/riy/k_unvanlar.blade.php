@extends('riy.master')

@section('breadcrumb')
> KULLANICI ÜNVANLARI
@endsection

@section('sub_header')
<a href="{{route('riy_unvan_ekle')}}" class="btn btn-label-brand btn-bold">
  Ünvan Ekle
</a>
@endsection

@section('icerik')

<div class="row">
	<div class="col-xl-12">
		<div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Sistemde Kayıtlı Kullanıcı Ünvanları
					</h3>
				</div>
			</div>
			<div class="kt-portlet__body">
				<div class="tab-content">
					<div class="tab-pane active" id="kt_widget2_tab1_content">
						<div class="kt-widget2">
							<table class="table table-sm table-head-bg-brand">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>Ünvan Adı</th>
									<th>İşlemler</th>
								</tr>
							</thead>
							<tbody>
								<?php $m = 1; ?>
								@foreach($unvanlar as $unvan)
								<tr>
									<th scope="row">{{$m}}</th>
									<td>{{$unvan->unvan_adi}}</td>
									<td>
					                    <div class="kt-widget2__actions">
					                      <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
					                        <i class="flaticon-more-1"></i>
					                      </a>
					                      <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
					                        <ul class="kt-nav">
					                          <li class="kt-nav__item">
					                            <a href="{{route('riy_unvan_duzenle', $unvan->id)}}" class="kt-nav__link">
					                              <i class="kt-nav__link-icon flaticon-edit"></i>
					                              <span class="kt-nav__link-text">Düzenle</span>
					                            </a>
					                          </li>
					                          <li class="kt-nav__item">
					                            <a class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_{{$unvan->id}}">
					                              <i class="kt-nav__link-icon flaticon-delete"></i>
					                              <span class="kt-nav__link-text">Sil</span>
					                            </a>
					                          </li>
					                        </ul>
					                      </div>
					                    </div>
					                  </td>
								</tr>

								<div class="modal fade" id="kt_modal_{{$unvan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				                  <div class="modal-dialog" role="document">
				                    <div class="modal-content">
				                      <div class="modal-header">
				                        <h5 class="modal-title" id="exampleModalLabel">Ünvan Sil</h5>
				                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                        </button>
				                      </div>
				                      <div class="modal-body">
				                        <p><b>Ünvan Adı:</b> {{$unvan->unvan_adi}}</p>
				                        <h4 style="color: red;">Silmek istediğinizden emin misiniz?</h4>
				                      </div>
				                      <div class="modal-footer">
				                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
				                        <a href="{{route('riy_unvan_sil', $unvan->id)}}"  class="btn btn-primary">Sil</a>
				                      </div>
				                    </div>
				                  </div>
				                </div>
								<?php $m = $m + 1; ?>
								@endforeach
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

