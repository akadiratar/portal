					<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">
							<a href="{{route('ets')}}" style="color: white; font-size: 17px;">
								<b>ENVANTER TAKİP SİSTEMİ</b>
							</a>
						</div>
					</div>
					<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
						<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
							<ul class="kt-menu__nav ">
								<li class="kt-menu__section ">
									<h4 class="kt-menu__section-text">TEMEL BİRİMLER</h4>
									<i class="kt-menu__section-icon flaticon-more-v2"></i>
								</li>
								<?php $temel_birimler = \App\Models\Birim::temel_birimler(); ?>
								@foreach($temel_birimler as $temel_birim)
									<li class="kt-menu__item " aria-haspopup="true"><a href="" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-web"></i><span class="kt-menu__link-text">{{$temel_birim->birim_adi}}</span></a></li>
								@endforeach
								<li class="kt-menu__section ">
									<h4 class="kt-menu__section-text">BLOKLAR</h4>
									<i class="kt-menu__section-icon flaticon-more-v2"></i>
								</li>
								<?php $temel_bloklar = \App\Models\Blok::temel_bloklar(); ?>
								@foreach($temel_bloklar as $temel_blok)
									<li class="kt-menu__item " aria-haspopup="true"><a href="" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layers"></i><span class="kt-menu__link-text">{{$temel_blok->blok_adi}} BLOK</span></a></li>
								@endforeach
							</ul>
						</div>
					</div>