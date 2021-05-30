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
	</div>

<form class="form-horizontal" role="form" enctype="multipart/form-data" action="{{route('urun_tasi_onayla')}}" method="post" >

            <div class="panel panel-default text-center">
                <div class="panel-body">
		        	<div class="row">
						<div class="alert alert-block alert-danger fade in block-inner">
							<h6>Aşağıda seri numaraları yazan ürünlerin kayıtlı olduğu oda numaraları değiştirilecek!</h6>
							<hr>
							@foreach ($urunler as $urun)
								<h6><input type="checkbox" name="seciliurunler[]" value="{{ $urun }}" checked>{{$urun}}</h6>
							@endforeach
							<div class="form-group">
								<label class="col-sm-3 control-label"></label>
								<div class="col-sm-6">
									<input type="text" name="yeni_oda_no" class="form-control" placeholder="Yeni Oda Numarası" value="" required autocomplete="off">
								</div>
							</div>
							<div>
								<a class="btn btn-danger" href="{{route('iptal')}}"><i class="icon-cancel-circle"></i> HAYIR İPTAL ET</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
								<button type="submit" class="btn btn-success"><i class="icon-checkmark3"></i> EVET YENİ ODAYA TAŞI</button>
							</div>
						</div>
		        	</div>
	            </div>
	        </div>
</form>





    <div class="footer clearfix">
        <div class="pull-left"></div>
      <div class="pull-right icons-group">
          <a href="#" target="_blank"><i class="icon-phone2"></i></a>
              <a href="#" target="_blank"><i class="icon-question5"></i></a>
              <a href="http://donanim.adalet.gov.tr/index.html" target="_blank"><i class="icon-home"></i></a>
              <a href="#" target="_blank"><i class="icon-question4"></i></a>
              <a href="https://webmail.uyap.gov.tr/index.php" target="_blank"><i class="icon-mail"></i></a>
              <a href="#" target="_blank"><i class="icon-target"></i></a>
      </div>
    </div>


</body>
</html>