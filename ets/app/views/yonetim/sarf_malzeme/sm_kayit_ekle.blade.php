@extends('yonetim.kalip')

@section('icerik')
<script type="text/javascript">
jQuery(document).ready(function ($) {

  $("#secili_ust_birim").change(function(event) {
        var deger = $(this).val();

         $.ajax({

             url: deger, 

             type: "GET", 

             contentType: false, 

             cache: false, 

             processData:false, 

             success: function(data) 

             {

                $("#birimler").html(data); 
          }
        });

        return false;
    });
});

</script>

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Sarf Malzeme Kayıt Ekle</li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>

<!-- Form  -->
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >
  <!-- Basic inputs -->
    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i>Sarf Malzeme Kayıt Ekle</h6></div>
        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Gelen Sarf Malzeme Seri No:</label>
            <div class="col-sm-10">
              <input type="text" name="sm_gelen_serino" class="form-control" value="" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Giden Sarf Malzeme Seri No:</label>
            <div class="col-sm-10">
              <input type="text" name="sm_giden_serino" class="form-control" value="" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Üst Birim: </label>
            <div class="col-sm-10">
              <select name="sm_ustbirim_id" class="form-control" id="secili_ust_birim" required>
                  <option disabled selected value="">Seçiniz</option>
                  @foreach ($ustbirimler as $ustbirim)
                    <option value="{{ route('secili_ust_birim',$ustbirim->id) }}">{{ $ustbirim->ust_birim_adi }}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="form-group" id="birimler">
    
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Bağlı Seri Numarası: </label>
            <div class="col-sm-10">
              <input type="text" name="sm_bagli_serino" class="form-control" value="" autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Sayfa Sayısı: </label>
            <div class="col-sm-10">
              <input type="text" name="sm_bagli_sayfasayisi" class="form-control" value="" autocomplete="off">
            </div>
          </div>

          <div class="form-actions text-right">
            <button type="submit" class="btn btn-primary">Kaydet</button>
          </div>
        </div>
    </div>
  <!-- /basic inputs -->
</form>
<!-- /Form  -->

@stop