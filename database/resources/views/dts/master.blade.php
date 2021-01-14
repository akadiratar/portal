<!doctype html>
<html lang="tr">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Destek Takip Sistemi (DTS)</title>
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		@if($versiyon == 'dts-v1')
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
		<link href="{{ asset('assets/css/dts-v1/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		@elseif($versiyon == 'dts-v2')
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Asap+Condensed:500">
		<link href="{{ asset('assets/css/dts-v2/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		@endif
		@stack('css')
		@include('includes.global.favicon')
	</head>
	@if($versiyon == 'dts-v1')
	<body style="background-image: url({{ asset('assets/media/versions/dts-v1/header.jpg') }}); background-position: center top; background-size: 100% 350px;" class="kt-quick-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent">
	@elseif($versiyon == 'dts-v2')
	<body style="background-image: url({{ asset('assets/media/versions/dts-v2/bg-1.jpg') }})" class="kt-quick-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent">
	@endif
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="index.html">
					<img alt="Logo" src="{{ asset('assets/media/logos/logo-5-sm.png') }}" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
			</div>
		</div>
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
					@if($versiyon == 'dts-v1')
						<div id="kt_header" class="kt-header  kt-header--fixed " data-ktheader-minimize="on">
							<div class="kt-container ">
								@include('includes.dts.brand')
								@include('includes.dts.header_menu')
								@include('includes.dts.header_topbar')
							</div>
						</div>
					@elseif($versiyon == 'dts-v2')
						<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
							<div class="kt-header__top">
								<div class="kt-container  kt-container--fluid ">
									@include('includes.dts.brand')
									@include('includes.dts.header_topbar')
								</div>
							</div>
							<div class="kt-header__bottom">
								<div class="kt-container  kt-container--fluid ">
									@include('includes.dts.header_menu')
								</div>
							</div>
						</div>
					@endif
					@if($versiyon == 'dts-v1')
						<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
							<div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
								@include('includes.dts.subheader')
								<div class="kt-container  kt-grid__item kt-grid__item--fluid">
									@yield('icerik')
								</div>
							</div>
						</div>
					@elseif($versiyon == 'dts-v2')
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch">
							<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
								<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
									@include('includes.dts.subheader')
									<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
										@yield('icerik')
									</div>
								</div>
							</div>
						</div>
					@endif
					@if($versiyon == 'dts-v1')
					<div class="kt-footer  kt-footer--extended  kt-grid__item" id="kt_footer" style="background-image: url({{ asset('assets/media/bg/bg-2.jpg') }});">
						<div class="kt-footer__bottom">
							<div class="kt-container ">
								<div class="kt-footer__wrapper">
									@include('includes.global.footer')
								</div>
							</div>
						</div>
					</div>
					@elseif($versiyon == 'dts-v2')
					<div class="kt-footer  kt-grid__item" id="kt_footer">
						<div class="kt-container  kt-container--fluid ">
							<div class="kt-footer__wrapper">
								@include('includes.global.footer')
							</div>
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
		@include('includes.dts.quick_panel')
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
		@if($versiyon == 'dts-v1')
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
		<script src="{{ asset('assets/js/dts-v1/scripts.bundle.js') }}" type="text/javascript"></script>
		@elseif($versiyon == 'dts-v2')
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#716aca",
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
		<script src="{{ asset('assets/js/dts-v2/scripts.bundle.js') }}" type="text/javascript"></script>
		@endif
		@stack('js')
	</body>
</html>