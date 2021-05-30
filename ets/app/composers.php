<?php 

	View::share("birimtiplerigenel", BirimTip::all());
	View::share("ustbirimlergenel", UstBirim::orderBy("ust_birim_adi","ASC")->get());
	View::share("kilitkontrol", Kilit::where("id", 1)->first());
	View::share("depokontrol", Oda::where("depokontrol", 1)->orderBy("oda_birlikte","ASC")->get());