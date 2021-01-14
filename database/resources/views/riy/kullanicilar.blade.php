@extends('riy.master')

@section('breadcrumb')
> KULLANICILAR
@endsection

@section('icerik')

<h6>{{ $kullanicilar->links() }}</h6>

@foreach($kullanicilar as $kullanici)

<div class="kt-portlet">
	<div class="kt-portlet__body">
		<div class="kt-widget kt-widget--user-profile-3">
			<div class="kt-widget__top">
				<div class="kt-widget__content">
					<div class="kt-widget__head">
						<a href="#" class="kt-widget__username">
							{{$kullanici->kullanici_adi}} {{$kullanici->kullanici_soyadi}}
							<i class="flaticon2-correct kt-font-success"></i>
						</a>
						<div class="kt-widget__action">
							<a href="{{route('riy_kullanici_detay', $kullanici->id)}}" class="btn btn-brand btn-sm btn-upper">DETAY</a>
						</div>
					</div>
					<div class="kt-widget__subhead">
						<a href="#"><i class="flaticon2-calendar-3"></i>{{$kullanici->kullanici_sicili}}</a>
						<a href="#"><i class="flaticon2-tag"></i>{{$kullanici->unvan->unvan_adi}}</a>
						@if($kullanici->birim_id <> null)
						<a href="#"><i class="flaticon2-placeholder"></i>{{$kullanici->birim->birim_adi}}</a>
						@else
						<a href="#"><i class="flaticon2-placeholder"></i>BİRİME TANIMLI DEĞİL</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endforeach

<h6>{{ $kullanicilar->links() }}</h6>

@endsection