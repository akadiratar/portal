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
									@can('dts.goster')								
									<div class="col-lg-6">
										<div class="kt-portlet kt-callout kt-callout--warning kt-callout--diagonal-bg">
											<div class="kt-portlet__body">
												<div class="kt-callout__body">
													<div class="kt-callout__content">
														<h3 class="kt-callout__title">Destek Takip Sistemi</h3>
													</div>
													<div class="kt-callout__action">
														<a href="{{route('dts')}}" class="btn btn-custom btn-bold btn-upper btn-font-sm  btn-warning">Uygulamaya Git</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endcan
									@can('ets.goster')
									<div class="col-lg-6">
										<div class="kt-portlet kt-callout kt-callout--info kt-callout--diagonal-bg">
											<div class="kt-portlet__body">
												<div class="kt-callout__body">
													<div class="kt-callout__content">
														<h3 class="kt-callout__title">Envanter Takip Sistemi</h3>
													</div>
													<div class="kt-callout__action">
														<a href="{{route('ets')}}" class="btn btn-custom btn-bold btn-upper btn-font-sm  btn-info">Uygulamaya Git</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endcan
									@can('riy.goster')
									<div class="col-lg-6">
										<div class="kt-portlet kt-callout kt-callout--success kt-callout--diagonal-bg">
											<div class="kt-portlet__body">
												<div class="kt-callout__body">
													<div class="kt-callout__content">
														<h3 class="kt-callout__title">Kullanıcı ve İzin Yönetimi</h3>
													</div>
													<div class="kt-callout__action">
														<a href="{{route('riy')}}" class="btn btn-custom btn-bold btn-upper btn-font-sm  btn-success">Uygulamaya Git</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endcan
									@can('segbis.goster')
									<div class="col-lg-6">
										<div class="kt-portlet kt-callout kt-callout--primary kt-callout--diagonal-bg">
											<div class="kt-portlet__body">
												<div class="kt-callout__body">
													<div class="kt-callout__content">
														<h3 class="kt-callout__title">SEGBİS Takip Sistemi</h3>
													</div>
													<div class="kt-callout__action">
														<a href="{{route('segbis')}}" class="btn btn-custom btn-bold btn-upper btn-font-sm  btn-primary">Uygulamaya Git</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endcan
									@can('buro.goster')
									<div class="col-lg-6">
										<div class="kt-portlet kt-callout kt-callout--danger kt-callout--diagonal-bg">
											<div class="kt-portlet__body">
												<div class="kt-callout__body">
													<div class="kt-callout__content">
														<h3 class="kt-callout__title">Büro Personeli Yönetim Sistemi</h3>
													</div>
													<div class="kt-callout__action">
														<a href="{{route('buro')}}" class="btn btn-custom btn-bold btn-upper btn-font-sm  btn-danger">Uygulamaya Git</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endcan
									@can('bys.goster')
									<div class="col-lg-6">
										<div class="kt-portlet kt-callout kt-callout--success kt-callout--diagonal-bg">
											<div class="kt-portlet__body">
												<div class="kt-callout__body">
													<div class="kt-callout__content">
														<h3 class="kt-callout__title">Bina Yönetim Sistemi</h3>
													</div>
													<div class="kt-callout__action">
														<a href="{{route('bys')}}" class="btn btn-custom btn-bold btn-upper btn-font-sm  btn-success">Uygulamaya Git</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endcan
									@can('tys.goster')
									<div class="col-lg-6">
										<div class="kt-portlet kt-callout kt-callout--info kt-callout--diagonal-bg">
											<div class="kt-portlet__body">
												<div class="kt-callout__body">
													<div class="kt-callout__content">
														<h3 class="kt-callout__title">Telefon Yönetim Sistemi</h3>
													</div>
													<div class="kt-callout__action">
														<a href="{{route('tys')}}" class="btn btn-custom btn-bold btn-upper btn-font-sm  btn-info">Uygulamaya Git</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endcan
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