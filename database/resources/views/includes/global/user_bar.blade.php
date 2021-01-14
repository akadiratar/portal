<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
	<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{asset('assets/media/misc/bg-1.jpg') }}">
		<div class="kt-user-card__name">
			Merhaba, {{ Auth::user()->kullanici_adi }} {{ Auth::user()->kullanici_soyadi }}
		</div>
	</div>
	<div class="kt-notification">
		<a href="{{route('parola_degistir')}}" class="kt-notification__item">
			<div class="kt-notification__item-icon">
				<i class="flaticon2-user kt-font-info"></i>
			</div>
			<div class="kt-notification__item-details">
				<div class="kt-notification__item-title kt-font-bold">
					Parola Değiştir
				</div>
				<div class="kt-notification__item-time">
					Anadolu Portal Giriş Parolası
				</div>
			</div>
		</a>
		<div class="kt-notification__custom kt-space-between">
			<span></span>
			<a href="{{ route('cikis') }}" class="btn btn-label btn-label-brand btn-sm btn-bold">Çıkış Yap</a>
		</div>
	</div>
</div>