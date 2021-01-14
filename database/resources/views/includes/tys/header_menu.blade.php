						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
							<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
								<ul class="kt-menu__nav ">
									<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('tys_diger_numaralar')}}" class="kt-menu__link "><span class="kt-menu__link-text">DİĞER NUMARALAR</span></a></li>
									<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">BİRİMLER</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
										<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
											<ul class="kt-menu__subnav">
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('tys_birimler')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">BİRİMLER</span></a></li>
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('tys_birim_yapisi')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">BİRİM YAPISI</span></a></li>
											</ul>
										</div>
									</li>
									<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">YAPI LİSTESİ</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
										<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
											<ul class="kt-menu__subnav">
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('tys_bloklar')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">BLOKLAR</span></a></li>
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('tys_katlar')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">KATLAR</span></a></li>
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('tys_odalar')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">ODALAR</span></a></li>
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('tys_oda_tipleri')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">ODA TİPLERİ</span></a></li>
											</ul>
										</div>
									</li>

									@if(auth()->user()->can('tys.silinenler'))
									<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">SİLİNEN</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
										<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
											<ul class="kt-menu__subnav">
												<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('tys_numaralar_silinenler')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">NUMARALAR</span></a></li>
											</ul>
										</div>
									</li>
									@endif

								</ul>
							</div>
						</div>
