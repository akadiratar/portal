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

<body class="navbar-fixed">

  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" <?php if($kilitkontrol->kilit <> 0) {echo 'style="background-color: #EA4335;"';}?>>
    <div class="navbar-header">
      <br>
      <span><h4><a href="{{route('index')}}" style="color:white;">Envanter Takip Sistemi</a></h4></span>
    
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
        <span class="sr-only">Toggle right icons</span>
        <i class="icon-grid"></i>
      </button>

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
        <span class="sr-only">Toggle menu</span>
        <i class="icon-paragraph-justify2"></i>
      </button>

      <button type="button" class="navbar-toggle offcanvas">
        <span class="sr-only">Toggle navigation</span>
        <i class="icon-paragraph-justify2"></i>
      </button>
    </div>

    <ul class="nav navbar-nav collapse" id="navbar-menu">
@if(Auth::user()->yonetici_tip == 1)
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Sarf Malzeme</span> <b class="caret"></b></a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="{{route('sm_tur_ekle')}}"><span>SM Tür Ekle</span></a></li>
          <li><a href="{{route('sm_turler')}}"><span>SM Türler</span></a></li>
          <li><a href="{{route('sm_alttur_ekle')}}"><span>SM Alttür Ekle</span></a></li>
          <li><a href="{{route('sm_altturler')}}"><span>SM Alttürler</span></a></li>
          <li><a href="{{route('sm_urun_ekle')}}"><span>SM Ürün Ekle</span></a></li>
          <li><a href="{{route('sm_urunler')}}"><span>SM Ürünler</span></a></li>
          <li><a href="{{route('sm_urun_ara')}}"><span>SM Ürün Ara</span></a></li>
          <li><a href="{{route('sm_kayit_ekle')}}"><span>SM Kayıt Ekle</span></a></li>
          <li><a href="{{route('sm_tum_kayitlar')}}"><span>SM Tüm Kayıtlar</span></a></li>
          <li><a href="{{route('sm_sorgu')}}"><span>SM Sorgu</span></a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Birim Tip</span> <b class="caret"></b></a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="{{route('birim_tipi_ekle')}}"><span>Birim Tipi Ekle</span></a></li>
          <li><a href="{{route('birim_tipleri')}}"><span>Birim Tipleri</span></a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Üst Birim</span> <b class="caret"></b></a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="{{route('ust_birim_ekle')}}"><span>Üst Birim Ekle</span></a></li>
          <li><a href="{{route('ust_birimler')}}"><span>Üst Birimler</span></a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Birim</span> <b class="caret"></b></a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="{{route('birim_ekle')}}"><span>Birim Ekle</span></a></li>
          <li><a href="{{route('birimlergenel')}}"><span>Birimler</span></a></li>
        </ul>
      </li>
@endif
@if(Auth::user()->yonetici_tip <> 2 && Auth::user()->yonetici_tip <> 3)
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Oda</span> <b class="caret"></b></a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="{{route('oda_ekle')}}"><span>Oda Ekle</span></a></li>
          <li><a href="{{route('odalargenel')}}"><span>Odalar</span></a></li>
        </ul>
      </li>
@endif
@if(Auth::user()->yonetici_tip == 1)
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Tür</span> <b class="caret"></b></a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="{{route('tur_ekle')}}"><span>Tür Ekle</span></a></li>
          <li><a href="{{route('turler')}}"><span>Türler</span></a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Marka</span> <b class="caret"></b></a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="{{route('marka_ekle')}}"><span>Marka Ekle</span></a></li>
          <li><a href="{{route('markalar')}}"><span>Markalar</span></a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Model</span> <b class="caret"></b></a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="{{route('model_ekle')}}"><span>Model Ekle</span></a></li>
          <li><a href="{{route('modeller')}}"><span>Modeller</span></a></li>
        </ul>
      </li>
