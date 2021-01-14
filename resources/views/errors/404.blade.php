<!doctype html>
<html lang="tr">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Sayfa Bulunamadı</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
		<link href="{{ asset('assets/css/pages/error/error-6.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/portal/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		@include('includes.global.favicon')
	</head>
	<body class="kt-quick-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-aside--minimize">
		<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid  kt-error-v6" style="background-image: url({{ asset('assets/media/error/bg6.jpg') }});">
				<div class="kt-error_container">
					<div class="kt-error_subtitle kt-font-light">
						<h1>Sayfa Bulunamadı</h1>
					</div>
					<p class="kt-error_title kt-font-light">
						<a href="{{ route('/') }}"><code><i class="flaticon-home-2"></i> Anasayfaya Dön</code></a>
					</p>
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