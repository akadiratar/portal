@extends('riy.master')

@section('breadcrumb')
> <a href="{{ route('riy_izinler') }}">İZİNLER</a> > {{$izin->display_name}} İZNİNE SAHİP KULLANICILAR
@endsection

@section('icerik')
<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">
				{{$izin->display_name}} İZNİNE SAHİP KULLANICILAR
			</h3>
		</div>
	</div>
	<div class="kt-portlet__body">
		<div class="tab-content">
			<div class="tab-pane active" id="kt_tabs_5_2" role="tabpanel">
				<div class="kt-section">
					<div class="kt-section__content">
						<table class="table table-sm table-head-bg-brand">
							<thead class="thead-inverse">
								<tr>
									<th>#</th>
									<th>Adı Soyadı</th>
									<th>Sicili</th>
									<th>Ünvanı</th>
									<th>Birimi</th>
									<th>Detay</th>
								</tr>
							</thead>
							<tbody>
								<?php $k = 1; ?>
								@foreach($kullanicilar as $kullanici)
								<tr>
									<th scope="row">{{$k}}</th>
									<td>{{$kullanici->kullanici_adi}} {{$kullanici->kullanici_soyadi}}</td>
									<td>{{$kullanici->kullanici_sicili}}</td>
									<td>{{$kullanici->unvan->unvan_adi}}</td>
									<td>
										@if($kullanici->birim_id <> null)
										{{$kullanici->birim->birim_adi}}
										@else
										BİRİME TANIMLI DEĞİL
										@endif
									</td>
									<td><a href="{{route('riy_kullanici_detay', $kullanici->id)}}">DETAY</a></td>
								</tr>
								<?php $k = $k + 1; ?>
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

