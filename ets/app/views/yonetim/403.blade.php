<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<title>Envanter Takip Sistemi</title>

<link href="{{ asset('assets/yonetim')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/yonetim')}}/css/stil-theme.css" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/yonetim')}}/css/styles.css" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/yonetim')}}/css/icons.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/jquery-ui.min.js"></script>

<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/charts/sparkline.min.js"></script>

<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/forms/uniform.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/forms/select2.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/forms/inputmask.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/forms/autosize.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/forms/inputlimit.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/forms/listbox.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/forms/multiselect.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/forms/validate.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/forms/tags.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/forms/switch.min.js"></script>

<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/forms/uploader/plupload.full.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/forms/uploader/plupload.queue.min.js"></script>

<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/forms/wysihtml5/toolbar.js"></script>

<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/interface/fullcalendar.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/plugins/interface/timepicker.min.js"></script>

<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/yonetim')}}/js/application.js"></script>

</head>

<body class="full-width page-condensed">

	<div class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
			<br>
			<span><h4><a href="{{route('index')}}" style="color:white;">Envanter Takip Sistemi</a></h4></span>
		</div>
		<ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
	      <li>
	        <form class="breadcrumb-search" role="form" enctype="multipart/form-data" action="{{route('ara')}}" method="post" >
	          <input type="text" placeholder="Seri No - Oda No" name="search" autocomplete="off">
	        </form>
	      </li>

	      <li class="user dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown">
	          <span>{{ Auth::user()->yonetici_adi }}</span>
	          <i class="caret"></i>
	        </a>
	        <ul class="dropdown-menu dropdown-menu-right icons-right">
	        @if(Auth::user()->yonetici_tip == 1)
	          <li><a href="{{route('yonetici_ekle')}}"><i class="icon-user-plus2"></i> Yönetici Ekle</a></li>
	          <li><a href="{{route('yoneticiler')}}"><i class="icon-users"></i> Yöneticiler</a></li>
	          <li><a href="{{route('kilit')}}"><i class="icon-lock2"></i> Kilit</a></li>
	          <li><a href="{{route('log')}}" target="_blank"><i class="icon-database"></i> Log Kayıtları</a></li>
	          <li><a href="{{route('excel')}}"><i class="icon-info2"></i> Excel Rapor</a></li>
	        @endif
	          <li><a href="{{route('sifredegistirme')}}"><i class="icon-cog"></i> Şifreyi Değiştir</a></li>
	          <li><a href="{{ route('cikis') }}"><i class="icon-exit"></i> Çıkış Yap</a></li>
	        </ul>
	      </li>
	    </ul>
	</div>
	<div class="error-wrapper text-center">
	    <h1 style="font-size: 100px;">Erişim Engellendi!</h1>
	    <h6>- Bu sayfaya girmek için yeterli yetkiniz bulunmuyor! -</h6>
	</div>  
    
    <div class="footer clearfix">
        <div class="pull-left">&copy; 2021 - Abdulkadir ATAR</div>
    	<div class="pull-right icons-group">
    		  <a href="http://10.134.217.236/telefon/" target="_blank"><i class="icon-phone2"></i></a>
              <a href="http://10.134.217.236/" target="_blank"><i class="icon-question5"></i></a>
              <a href="http://donanim.adalet.gov.tr/index.html" target="_blank"><i class="icon-home"></i></a>
              <a href="https://arizatakip.uyap.gov.tr/ariza/swf/ArizaTakip_v_8_6.html" target="_blank"><i class="icon-question4"></i></a>
              <a href="https://webmail.uyap.gov.tr/index.php" target="_blank"><i class="icon-mail"></i></a>
              <a href="http://10.134.217.236:83/teknik.asp?acikisler=1" target="_blank"><i class="icon-target"></i></a>
    	</div>
    </div>


</body>
</html>