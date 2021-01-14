<!doctype html>
<html lang="tr">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Anadolu Portal</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
		<link href="{{ asset('assets/css/pages/login/login-6.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/portal/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		@include('includes.global.favicon')
	</head>
	<body style="background-image: url({{ asset('assets/media/versions/portal/header.jpg') }}); background-position: center top; background-size: 100% 350px;" class="kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent">
		<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v6 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
					<div class="kt-grid__item  kt-grid__item--order-tablet-and-mobile-2  kt-grid kt-grid--hor kt-login__aside">
						<div class="kt-login__wrapper">
							<div class="kt-login__container">
								<div class="kt-login__body">
									<div class="kt-login__logo">
										<a href="#">
											<img src="{{ asset('assets/media/logos/aa-logo.png') }}" width="180">
										</a>
									</div>
									<div class="kt-login__signin">
										@if(Session::has("success"))
										<div class="alert alert-success" role="alert" style="margin-top: 40px; !important">
											<div class="alert-text">{{ Session::get("success") }}</div>
										</div>
										@endif
										@if(Session::has("danger"))
										<div class="alert alert-danger" role="alert" style="margin-top: 40px; !important">
											<div class="alert-text">{{ Session::get("danger") }}</div>
										</div>
										@endif
										<div class="kt-login__form">
											<form class="kt-form" method="POST" action="{{ route('giris') }}">
												@csrf
												<div class="form-group">
													<input class="form-control @error('kullanici_sicili') is-invalid @enderror" type="text" placeholder="Sicil" name="kullanici_sicili" value="{{ old('kullanici_sicili') }}" autofocus>
												</div>
												@error('kullanici_sicili')
													<div class="error" style="color: red;">{{ $message }}</div>
				                                @enderror
												<div class="form-group">
													<input class="form-control form-control-last @error('password') is-invalid @enderror" type="password" placeholder="Parola" name="password">
												</div>
												@error('password')
				                                    <div class="error" style="color: red;">{{ $message }}</div>
				                                @enderror
												<div class="kt-login__actions">
													<button id="kt_login_signin_submit" class="btn btn-brand btn-pill btn-elevate">Giriş Yap</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="kt-login__account">
								<span class="kt-login__account-msg">
									İstanbul Anadolu Bilgi İşlem Müdürlüğü Proje ve Yazılım Geliştirme Şubesi<br>© 2020 | Abdulkadir ATAR
								</span>
							</div>
						</div>
					</div>
					<div class="kt-grid__item kt-grid__item--fluid kt-grid__item--center kt-grid kt-grid--ver kt-login__content" style="background-image: url({{ asset('assets/media/bg/bg-4.jpg') }});">
						<div class="kt-login__section">
							<div class="kt-login__block">
								<h3 class="kt-login__title">Anadolu Portal</h3>
								<div class="kt-login__desc">
									İstanbul Anadolu Adliyesi Portal Sistemi
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#366cf3",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/portal/scripts.bundle.js') }}" type="text/javascript"></script>
	</body>
</html>