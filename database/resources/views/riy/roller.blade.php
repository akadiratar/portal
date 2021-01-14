@extends('riy.master')

@section('breadcrumb')
> ROLLER
@endsection

@section('sub_header')
<a href="{{route('riy_rol_olustur')}}" class="btn btn-label-brand btn-bold">
  Rol Oluştur
</a>
@endsection

@section('icerik')

<div class="row">
	<div class="col-xl-12">
		<div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Sistemde Kayıtlı Roller
					</h3>
				</div>
			</div>
			<div class="kt-portlet__body">
				<div class="tab-content">
					<div class="tab-pane active" id="kt_widget2_tab1_content">
						<div class="kt-widget2">
							@foreach($roller as $rol)
							<div class="kt-widget2__item kt-widget2__item--brand">
								<div class="kt-widget2__checkbox">
									
								</div>
								<div class="kt-widget2__info">
									<span class="kt-widget2__title">
										Rol Adı: {{$rol->name}}
									</span>
									<span class="kt-widget2__title">
										Açıklama: {{$rol->description}}
									</span>
								</div>
								<div class="kt-widget2__actions">
									
									<a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
										<i class="flaticon-more-1"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
										<ul class="kt-nav">
											<li class="kt-nav__item">
												<a href="{{route('riy_rol_kullanicilar', $rol->id)}}" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon-user"></i>
													<span class="kt-nav__link-text">Kullanıcıları Gör</span>
												</a>
											</li>
											@if($rol->name <> "administrator")
											<li class="kt-nav__item">
												<a href="{{route('riy_rol_izin_ekle', $rol->id)}}" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon-edit-1"></i>
													<span class="kt-nav__link-text">İzenleri Ayarla</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="{{route('riy_rol_duzenle', $rol->id)}}" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon-edit"></i>
													<span class="kt-nav__link-text">Düzenle</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_{{$rol->id}}">
													<i class="kt-nav__link-icon flaticon-delete"></i>
													<span class="kt-nav__link-text">Sil</span>
												</a>
											</li>
											@endif
										</ul>
									</div>
									
								</div>
							</div>

							<div class="modal fade" id="kt_modal_{{$rol->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Rol Sil</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body">
											<p><b>Rol Adı:</b> {{$rol->name}}</p>
											<p><b>Açıklama:</b> {{$rol->description}}</p><br>
											<h4 style="color: red;">Silmek istediğinizden emin misiniz?</h4>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
											<a href="{{route('riy_rol_sil', $rol->id)}}"  class="btn btn-primary">Sil</a>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

