<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
	<div id="kt_aside_menu" class="kt-aside-menu  kt-aside-menu--dropdown " data-ktmenu-vertical="1" data-ktmenu-dropdown="1" data-ktmenu-scroll="0">
		<ul class="kt-menu__nav ">
			<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="click"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-avatar"></i><span class="kt-menu__link-text">Kullanıcı İşlemleri</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
				<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
					<ul class="kt-menu__subnav">
						<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Kullanıcı İşlemleri</span></span></li>
						<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('riy_kullanici_ara')}}" class="kt-menu__link "><i class="kt-menu__link-icon la la-search-plus"></i><span class="kt-menu__link-text">Kullanıcı Ara</span></a></li>
						<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('riy_kullanicilar')}}" class="kt-menu__link "><i class="kt-menu__link-icon la la-search-plus"></i><span class="kt-menu__link-text">Kullanıcılar</span></a></li>
						<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('riy_kullanici_ekle')}}" class="kt-menu__link "><i class="kt-menu__link-icon la la-user-plus"></i><span class="kt-menu__link-text">Kullanıcı Ekle</span></a></li>
						<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('riy_unvanlar')}}" class="kt-menu__link "><i class="kt-menu__link-icon la la-tag"></i><span class="kt-menu__link-text">Kullanıcı Ünvanları</span></a></li>
					</ul>
				</div>
			</li>
			@can('riy.rol_ve_izin_islemleri')
			<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="click"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-safe-shield-protection"></i><span class="kt-menu__link-text">Rol ve İzin İşlemleri</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
				<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
					<ul class="kt-menu__subnav">
						<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Rol ve İzin İşlemleri</span></span></li>
						<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('riy_roller')}}" class="kt-menu__link "><i class="kt-menu__link-icon la la-user-secret"></i><span class="kt-menu__link-text">Roller</span></a></li>
						<li class="kt-menu__item " aria-haspopup="true"><a href="{{route('riy_izinler')}}" class="kt-menu__link "><i class="kt-menu__link-icon la la-key"></i><span class="kt-menu__link-text">İzinler</span></a></li>
					</ul>
				</div>
			</li>
			@endcan
			<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--bottom-2" aria-haspopup="true" data-ktmenu-submenu-toggle="click"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Settings</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
				<div class="kt-menu__submenu kt-menu__submenu--up"><span class="kt-menu__arrow"></span>
					<ul class="kt-menu__subnav">
						<li class="kt-menu__item  kt-menu__item--parent kt-menu__item--bottom-2" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Settings</span></span></li>
						<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="#" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Profile</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
							<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
								<ul class="kt-menu__subnav">
									<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-computer"></i><span class="kt-menu__link-text">Pending</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--brand">7</span></span></a></li>
									<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-signs-2"></i><span class="kt-menu__link-text">Urgent</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--danger">6</span></span></a></li>
									<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-clipboard"></i><span class="kt-menu__link-text">Done</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--success">2</span></span></a></li>
									<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-multimedia-2"></i><span class="kt-menu__link-text">Archive</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--info kt-badge--inline">245</span></span></a></li>
								</ul>
							</div>
						</li>
						<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Accounts</span></a></li>
						<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Help</span></a></li>
						<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Notifications</span></a></li>
					</ul>
				</div>
			</li>
			<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--bottom-1" aria-haspopup="true" data-ktmenu-submenu-toggle="click"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-hourglass-1"></i><span class="kt-menu__link-text">Help</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--brand kt-badge--rounded">2</span></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
				<div class="kt-menu__submenu kt-menu__submenu--up"><span class="kt-menu__arrow"></span>
					<ul class="kt-menu__subnav">
						<li class="kt-menu__item  kt-menu__item--parent kt-menu__item--bottom-1" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Help</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--brand kt-badge--rounded">2</span></span></span></li>
						<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Support</span></a></li>
						<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Blog</span></a></li>
						<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Documentation</span></a></li>
						<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pricing</span></a></li>
						<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Terms</span></a></li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
</div>