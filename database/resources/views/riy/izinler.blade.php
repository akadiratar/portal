@extends('riy.master')

@section('breadcrumb')
> İZİNLER
@endsection

@section('icerik')
<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">
				Sistemde Tanımlı Tüm İzinler
			</h3>
		</div>
	</div>
	<div class="kt-portlet__body">
		<ul class="nav nav-pills nav-fill" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#kt_tabs_5_2">Envanter Takip Sistemi</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#kt_tabs_5_3">Rol ve İzin Yönetimi</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#kt_tabs_5_4">SEGBİS Takip Sistemi</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#kt_tabs_5_5">Büro Personel Yönetim Sistemi</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#kt_tabs_5_6">Bina Yönetim Sistemi</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#kt_tabs_5_7">Telefon Yönetim Sistemi</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="kt_tabs_5_2" role="tabpanel">
				<div class="kt-section">
					<div class="kt-section__content">
						<table class="table table-sm table-head-bg-brand">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>İzin Adı</th>
									<th>Açıklaması</th>
									<th>Tanımlı Kullanıcılar</th>
								</tr>
							</thead>
							<tbody>
								<?php $k = 1; ?>
								@foreach($ets_permissions as $ets_permission)
								<tr>
									<th scope="row">{{$k}}</th>
									<td>{{$ets_permission->display_name}}</td>
									<td>{{$ets_permission->description}}</td>
									<td>
										<a href="{{route('riy_izin_kullanicilar', $ets_permission->id)}}">
											Kontrol Et
										</a>
									</td>
								</tr>
								<?php $k = $k + 1; ?>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="kt_tabs_5_3" role="tabpanel">
				<div class="kt-section">
					<div class="kt-section__content">
						<table class="table table-sm table-head-bg-brand">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>İzin Adı</th>
									<th>Açıklaması</th>
									<th>Tanımlı Kullanıcılar</th>
								</tr>
							</thead>
							<tbody>
								<?php $j = 1; ?>
								@foreach($riy_permissions as $riy_permission)
								<tr>
									<th scope="row">{{$j}}</th>
									<td>{{$riy_permission->display_name}}</td>
									<td>{{$riy_permission->description}}</td>
									<td>
										<a href="{{route('riy_izin_kullanicilar', $riy_permission->id)}}">
											Kontrol Et
										</a>
									</td>
								</tr>
								<?php $j = $j + 1; ?>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="kt_tabs_5_4" role="tabpanel">
				<div class="kt-section">
					<div class="kt-section__content">
						<table class="table table-sm table-head-bg-brand">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>İzin Adı</th>
									<th>Açıklaması</th>
									<th>Tanımlı Kullanıcılar</th>
								</tr>
							</thead>
							<tbody>
								<?php $m = 1; ?>
								@foreach($segbis_permissions as $segbis_permission)
								<tr>
									<th scope="row">{{$m}}</th>
									<td>{{$segbis_permission->display_name}}</td>
									<td>{{$segbis_permission->description}}</td>
									<td>
										<a href="{{route('riy_izin_kullanicilar', $segbis_permission->id)}}">
											Kontrol Et
										</a>
									</td>
								</tr>
								<?php $m = $m + 1; ?>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="kt_tabs_5_5" role="tabpanel">
				<div class="kt-section">
					<div class="kt-section__content">
						<table class="table table-sm table-head-bg-brand">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>İzin Adı</th>
									<th>Açıklaması</th>
									<th>Tanımlı Kullanıcılar</th>
								</tr>
							</thead>
							<tbody>
								<?php $b = 1; ?>
								@foreach($buro_permissions as $buro_permission)
								<tr>
									<th scope="row">{{$b}}</th>
									<td>{{$buro_permission->display_name}}</td>
									<td>{{$buro_permission->description}}</td>
									<td>
										<a href="{{route('riy_izin_kullanicilar', $buro_permission->id)}}">
											Kontrol Et
										</a>
									</td>
								</tr>
								<?php $b = $b + 1; ?>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="kt_tabs_5_6" role="tabpanel">
				<div class="kt-section">
					<div class="kt-section__content">
						<table class="table table-sm table-head-bg-brand">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>İzin Adı</th>
									<th>Açıklaması</th>
									<th>Tanımlı Kullanıcılar</th>
								</tr>
							</thead>
							<tbody>
								<?php $b = 1; ?>
								@foreach($bys_permissions as $buro_permission)
								<tr>
									<th scope="row">{{$b}}</th>
									<td>{{$buro_permission->display_name}}</td>
									<td>{{$buro_permission->description}}</td>
									<td>
										<a href="{{route('riy_izin_kullanicilar', $buro_permission->id)}}">
											Kontrol Et
										</a>
									</td>
								</tr>
								<?php $b = $b + 1; ?>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="kt_tabs_5_7" role="tabpanel">
				<div class="kt-section">
					<div class="kt-section__content">
						<table class="table table-sm table-head-bg-brand">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>İzin Adı</th>
									<th>Açıklaması</th>
									<th>Tanımlı Kullanıcılar</th>
								</tr>
							</thead>
							<tbody>
								<?php $b = 1; ?>
								@foreach($tys_permissions as $tys_permission)
								<tr>
									<th scope="row">{{$b}}</th>
									<td>{{$tys_permission->display_name}}</td>
									<td>{{$tys_permission->description}}</td>
									<td>
										<a href="{{route('riy_izin_kullanicilar', $tys_permission->id)}}">
											Kontrol Et
										</a>
									</td>
								</tr>
								<?php $b = $b + 1; ?>
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

