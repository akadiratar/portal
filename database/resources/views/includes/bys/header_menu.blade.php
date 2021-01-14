						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
							<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
								<ul class="kt-menu__nav ">
									@if(auth()->user()->can('bys.birim_islemleri') || auth()->user()->can('bys.birim_listesi_gorme'))
									<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">BİRİM İŞLEMLERİ</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
										<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
											<ul class="kt-menu__subnav">
												@if(auth()->user()->can('bys.birim_islemleri'))
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('bys_birim_ekle')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">BİRİM EKLE</span></a></li>
												@endif
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('bys_birimler')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">BİRİMLER</span></a></li>
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('bys_birim_yapisi')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">BİRİM YAPISI</span></a></li>
											</ul>
										</div>
									</li>
									@endif
									@if(auth()->user()->can('bys.yapi_islemleri') || auth()->user()->can('bys.yapi_listesi_gorme'))
									<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">YAPI İŞLEMLERİ</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
										<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
											<ul class="kt-menu__subnav">
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('bys_bloklar')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">BLOKLAR</span></a></li>
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('bys_katlar')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">KATLAR</span></a></li>
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('bys_odalar')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">ODALAR</span></a></li>
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('bys_oda_tipleri')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">ODA TİPLERİ</span></a></li>
											</ul>
										</div>
									</li>
									@endif

									@if(auth()->user()->can('bys.birim_oda_eslestirme'))
									<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('bys_birim_oda_eslestir')}}" class="kt-menu__link"><span class="kt-menu__link-text">BİRİM ODA EŞLEŞTİRME</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									</li>
									@endif

									@if(auth()->user()->can('bys.silinenler'))
									<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">SİLİNEN</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
										<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
											<ul class="kt-menu__subnav">
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('bys_birimler_silinenler')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">BİRİMLER</span></a></li>
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('bys_bloklar_silinenler')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">BLOKLAR</span></a></li>
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('bys_katlar_silinenler')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">KATLAR</span></a></li>
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('bys_odalar_silinenler')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">ODALAR</span></a></li>
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('bys_oda_tipleri_silinenler')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">ODA TİPLERİ</span></a></li>
											</ul>
										</div>
									</li>
									@endif

								</ul>
							</div>
						</div>