@endif
@if(Auth::user()->yonetici_tip <> 2 && Auth::user()->yonetici_tip <> 3)
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Ürün</span> <b class="caret"></b></a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="{{route('urun_ekle')}}"><span>Ürün Ekle</span></a></li>
          <li><a href="{{route('urunlergenel')}}"><span>Ürünler</span></a></li>
        </ul>
      </li>
      
      <li><a href="{{route('oda_urun')}}"><span>Odaya Ürün Ekle</span></a></li>
@endif
@if(Auth::user()->yonetici_tip == 1)
      <li><a href="{{route('sorgu')}}"><span>Detaylı Sorgu</span></a></li>
@endif
@if(Auth::user()->yonetici_tip <> 2)
      <li><a href="{{route('arizakayit')}}"><span>Ürün Arıza Kayıt</span></a></li>
@endif
    </ul>   

    <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
      @if(Auth::user()->yonetici_tip == 1)
        <li><a href="{{route('notlar')}}"><span>Notlar</span></a></li>
      @endif
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
  <div class="page-container">

    <div class="sidebar">
      <div class="sidebar-content">

        <ul class="navigation">
          <li><a href="{{route('index')}}"><span>Anasayfa</span> <i class="icon-home2"></i></a></li>
          @if(Auth::user()->yonetici_tip == 1)
          <li>
            <a href="#"><span>Depo</span> <i class="icon-stack"></i></a>
            <ul>
              @foreach ($depokontrol as $depokont)
              <li><a href="{{ route('urunler', $depokont->oda_birlikte) }}">{{$depokont->oda_birlikte}} {{$depokont->aciklama}}</a></li>
              @endforeach
              <li><a href="{{ route('bostaurunler') }}">Odaya Kayıtlı Olmayan Ürünler</a></li>
              <li><a href="{{ route('dusum_listesine_ekle') }}">Düşüm Listesi</a></li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->yonetici_tip <> 3)
          <li>
            <a href="#"><span>A Blok</span> <i class="icon-stack"></i></a>
            <ul>
              <li><a href="{{ route('kat', array('A','5')) }}">5. Kat</a></li>
              <li><a href="{{ route('kat', array('A','4')) }}">4. Kat</a></li>
              <li><a href="{{ route('kat', array('A','3')) }}">3. Kat</a></li>
              <li><a href="{{ route('kat', array('A','2')) }}">2. Kat</a></li>
              <li><a href="{{ route('kat', array('A','1')) }}">1. Kat</a></li>
              <li><a href="{{ route('kat', array('A','Z')) }}">Zemin Kat</a></li>
              <li><a href="{{ route('kat', array('A','1B')) }}">-1. Kat</a></li>
              <li><a href="{{ route('kat', array('A','2B')) }}">-2. Kat</a></li>
              <li><a href="{{ route('kat', array('A','3B')) }}">-3. Kat</a></li>
              <li><a href="{{ route('kat', array('A','4B')) }}">-4. Kat</a></li>
            </ul>
          </li>
          <li>
            <a href="#"><span>B Blok</span> <i class="icon-stack"></i></a>
            <ul>
              <li><a href="{{ route('kat', array('B','5')) }}">5. Kat</a></li>
              <li><a href="{{ route('kat', array('B','4')) }}">4. Kat</a></li>
              <li><a href="{{ route('kat', array('B','3')) }}">3. Kat</a></li>
              <li><a href="{{ route('kat', array('B','2')) }}">2. Kat</a></li>
              <li><a href="{{ route('kat', array('B','1')) }}">1. Kat</a></li>
              <li><a href="{{ route('kat', array('B','Z')) }}">Zemin Kat</a></li>
              <li><a href="{{ route('kat', array('B','1B')) }}">-1. Kat</a></li>
              <li><a href="{{ route('kat', array('B','2BA')) }}">-2. Asma Kat</a></li>
              <li><a href="{{ route('kat', array('B','2B')) }}">-2. Kat</a></li>
              <li><a href="{{ route('kat', array('B','3BA')) }}">-3. Asma Kat</a></li>
              <li><a href="{{ route('kat', array('B','3B')) }}">-3. Kat</a></li>
              <li><a href="{{ route('kat', array('B','4BA')) }}">-4. Asma Kat</a></li>
              <li><a href="{{ route('kat', array('B','4B')) }}">-4. Kat</a></li>
              <li><a href="{{ route('kat', array('B','5B')) }}">-5. Kat</a></li>
            </ul>
          </li>
          <li>
            <a href="#"><span>C Blok</span> <i class="icon-stack"></i></a>
            <ul>
              <li><a href="{{ route('kat', array('C','3')) }}">3. Kat</a></li>
              <li><a href="{{ route('kat', array('C','2')) }}">2. Kat</a></li>
              <li><a href="{{ route('kat', array('C','1')) }}">1. Kat</a></li>
              <li><a href="{{ route('kat', array('C','Z')) }}">Zemin Kat</a></li>
              <li><a href="{{ route('kat', array('C','1B')) }}">-1. Kat</a></li>
              <li><a href="{{ route('kat', array('C','2B')) }}">-2. Kat</a></li>
            </ul>
          </li>
          <li>
            <a href="#"><span>D Blok</span> <i class="icon-stack"></i></a>
            <ul>
              <li><a href="{{ route('kat', array('D','2')) }}">2. Kat</a></li>
              <li><a href="{{ route('kat', array('D','1')) }}">1. Kat</a></li>
              <li><a href="{{ route('kat', array('D','Z')) }}">Zemin Kat</a></li>
              <li><a href="{{ route('kat', array('D','1B')) }}">-1. Kat</a></li>
              <li><a href="{{ route('kat', array('D','2B')) }}">-2. Kat</a></li>
            </ul>
          </li>
          <li>
            <a href="#"><span>E Blok</span> <i class="icon-stack"></i></a>
            <ul>
              <li><a href="{{ route('kat', array('E','4')) }}">4. Kat</a></li>
              <li><a href="{{ route('kat', array('E','3')) }}">3. Kat</a></li>
              <li><a href="{{ route('kat', array('E','2')) }}">2. Kat</a></li>
              <li><a href="{{ route('kat', array('E','1')) }}">1. Kat</a></li>
              <li><a href="{{ route('kat', array('E','Z')) }}">Zemin Kat</a></li>
              <li><a href="{{ route('kat', array('E','1B')) }}">-1. Kat</a></li>
            </ul>
          </li>
          <li>
            <a href="#"><span>G Blok</span> <i class="icon-stack"></i></a>
            <ul>
              <li><a href="{{ route('kat', array('G','Z')) }}">Zemin Kat</a></li>
            </ul>
          </li>
        @foreach ($birimtiplerigenel as $tiplergenel)  
          <li>
            <a href="#"><span>{{$tiplergenel->tip_adi}}</span> <i class="icon-stack"></i></a>
            <ul>
              @foreach ($ustbirimlergenel as $ustbirimgenel)
                  @if($ustbirimgenel->tip_id == $tiplergenel->id)
                    <li><a href="{{ route('birimler', $ustbirimgenel->id) }}">{{ $ustbirimgenel->ust_birim_adi }}</a></li>
                  @endif
              @endforeach
            </ul>
          </li>
         @endforeach
          <li><br></li>
          @endif
          <li><a href="{{ route('cikis') }}"><span>Çıkış Yap</span> <i class="icon-exit"></i></a></li>

        </ul>
        
      </div>
    </div>

    <div class="page-content">

      <br>
      <!-- uyarı -->
@if(Session::has("danger"))

<div class="bg-danger with-padding block-inner">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ Session::get("danger") }}
</div>

@endif

@if(Session::has("success"))

<div class="bg-success with-padding block-inner">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ Session::get("success") }}
</div>

@endif

@if(Session::has("info"))

<div class="bg-info with-padding block-inner">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ Session::get("info") }}
</div>

@endif

          <!-- /uyarı -->

<!-- --------------------------------------------------------başla -->


@yield("icerik")


<!-- --------------------------------------------------------bitir -->

<div class="clearfix"></div>
<hr>
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


    </div>

  </div>

</body>
</html>