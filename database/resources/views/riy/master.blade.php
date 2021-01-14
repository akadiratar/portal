<!doctype html>
<html lang="tr">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Kullanıcı ve İzin Yönetimi (KİY)</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/riy/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		@livewireStyles
		@stack('css')
		@include('includes.global.favicon')
	</head>
	<body class="kt-quick-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-aside--minimize">
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="{{ route('riy') }}" class="kt-menu__item" aria-haspopup="true">
					<span class="kt-menu__link-text" style="color:#22B9FF; font-size: 15px;"><b>KULLANICI VE İZİN YÖNETİMİ</b></span>
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
					<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
						<div class="kt-menu__item" align="center">
							<a href="{{ route('riy') }}" class="kt-menu__link" aria-haspopup="true">
								<span class="kt-menu__link-text" style="color:#22B9FF; font-size: 15px;"><b>KULLANICI VE İZİN YÖNETİMİ</b></span>
							</a>
						</div>
					</div>
					@include('includes.riy.aside')
				</div>
				<div class="kt-aside-menu-overlay"></div>
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
					<div id="kt_header" class="kt-header kt-grid kt-grid--ver  kt-header--fixed ">
						@include('includes.riy.header_menu')
						@include('includes.riy.header_topbar')
					</div>
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<span class="kt-subheader__desc" id="kt_subheader_total">
										<a href="{{ route('riy') }}">ANASAYFA</a> @yield('breadcrumb')
									</span>
								</div>
								<div class="kt-subheader__toolbar">
									<div class="kt-subheader__wrapper">
										@yield('sub_header')
									</div>
								</div>
							</div>
						</div>
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
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
							<br>
							@yield('icerik')					
						</div>
					</div>
					<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
						<div class="kt-container  kt-container--fluid ">
							@include('includes.global.footer')
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#22b9ff",
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
		<script src="{{ asset('assets/js/riy/scripts.bundle.js') }}" type="text/javascript"></script>
		@livewireScripts
		@stack('js')
	</body>
</html>