<!doctype html>
<html lang="tr">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Anadolu Portal</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/portal/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		@include('includes.global.favicon')
	</head>
	<body class="kt-quick-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed">
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="{{ route('/') }}">
					<img src="{{ asset('assets/media/logos/aa-logo.png') }}" width="80" style="margin-top: 25px;" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
			</div>
		</div>
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
					<div id="kt_header" class="kt-header  kt-header--fixed " data-ktheader-minimize="on">
						<div class="kt-container  kt-container--fluid ">
							<div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
								<a href="{{ route('/') }}">
									<img src="{{ asset('assets/media/logos/aa-logo.png') }}" width="100" style="margin-top: 25px;" />
								</a>
							</div>
							<div class="kt-header__brand   kt-grid__item" id="kt_header_brand">

							</div>
							<div class="kt-header__topbar kt-grid__item">
								<div class="kt-header__topbar-item kt-header__topbar-item--user">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										<span class="kt-header__topbar-welcome">Merhaba,</span>
										<span class="kt-header__topbar-username">{{ Auth::user()->kullanici_adi }}</span>
										<span class="kt-header__topbar-icon"><i class="flaticon2-user-outline-symbol"></i></span>
									</div>
									@include('includes.global.user_bar')
								</div>
							</div>
						</div>
					</div>
					<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
						<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
							<div class="kt-container  kt-grid__item kt-grid__item--fluid">
								<br><br>

								<div class="row">

								  <div class="col-lg-12">
								  	@if(Session::has("success"))
									<div class="alert alert-success fade show" role="alert">
										<div class="alert-icon"><i class="flaticon-like"></i></div>
										<div class="alert-text">{{ Session::get("success") }}</div>
										<div class="alert-close">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true"><i class="la la-close"></i></span>
											</button>
										</div>
									</div>
									@endif
									@if(Session::has("danger"))
									<div class="alert alert-danger fade show" role="alert">
										<div class="alert-icon"><i class="flaticon-circle"></i></div>
										<div class="alert-text">{{ Session::get("danger") }}</div>
										<div class="alert-close">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true"><i class="la la-close"></i></span>
											</button>
										</div>
									</div>
									@endif
									@if(Session::has("info"))
									<div class="alert alert-info fade show" role="alert">
										<div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
										<div class="alert-text">{{ Session::get("info") }}</div>
										<div class="alert-close">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true"><i class="la la-close"></i></span>
											</button>
										</div>
									</div>
									@endif
								    <div class="kt-portlet">
								      <div class="kt-portlet__head">
								        <div class="kt-portlet__head-label">
								          <h3 class="kt-portlet__head-title">
								            Parola Değiştir
								          </h3>
								        </div>
								      </div>
								      <form class="kt-form" method="POST" action="">
								      	    @csrf
									      	<div class="kt-portlet__body">
									      		<div class="form-group row">
									              <label>Geçerli Parola:</label>
									              <input type="password" name="eskisifre" class="form-control @error('eskisifre') is-invalid @enderror" value="">
									              <span class="form-text text-muted">Geçerli parolanızı girin.</span>
									              @error('eskisifre')
									                <div class="error" style="color: red;">{{ $message }}</div>
									              @enderror
									            </div>
									            <div class="form-group row">
									              <label>Yeni Parola:</label>
									              <input type="password" name="yenisifre" class="form-control @error('yenisifre') is-invalid @enderror" value="">
									              <span class="form-text text-muted">Yeni parolanızı girin.</span>
									              @error('yenisifre')
									                <div class="error" style="color: red;">{{ $message }}</div>
									              @enderror
									            </div>
									            <div class="form-group row">
									              <label>Yeni Parola Tekrar:</label>
									              <input type="password" name="yenisifretekrar" class="form-control @error('yenisifretekrar') is-invalid @enderror" value="">
									              <span class="form-text text-muted">Yeni parolanızı tekrar girin.</span>
									              @error('yenisifretekrar')
									                <div class="error" style="color: red;">{{ $message }}</div>
									              @enderror
									            </div>
									        </div>
								        <div class="kt-portlet__foot">
								          <div class="kt-form__actions">
								            <button type="submit" class="btn btn-primary">Değiştir</button>
								          </div>
								        </div>
								      </form>
									</div>
								  </div>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-footer kt-grid__item" id="kt_footer">
						<div class="kt-container ">
							<div class="kt-footer__wrapper">
								@include('includes.global.footer')
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
						"brand": "#591df1",
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